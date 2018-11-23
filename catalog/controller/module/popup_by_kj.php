<?php

class ControllerModulePopUpByKj extends Controller
{

    public function index($setting)
    {
        static $module = 0;

        //$this->document->addStyle('catalog/view/javascript/jquery/owl-carousel/owl.carousel.css');
        $this->document->addScript('http://code.jquery.com/ui/1.12.0/jquery-ui.min.js');

        $data = array();
        $status = $setting['status'];
        // $customer_group=$setting['customer_group'];
        // $show_current_user=($customer_group==0 || $customer_group==$this->customer->getGroupId());
        
        // if ($status && $show_current_user)
        if ($status)
        {
            
            $data['id'] = rand(0, 1000);
            $data['actionn'] = $setting['actionn'];
            $data['max_width'] = $setting['max_width'];
            $data['action_argument'] = $setting['action_argument'];
            $data['content1'] = html_entity_decode($setting['content1'], ENT_QUOTES, 'UTF-8');
            $data['custom_css'] = $setting['custom_css'];

            $data['effect'] = $setting['effect'];
            $data['bg_effect'] = $setting['bg_effect'];
            $data['effect_duration'] = $setting['effect_duration'];
            $data['bg_effect_duration'] = $setting['bg_effect_duration'];


            $data['max_width'] = $setting['max_width'];

            $method_name = 'js_' . $data['actionn'];

            $event = $this->$method_name($data['id'], $data['action_argument']);


            $data['event'] = $event;

            return $this->load->view('default/template/module/popup_by_kj.tpl', $data);
        }
    }

    function js_timeout($id, $timeout)
    {
        return "setTimeout(show_modal$id,$timeout);";
    }

    function js_click($id, $selector)
    {
        return "$('$selector').click(function(){show_modal$id();});";
    }

    function js_onMouseOver($id, $selector)
    {
        return "$('$selector').mouseover(function(){show_modal$id();});";
    }

}
