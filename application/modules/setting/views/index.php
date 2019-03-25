<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-gears "></i><small> <?php echo $this->lang->line('general'); ?> <?php echo $this->lang->line('setting'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
                
            </div>
            <div class="x_content quick-link">
                <?php echo $this->lang->line('quick_link'); ?>:
                <?php if(has_permission(VIEW, 'setting', 'setting')){ ?>
                    <a href="<?php echo site_url('setting'); ?>"><?php echo $this->lang->line('general'); ?> <?php echo $this->lang->line('setting'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'setting', 'payment')){ ?>
                   | <a href="<?php echo site_url('setting/payment'); ?>"><?php echo $this->lang->line('payment'); ?> <?php echo $this->lang->line('setting'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'setting', 'sms')){ ?>
                   | <a href="<?php echo site_url('setting/sms'); ?>"><?php echo $this->lang->line('sms'); ?> <?php echo $this->lang->line('setting'); ?></a>                    
                <?php } ?>
                <?php if(has_permission(VIEW, 'frontend', 'frontend')){ ?>
                   | <a href="<?php echo site_url('frontend/index'); ?>"><?php echo $this->lang->line('manage_frontend'); ?> </a>                    
                <?php } ?>
            </div>
            
            
             <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                     <ul  class="nav nav-tabs bordered">                     
                        <li  class="active"><a href="#tab_setting"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> <?php echo $this->lang->line('general'); ?> <?php echo $this->lang->line('setting'); ?></a> </li> 
                     </ul>
                     <br/>
                     <div class="tab-content">
                         <div class="tab-pane fade in active"id="tab_setting">
                            <div class="x_content"> 
                                <?php $action = isset($setting) ? 'edit' : 'add'; ?>
                                <?php echo form_open_multipart(site_url('setting/'. $action), array('name' => 'setting', 'id' => 'setting', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                <input type="hidden" value="<?php echo isset($setting) ? $setting->id : ''; ?>" name="id" />
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_name"><?php echo $this->lang->line('school'); ?> <?php echo $this->lang->line('name'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="school_name" value="<?php echo isset($setting) ? $setting->school_name : ''; ?>"  placeholder="<?php echo $this->lang->line('school'); ?> <?php echo $this->lang->line('name'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('school_name'); ?></div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address"><?php echo $this->lang->line('address'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="address" value="<?php echo isset($setting) ? $setting->address : ''; ?>"  placeholder="<?php echo $this->lang->line('address'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('address'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone"><?php echo $this->lang->line('phone'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="phone" value="<?php echo isset($setting) ? $setting->phone : ''; ?>"  placeholder="<?php echo $this->lang->line('phone'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('phone'); ?></div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="other_phone"><?php echo 'Other '; ?><?php echo $this->lang->line('phone'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="other_phone" value="<?php echo isset($setting) ? $setting->other_phone : ''; ?>"  placeholder="<?php echo $this->lang->line('phone'); ?>"  type="text">
                                        <div class="help-block"><?php echo form_error('other_phone'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_fax"><?php echo $this->lang->line('school_fax'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="school_fax" value="<?php echo isset($setting) ? $setting->school_fax : ''; ?>"  placeholder="<?php echo $this->lang->line('school_fax'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('school_fax'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"><?php echo $this->lang->line('email'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="email" value="<?php echo isset($setting) ? $setting->email : ''; ?>"  placeholder="<?php echo $this->lang->line('email'); ?>" required="required" type="email">
                                        <div class="help-block"><?php echo form_error('email'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="currency"><?php echo $this->lang->line('currency'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="currency" value="<?php echo isset($setting) ? $setting->currency : ''; ?>"  placeholder="<?php echo $this->lang->line('currency'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('currency'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="currency_symbol"><?php echo $this->lang->line('currency_symbol'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="currency_symbol" value="<?php echo isset($setting) ? $setting->currency_symbol : ''; ?>"  placeholder="<?php echo $this->lang->line('currency_symbol'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('currency_symbol'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="language"><?php echo $this->lang->line('language'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="language"  required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php foreach($fields as $field){ ?>
                                                <?php  if($field == 'id' || $field == 'label'){ continue; } ?>
                                            <option value="<?php echo $field; ?>" <?php if(isset($setting) && $setting->language == $field){ echo 'selected="selected"';} ?>><?php echo ucfirst($field); ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('language'); ?></div>
                                    </div>
                                </div>
                                                               

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo"><?php echo $this->lang->line('logo'); ?> <?php if(!$setting->logo){ ?> <span class="required">*</span> <?php } ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                         <?php if($setting->logo){ ?>
                                            <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $setting->logo; ?>" alt="" width="70" /><br/><br/>
                                             <input name="logo_prev" value="<?php echo isset($setting) ? $setting->logo : ''; ?>"  type="hidden">
                                        <?php } ?>
                                        <div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="logo" id="logo" <?php if(!$setting->logo){ ?> required="required" <?php } ?> type="file">
                                        </div>
                                        <div class="help-block"><?php echo form_error('logo'); ?></div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="running_year"><?php echo $this->lang->line('running_year'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="running_year" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php foreach($years as $obj){ ?>
                                                <option value="<?php echo $obj->session_year; ?>" <?php if(isset($setting) && $setting->running_year == $obj->session_year){ echo 'selected="selected"';} ?>><?php echo $obj->session_year; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('running_year'); ?></div>
                                    </div>
                                </div>
                                
                                 
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_geocode"> <?php echo $this->lang->line('school_geocode'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="school_geocode" value="<?php echo isset($setting) ? $setting->school_geocode : ''; ?>"  placeholder="<?php echo $this->lang->line('school_geocode'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('school_geocode'); ?></div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="classes"> <?php echo 'No Of '.$this->lang->line('class'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="classes" value="<?php echo isset($setting) ? $setting->classes : ''; ?>"  placeholder="<?php echo $this->lang->line('class'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('classes'); ?></div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="students"> <?php echo 'No Of '.$this->lang->line('student'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="students" value="<?php echo isset($setting) ? $setting->students : ''; ?>"  placeholder="<?php echo $this->lang->line('student'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('students'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook_url"><?php echo $this->lang->line('facebook_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="facebook_url" value="<?php echo isset($setting) ? $setting->facebook_url : ''; ?>"  placeholder="<?php echo $this->lang->line('facebook_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('facebook_url'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="twitter_url"><?php echo $this->lang->line('twitter_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="twitter_url" value="<?php echo isset($setting) ? $setting->twitter_url : ''; ?>"  placeholder="<?php echo $this->lang->line('twitter_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('twitter_url'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="linkedin_url"><?php echo $this->lang->line('linkedin_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="linkedin_url" value="<?php echo isset($setting) ? $setting->linkedin_url : ''; ?>"  placeholder="<?php echo $this->lang->line('linkedin_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('linkedin_url'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="google_plus_url"><?php echo $this->lang->line('google_plus_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="google_plus_url" value="<?php echo isset($setting) ? $setting->google_plus_url : ''; ?>"  placeholder="<?php echo $this->lang->line('google_plus_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('google_plus_url'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="youtube_url"><?php echo $this->lang->line('youtube_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="youtube_url" value="<?php echo isset($setting) ? $setting->youtube_url : ''; ?>"  placeholder="<?php echo $this->lang->line('youtube_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('youtube_url'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="instagram_url"><?php echo $this->lang->line('instagram_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="instagram_url" value="<?php echo isset($setting) ? $setting->instagram_url : ''; ?>"  placeholder="<?php echo $this->lang->line('instagram_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('instagram_url'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pinterest_url"><?php echo $this->lang->line('pinterest_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="pinterest_url" value="<?php echo isset($setting) ? $setting->pinterest_url : ''; ?>"  placeholder="<?php echo $this->lang->line('pinterest_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('pinterest_url'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="footer"><?php echo $this->lang->line('footer'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="footer" value="<?php echo isset($setting) ? $setting->footer : ''; ?>"  placeholder="<?php echo $this->lang->line('footer'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('footer'); ?></div>
                                    </div>
                                </div>

                                
                                <?php if(empty($years)){ ?>
                                 <div class="item form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12  col-md-offset-3">
                                        <div class="instructions no-margin"><strong><?php echo $this->lang->line('instruction'); ?>: </strong> <?php echo $this->lang->line('create'); ?> <?php echo $this->lang->line('academic_year'); ?></div>
                                    </div>
                                </div>
                                <?php } ?>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('dashboard'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php  echo $action == 'add' ? $this->lang->line('submit') : $this->lang->line('update'); ?></button>
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
<script type="text/javascript">
    $("#setting").validate();  
</script>