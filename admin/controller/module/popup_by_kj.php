<?php

class ControllerModulePopUpByKj extends Controller
{

    private $error = array();

    public function index()
    {
        $this->load->language('module/popup_by_kj');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('extension/module');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate())
        {
            if (!isset($this->request->get['module_id']))
            {
                $this->model_extension_module->addModule('popup_by_kj', $this->request->post);
            } else
            {
                $this->model_extension_module->editModule($this->request->get['module_id'], $this->request->post);
            }

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], true));
        }

        $data['heading_title'] = $this->language->get('heading_title');

        $data['text_edit'] = $this->language->get('text_edit');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');




        $data['entry_help_effect_duration'] = $this->language->get('entry_help_effect_duration');
        $data['entry_help_max_width'] = $this->language->get('entry_help_max_width');
        $data['entry_help_action_argument'] = $this->language->get('entry_help_action_argument');
        $data['entry_all_user'] = $this->language->get('entry_all_user');
        $data['entry_name'] = $this->language->get('entry_name');
        $data['entry_action'] = $this->language->get('entry_action');
        $data['entry_action_argument'] = $this->language->get('entry_action_argument');
        $data['entry_max_width'] = $this->language->get('entry_max_width');
        $data['entry_content'] = $this->language->get('entry_content');
        $data['entry_effect'] = $this->language->get('entry_effect');
        $data['entry_bg_effect'] = $this->language->get('entry_bg_effect');
        $data['entry_effect_duration'] = $this->language->get('entry_effect_duration');
        $data['entry_bg_effect_duration'] = $this->language->get('entry_bg_effect_duration');
        $data['entry_custom_css'] = $this->language->get('entry_custom_css');
        $data['entry_status'] = $this->language->get('entry_status');
        // $data['entry_customer_group'] = $this->language->get('entry_customer_group');
        // $data['entry_customer_group'] = $this->language->get('entry_customer_group');

        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');

        $effects = array(
            'clip' => 'clip',
            'blind' => 'blind',
            'bounce' => 'bounce',
            'drop' => 'drop',
            'fade' => 'fade',
            'fold' => 'fold',
            'highlight' => 'highlight',
            'puff' => 'puff',
            'pulsate' => 'pulsate',
            'scale' => 'scale',
            'shake' => 'shake',
            'size' => 'size',
            'slide' => 'slide'
        );

        $actions = array(
            'timeout' => $this->language->get('entry_action_timeout'),
            'click' => $this->language->get('entry_action_click'),
            'onMouseOver' => $this->language->get('entry_action_onMouseOver'),
        );

        // $this->load->model('customer/customer_group');
        // $data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();


        $data['effects'] = $effects;
        $data['actions'] = $actions;

        if (isset($this->error['warning']))
        {
            $data['error_warning'] = $this->error['warning'];
        } else
        {
            $data['error_warning'] = '';
        }

        if (isset($this->error['name']))
        {
            $data['error_name'] = $this->error['name'];
        } else
        {
            $data['error_name'] = '';
        }

        if (isset($this->error['error_effect_duration']))
        {
            $data['error_effect_duration'] = $this->error['error_effect_duration'];
        } else
        {
            $data['error_effect_duration'] = '';
        }

        if (isset($this->error['error_bg_effect_duration']))
        {
            $data['error_bg_effect_duration'] = $this->error['error_bg_effect_duration'];
        } else
        {
            $data['error_bg_effect_duration'] = '';
        }

        if (isset($this->error['error_action_argument']))
        {
            $data['error_action_argument'] = $this->error['error_action_argument'];
        } else
        {
            $data['error_action_argument'] = '';
        }


        if (isset($this->error['error_max_width']))
        {
            $data['error_max_width'] = $this->error['error_max_width'];
        } else
        {
            $data['error_max_width'] = '';
        }




        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_module'),
            'href' => $this->url->link('extension/module', 'token=' . $this->session->data['token'], true)
        );

        if (!isset($this->request->get['module_id']))
        {
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('module/popup_by_kj', 'token=' . $this->session->data['token'], true)
            );
        } else
        {
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('module/popup_by_kj', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true)
            );
        }

        if (!isset($this->request->get['module_id']))
        {
            $data['action'] = $this->url->link('module/popup_by_kj', 'token=' . $this->session->data['token'], true);
        } else
        {
            $data['action'] = $this->url->link('module/popup_by_kj', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true);
        }

        $data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], true);

        if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST'))
        {
            $module_info = $this->model_extension_module->getModule($this->request->get['module_id']);
        }


        if (isset($this->request->post['name']))
        {
            $data['name'] = $this->request->post['name'];
        } elseif (!empty($module_info))
        {
            $data['name'] = $module_info['name'];
        } else
        {
            $data['name'] = '';
        }

        if (isset($this->request->post['actionn']))
        {
            $data['actionn'] = $this->request->post['actionn'];
        } elseif (!empty($module_info))
        {
            $data['actionn'] = $module_info['actionn'];
        } else
        {
            $data['actionn'] = '';
        }

        if (isset($this->request->post['action_argument']))
        {
            $data['action_argument'] = $this->request->post['action_argument'];
        } elseif (!empty($module_info))
        {
            $data['action_argument'] = $module_info['action_argument'];
        } else
        {
            $data['action_argument'] = '';
        }

        if (isset($this->request->post['max_width']))
        {
            $data['max_width'] = $this->request->post['max_width'];
        } elseif (!empty($module_info))
        {
            $data['max_width'] = $module_info['max_width'];
        } else
        {
            $data['max_width'] = '';
        }

        if (isset($this->request->post['effect']))
        {
            $data['effect'] = $this->request->post['effect'];
        } elseif (!empty($module_info))
        {
            $data['effect'] = $module_info['effect'];
        } else
        {
            $data['effect'] = '';
        }

        if (isset($this->request->post['bg_effect']))
        {
            $data['bg_effect'] = $this->request->post['bg_effect'];
        } elseif (!empty($module_info))
        {
            $data['bg_effect'] = $module_info['bg_effect'];
        } else
        {
            $data['bg_effect'] = '';
        }


        if (isset($this->request->post['effect_duration']))
        {
            $data['effect_duration'] = $this->request->post['effect_duration'];
        } elseif (!empty($module_info))
        {
            $data['effect_duration'] = $module_info['effect_duration'];
        } else
        {
            $data['effect_duration'] = '';
        }

        if (isset($this->request->post['bg_effect_duration']))
        {
            $data['bg_effect_duration'] = $this->request->post['bg_effect_duration'];
        } elseif (!empty($module_info))
        {
            $data['bg_effect_duration'] = $module_info['bg_effect_duration'];
        } else
        {
            $data['bg_effect_duration'] = '';
        }

        if (isset($this->request->post['content1']))
        {
            $data['content1'] = $this->request->post['content1'];
        } elseif (!empty($module_info))
        {
            $data['content1'] = $module_info['content1'];
        } else
        {
            $data['content1'] = '';
        }

        if (isset($this->request->post['custom_css']))
        {
            $data['custom_css'] = $this->request->post['custom_css'];
        } elseif (!empty($module_info))
        {
            $data['custom_css'] = $module_info['custom_css'];
        } else
        {
            $data['custom_css'] = '';
        }

