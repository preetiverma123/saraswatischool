<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-database"></i><small> <?php echo $this->lang->line('backup'); ?> <?php echo $this->lang->line('database'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content quick-link">
                <?php echo $this->lang->line('quick_link'); ?>:
                <?php if(has_permission(VIEW, 'administrator', 'year')){ ?>
                    <a href="<?php echo site_url('administrator/year'); ?>"><?php echo $this->lang->line('academic_year'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'administrator', 'role')){ ?>
                   | <a href="<?php echo site_url('administrator/role'); ?>"><?php echo $this->lang->line('user_role'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'administrator', 'permission')){ ?>
                   | <a href="<?php echo site_url('administrator/permission'); ?>"><?php echo $this->lang->line('role_permission'); ?></a>                   
                <?php } ?>
                <?php if(has_permission(VIEW, 'administrator', 'user')){ ?>
                   | <a href="<?php echo site_url('administrator/user'); ?>"><?php echo $this->lang->line('manage_user'); ?></a>                
                <?php } ?>
                <?php if(has_permission(EDIT, 'administrator', 'password')){ ?>
                   | <a href="<?php echo site_url('administrator/password'); ?>"><?php echo $this->lang->line('reset_user_password'); ?></a>                   
                <?php } ?>
                <?php if(has_permission(VIEW, 'administrator', 'backup')){ ?>
                   | <a href="<?php echo site_url('administrator/backup'); ?>"><?php echo $this->lang->line('backup'); ?> <?php echo $this->lang->line('database'); ?></a>                  
                <?php } ?>
            </div>
            <div class="x_content">

                <div class="" data-example-id="togglable-tabs">
                    
                    <ul  class="nav nav-tabs bordered">                 
                        <li  class="active"><a href="#tab_password_reset" role="tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-download"></i> <?php echo $this->lang->line('backup'); ?> <?php echo $this->lang->line('database'); ?></a></li>                          
                    </ul>
                    <br/>
                     <div class="tab-content">
                        <div  class="tab-pane fade in active" id="tab_password_reset" >
                            <div class="x_content"> 
                               <?php echo form_open(site_url('administrator/backup'), array('name' => 'backup', 'id' => 'backup', 'class'=>'form-horizontal form-label-left'), ''); ?>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" value="0" name="hidden">
                                        <a href="<?php echo site_url('dashboard'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><i class="fa fa-download"></i> <?php echo $this->lang->line('download'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>