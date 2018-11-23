<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form-popup" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
                <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
            <h1><?php echo $heading_title; ?></h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php if ($error_warning) { ?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-popup" class="form-horizontal">

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="name"><?php echo $entry_name; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="<?php echo $name; ?>" placeholder="<?php echo $entry_name; ?>" id="name" class="form-control" />
                            <?php if ($error_name) { ?>
                            <div class="text-danger"><?php echo $error_name; ?></div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="effect"><?php echo $entry_effect; ?></label>
                        <div class="col-sm-10">
                            <select name="effect" id="effect" class="form-control">
                                <?php foreach ($effects as $key=>$eff) { ?>
                                <option value="<?php echo $key; ?>"
                                        <?php if($key==$effect) echo 'selected';?>
                                        ><?php echo $eff; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="effect_duration"><?php echo $entry_effect_duration; ?></label>
                        <div class="col-sm-10">
                            <input type="number" name="effect_duration" value="<?php echo $effect_duration; ?>" id="effect_duration" class="form-control" />
                            <span class="label label-info"><?php echo $entry_help_max_width;?></span>
                            <?php if ($error_effect_duration) { ?>
                            <div class="text-danger"><?php echo $error_effect_duration; ?></div>
                            <?php } ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="bg_effect"><?php echo $entry_bg_effect; ?></label>
                        <div class="col-sm-10">
                            <select name="bg_effect" id="bg_effect" class="form-control">
                                <?php foreach ($effects as $key=>$eff) { ?>
                                <option value="<?php echo $key; ?>"
                                        <?php if($key==$bg_effect) echo 'selected';?>
                                        ><?php echo $eff; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="bg_effect_duration"><?php echo $entry_bg_effect_duration; ?></label>
                        <div class="col-sm-10">
                            <input type="number" name="bg_effect_duration" value="<?php echo $bg_effect_duration; ?>" id="bg_effect_duration" class="form-control" />
                            <span class="label label-info"><?php echo $entry_help_max_width;?></span>
                            <?php if ($error_bg_effect_duration) { ?>
                            <div class="text-danger"><?php echo $error_bg_effect_duration; ?></div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="actionn"><?php echo $entry_action; ?></label>
                        <div class="col-sm-10">
                            <select name="actionn" id="actionn" class="form-control">
                                <?php foreach ($actions as $key=>$act) { ?>
                                <option value="<?php echo $key; ?>"
                                        <?php if($key==$actionn) echo 'selected';?>
                                        ><?php echo $act; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="action_argument"><?php echo $entry_action_argument; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="action_argument" value="<?php echo $action_argument; ?>" id="action_argument" class="form-control" />
                            <span class="label label-info"><?php echo $entry_help_action_argument;?></span>
                            <?php if ($error_action_argument) { ?>
                            <div class="text-danger"><?php echo $error_action_argument; ?></div>
                            <?php } ?>
                        </div>


                    </div>

                     <!--
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="customer_group"><?php echo $entry_customer_group; ?></label>
                        <div class="col-sm-10">
                            <select name="customer_group" id="customer_group" class="form-control">
                                <option value="0"
                                        <?php if(0==$customer_group) echo 'selected';?>>
                                        <?php echo $entry_all_user;?>
                            </option>

                            <?php foreach ($customer_groups as $gr) { ?>
                            <option value="<?php echo $gr['customer_group_id']; ?>"
                                    <?php if($gr['customer_group_id']==$customer_group) echo 'selected';?>
                                    ><?php echo $gr['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
					-->
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="max_width"><?php echo $entry_max_width; ?></label>
                    <div class="col-sm-10">
                        <input type="number" name="max_width" value="<?php echo $max_width; ?>" id="max_width" class="form-control" />
                        <span class="label label-info"><?php echo $entry_help_effect_duration;?></span>
                        <?php if ($error_max_width) { ?>
                        <div class="text-danger"><?php echo $error_max_width; ?></div>
                        <?php } ?>
                    </div>

                </div>

                <div class="form-group">
                    <?php // var_dump($data); exit(); ?>
                    <label class="col-sm-2 control-label" for="content1"><?php echo $entry_content; ?></label>
                    <div class="col-sm-10">
                        <textarea  name="content1" id="content1" class="form-control" ><?php echo $content1; ?></textarea>
                    </div>
                </div>




                <div class="form-group">
                    <label class="col-sm-2 control-label" for="custom_css"><?php echo $entry_custom_css; ?></label>
                    <div class="col-sm-10">
                        <textarea  name="custom_css" id="custom_css" class="form-control" ><?php echo $custom_css; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
                    <div class="col-sm-10">
                        <select name="status" id="input-status" class="form-control">
                            <?php if ($status) { ?>
                            <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                            <option value="0"><?php echo $text_disabled; ?></option>
                            <?php } else { ?>
                            <option value="1"><?php echo $text_enabled; ?></option>
                            <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(".summernote").summernote({height:500});
</script>
<script type="text/javascript">
        CKEDITOR.replace('content1<?php echo $content; ?>');
</script>
<?php echo $footer; ?>