//        if (isset($this->request->post['customer_group']))
//        {
//            $data['customer_group'] = $this->request->post['customer_group'];
//        } elseif (!empty($module_info))
//        {
//            $data['customer_group'] = $module_info['customer_group'];
//        } else
//        {
//            $data['customer_group'] = '';
//        }


        if (isset($this->request->post['status']))
        {
            $data['status'] = $this->request->post['status'];
        } elseif (!empty($module_info))
        {
            $data['status'] = $module_info['status'];
        } else
        {
            $data['status'] = '';
        }

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('module/popup_by_kj.tpl', $data));

//        var_dump($data);
//        exit();
    }

    protected function validate()
    {
        if (!$this->user->hasPermission('modify', 'module/popup_by_kj'))
        {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64))
        {
            $this->error['name'] = $this->language->get('error_name');
        }

        if (!isset($this->request->post['effect_duration']) || !is_numeric($this->request->post['effect_duration']))
            $this->error['error_effect_duration'] = $this->language->get('error_effect_duration');

        if (!isset($this->request->post['bg_effect_duration']) || !is_numeric($this->request->post['bg_effect_duration']))
            $this->error['error_bg_effect_duration'] = $this->language->get('error_bg_effect_duration');

        if (!isset($this->request->post['action_argument']) || empty($this->request->post['action_argument']))
            $this->error['error_action_argument'] = $this->language->get('error_action_argument');

        if (!isset($this->request->post['max_width']) || empty($this->request->post['max_width']))
            $this->error['error_max_width'] = $this->language->get('error_max_width');



        return !$this->error;
    }

}
