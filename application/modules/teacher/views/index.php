<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-users"></i><small> <?php echo $this->lang->line('manage_teacher'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content quick-link">
                <?php echo $this->lang->line('quick_link'); ?>:
                <?php if(has_permission(VIEW, 'teacher', 'teacher')){ ?>
                   <a href="<?php echo site_url('teacher/index'); ?>"><?php echo $this->lang->line('manage_teacher'); ?> </a>                    
                <?php } ?>
                <?php if(has_permission(VIEW, 'frontend', 'frontend')){ ?>
                   | <a href="<?php echo site_url('frontend/index'); ?>"><?php echo $this->lang->line('manage_frontend'); ?> </a>
                <?php } ?>
                 
            </div>
            
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                    
                    <ul  class="nav nav-tabs bordered">
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_teacher_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('teacher'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
                        
                        <?php if(has_permission(ADD, 'teacher', 'teacher')){ ?>
                        <li  class=""><a href="#tab_add_teacher"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('teacher'); ?></a> </li>                          
                        <?php } ?>  
                        
                        <?php if(isset($edit)){ ?>
                            <li  class="active"><a href="#tab_edit_teacher"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('teacher'); ?></a> </li>                          
                        <?php } ?>   
                            
                         <?php if(isset($detail)){ ?>
                            <li  class="active"><a href="#tab_view_teacher"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> <?php echo $this->lang->line('teacher'); ?></a> </li>                          
                        <?php } ?>   
                            
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_teacher_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                        <th><?php echo $this->lang->line('photo'); ?></th>
                                        <th><?php echo $this->lang->line('name'); ?></th>
                                        <th><?php echo $this->lang->line('responsibility'); ?></th>
                                        <th><?php echo $this->lang->line('phone'); ?></th>
                                        <th><?php echo $this->lang->line('email'); ?></th>
                                        <th><?php echo $this->lang->line('join_date'); ?></th>
                                        <th><?php echo $this->lang->line('is_view_on_web'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?></th>                                            
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php  $count = 1; if(isset($teachers) && !empty($teachers)){ ?>
                                        <?php foreach($teachers as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td>
                                                <?php  if($obj->photo != ''){ ?>
                                                <img src="<?php echo UPLOAD_PATH; ?>/teacher-photo/<?php echo $obj->photo; ?>" alt="" width="70" /> 
                                                <?php }else{ ?>
                                                <img src="<?php echo IMG_URL; ?>/default-user.png" alt="" width="70" /> 
                                                <?php } ?>
                                            </td>
                                            <td><?php echo ucfirst($obj->name); ?></td>
                                            <td><?php echo $obj->responsibility; ?></td>
                                            <td><?php echo $obj->phone; ?></td>
                                            <td><?php echo $obj->email; ?></td>
                                            <td><?php echo $obj->joining_date; ?></td>
                                            <td><?php echo $obj->is_view_on_web ? $this->lang->line('yes') : $this->lang->line('no'); ?></td>
                                            <td>
                                                <?php if(has_permission(EDIT, 'teacher', 'teacher')){ ?>
                                                    <a href="<?php echo site_url('teacher/edit/'.$obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a><br/>
                                                <?php } ?> 
                                                <?php if(has_permission(VIEW, 'teacher', 'teacher')){ ?>    
                                                <a href="<?php echo site_url('teacher/view/'.$obj->id); ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a><br/>
                                                <?php } ?>
                                                <?php if(has_permission(DELETE, 'teacher', 'teacher')){ ?>
                                                    <a href="<?php echo site_url('teacher/delete/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                <?php } ?> 
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in " id="tab_add_teacher">
                            <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('teacher/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $this->lang->line('name'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo isset($post['name']) ?  $post['name'] : ''; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('name'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="responsibility"><?php echo $this->lang->line('responsibility'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="responsibility"  id="responsibility" value="<?php echo isset($post['responsibility']) ?  $post['responsibility'] : ''; ?>" placeholder="<?php echo $this->lang->line('responsibility'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('responsibility'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone"><?php echo $this->lang->line('phone'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="phone" value="<?php echo isset($post['phone']) ?  $post['phone'] : ''; ?>" placeholder="<?php echo $this->lang->line('phone'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('phone'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="present_address"><?php echo $this->lang->line('present'); ?> <?php echo $this->lang->line('address'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="present_address"  id="present_address" placeholder="<?php echo $this->lang->line('present'); ?> <?php echo $this->lang->line('address'); ?>"><?php echo isset($post['present_address']) ?  $post['present_address'] : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('present_address'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="permanent_address"><?php echo $this->lang->line('permanent'); ?> <?php echo $this->lang->line('address'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="permanent_address"  id="permanent_address" placeholder="<?php echo $this->lang->line('permanent'); ?> <?php echo $this->lang->line('address'); ?>"><?php echo isset($post['permanent_address']) ?  $post['permanent_address'] : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('permanent_address'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender"><?php echo $this->lang->line('gender'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="gender"  id="gender" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php $genders = get_genders(); ?>
                                            <?php foreach($genders as $key=>$value){ ?>
                                                <option value="<?php echo $key; ?>" <?php echo isset($post['gender']) && $post['gender'] == $key ?  'selected="selected"' : ''; ?>><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('gender'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blood_group"><?php echo $this->lang->line('blood_group'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12" name="blood_group" id="blood_group">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php $bloods = get_blood_group(); ?>
                                            <?php foreach($bloods as $key=>$value){ ?>
                                                <option value="<?php echo $key; ?>" <?php echo isset($post['blood_group']) && $post['blood_group'] == $key ?  'selected="selected"' : ''; ?>><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('blood_group'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="religion"><?php echo $this->lang->line('religion'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="religion"  id="religion" value="<?php echo isset($post['religion']) ?  $post['religion'] : ''; ?>" placeholder="<?php echo $this->lang->line('religion'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('religion'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob"><?php echo $this->lang->line('birth_date'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="dob"  id="add_dob" value="<?php echo isset($post['dob']) ?  $post['dob'] : ''; ?>" placeholder="<?php echo $this->lang->line('birth_date'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('dob'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="joining_date"><?php echo $this->lang->line('join_date'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="joining_date"  id="add_joining_date" value="<?php echo isset($post['joining_date']) ?  $post['joining_date'] : ''; ?>" placeholder="<?php echo $this->lang->line('join_date'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('joining_date'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_id"><?php echo $this->lang->line('role'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12" name="role_id" id="role_id" required="required">
                                            <?php foreach($roles as $obj){ ?>
                                                <?php if(in_array($obj->id, array(TEACHER))){ ?>
                                                <option value="<?php echo $obj->id; ?>"><?php echo $obj->name; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('role_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="salary_grade_id"><?php echo $this->lang->line('salary_grade'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12" name="salary_grade_id" id="salary_grade_id" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php foreach($grades as $obj){ ?>                                           
                                                <option value="<?php echo $obj->id; ?>"><?php echo $obj->grade_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('salary_grade_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="salary_type"><?php echo $this->lang->line('salary_type'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12" name="salary_type" id="salary_type" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                            <option value="monthly"><?php echo $this->lang->line('monthly'); ?></option>                                           
                                            <option value="hourly"><?php echo $this->lang->line('hourly'); ?></option>                                           
                                        </select>
                                        <div class="help-block"><?php echo form_error('salary_type'); ?></div>
                                    </div>
                                </div>
                                
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"><?php echo $this->lang->line('email'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="email"  id="email" value="<?php echo isset($post['email']) ?  $post['email'] : ''; ?>" placeholder="<?php echo $this->lang->line('email'); ?>" required="email" type="email">
                                        <div class="help-block"><?php echo form_error('email'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password"><?php echo $this->lang->line('password'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="password"  id="password"  placeholder="<?php echo $this->lang->line('password'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('password'); ?></div>
                                    </div>
                                </div>
                                
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('photo'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="photo"  id="photo"  type="file">
                                        </div>
                                        <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                        <div class="help-block"><?php echo form_error('photo'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('resume'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="resume"  id="resume"  type="file">
                                        </div>
                                        <div class="text-info"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
                                        <div class="help-block"><?php echo form_error('resume'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook_url"><?php echo $this->lang->line('facebook_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="facebook_url"  id="facebook_url" value="<?php echo isset($post['facebook_url']) ?  $post['facebook_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('facebook_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('facebook_url'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="linkedin_url"><?php echo $this->lang->line('linkedin_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="linkedin_url"  id="linkedin_url" value="<?php echo isset($post['linkedin_url']) ?  $post['linkedin_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('linkedin_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('linkedin_url'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="twitter_url"><?php echo $this->lang->line('twitter_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="twitter_url"  id="twitter_url" value="<?php echo isset($post['twitter_url']) ?  $post['twitter_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('twitter_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('twitter_url'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="google_plus_url"><?php echo $this->lang->line('google_plus_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="google_plus_url"  id="google_plus_url" value="<?php echo isset($post['google_plus_url']) ?  $post['google_plus_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('google_plus_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('google_plus_url'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="instagram_url"><?php echo $this->lang->line('instagram_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="instagram_url"  id="instagram_url" value="<?php echo isset($post['instagram_url']) ?  $post['instagram_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('instagram_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('instagram_url'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="youtube_url"><?php echo $this->lang->line('youtube_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="youtube_url"  id="youtube_url" value="<?php echo isset($post['youtube_url']) ?  $post['youtube_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('youtube_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('youtube_url'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pinterest_url"><?php echo $this->lang->line('pinterest_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="pinterest_url"  id="pinterest_url" value="<?php echo isset($post['pinterest_url']) ?  $post['pinterest_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('pinterest_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('pinterest_url'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="other_info"><?php echo $this->lang->line('other_info'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="other_info"  id="other_info" placeholder="<?php echo $this->lang->line('other_info'); ?>"><?php echo isset($post['other_info']) ?  $post['other_info'] : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('other_info'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="is_view_on_web"><?php echo $this->lang->line('is_view_on_web'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12" name="is_view_on_web" id="is_view_on_web">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                            <option value="1"><?php echo $this->lang->line('yes'); ?></option>                                           
                                            <option value="0"><?php echo $this->lang->line('no'); ?></option>                                           
                                        </select>
                                        <div class="help-block"><?php echo form_error('is_view_on_web'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('teacher'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if(isset($edit)){ ?>
                        
                        <div class="tab-pane fade in active" id="tab_edit_teacher">
                            <div class="x_content"> 
                            <?php echo form_open_multipart(site_url('teacher/edit/'. $teacher->id), array('name' => 'editteacher', 'id' => 'editteacher', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $this->lang->line('name'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo isset($teacher->name) ?  $teacher->name : $post['name']; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('name'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="responsibility"><?php echo $this->lang->line('responsibility'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="responsibility"  id="responsibility" value="<?php echo isset($teacher->responsibility) ?  $teacher->responsibility : $post['responsibility']; ?>" placeholder="<?php echo $this->lang->line('responsibility'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('responsibility'); ?></div>
                                    </div>
                                </div>
                               
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone"><?php echo $this->lang->line('phone'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="phone" value="<?php echo isset($teacher->phone) ?  $teacher->phone : $post['phone']; ?>" placeholder="<?php echo $this->lang->line('phone'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('phone'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="present_address"><?php echo $this->lang->line('present'); ?> <?php echo $this->lang->line('address'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="present_address"  id="present_address" placeholder="<?php echo $this->lang->line('present'); ?> <?php echo $this->lang->line('address'); ?>"><?php echo isset($teacher->present_address) ?  $teacher->present_address : $post['present_address']; ?></textarea>
                                        <div class="help-block"><?php echo form_error('present_address'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="permanent_address"><?php echo $this->lang->line('permanent'); ?> <?php echo $this->lang->line('address'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="permanent_address"  id="permanent_address" placeholder="<?php echo $this->lang->line('permanent'); ?> <?php echo $this->lang->line('address'); ?>"><?php echo isset($teacher->permanent_address) ?  $teacher->permanent_address : $post['permanent_address']; ?></textarea>
                                        <div class="help-block"><?php echo form_error('permanent_address'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender"><?php echo $this->lang->line('gender'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="gender"  id="gender" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php $genders = get_genders(); ?>
                                            <?php foreach($genders as $key=>$value){ ?>
                                                <option value="<?php echo $key; ?>" <?php if($teacher->gender == $key){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('gender'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blood_group"><?php echo $this->lang->line('blood_group'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12" name="blood_group" id="blood_group">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php $bloods = get_blood_group(); ?>
                                            <?php foreach($bloods as $key=>$value){ ?>
                                                <option value="<?php echo $key; ?>" <?php if($teacher->blood_group == $key){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('blood_group'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="religion"><?php echo $this->lang->line('religion'); ?> 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="religion"  id="religion" value="<?php echo isset($teacher->religion) ?  $teacher->religion : $post['religion']; ?>" placeholder="<?php echo $this->lang->line('religion'); ?>"  type="text">
                                        <div class="help-block"><?php echo form_error('religion'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob"><?php echo $this->lang->line('birth_date'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="dob"  id="edit_dob" value="<?php echo isset($teacher->dob) ?  date('d-m-Y', strtotime($teacher->dob)) : $post['dob']; ?>" placeholder="<?php echo $this->lang->line('birth_date'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('dob'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="joining_date"><?php echo $this->lang->line('join_date'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="joining_date"  id="edit_joining_date" value="<?php echo isset($teacher->joining_date) ?  date('d-m-Y', strtotime($teacher->joining_date)) : $post['joining_date']; ?>" placeholder="<?php echo $this->lang->line('join_date'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('joining_date'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_id"><?php echo $this->lang->line('role'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12" name="role_id" id="role_id" required="required">
                                            <?php foreach($roles as $obj){ ?>
                                            <?php if(in_array($obj->id, array(TEACHER))){ ?>
                                                <option value="<?php echo $obj->id; ?>" <?php if($teacher->role_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->name; ?></option>
                                            <?php } ?>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('role_id'); ?></div>
                                    </div>
                                </div>
                                
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="salary_grade_id"><?php echo $this->lang->line('salary_grade'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12" name="salary_grade_id" id="salary_grade_id" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php foreach($grades as $obj){ ?>                                           
                                                <option value="<?php echo $obj->id; ?>" <?php if($teacher->salary_grade_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->grade_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('salary_grade_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="salary_type"><?php echo $this->lang->line('salary_type'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12" name="salary_type" id="salary_type" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                            <option value="monthly" <?php if($teacher->salary_type == 'monthly'){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('monthly'); ?></option>                                           
                                            <option value="hourly" <?php if($teacher->salary_type == 'hourly'){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('hourly'); ?></option>                                           
                                        </select>
                                        <div class="help-block"><?php echo form_error('salary_type'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"><?php echo $this->lang->line('email'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="email" readonly="readonly"  id="email" value="<?php echo isset($teacher->email) ?  $teacher->email : $post['email']; ?>" placeholder="<?php echo $this->lang->line('email'); ?>" required="email" type="email">
                                        <div class="help-block"><?php echo form_error('email'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('photo'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="hidden" name="prev_photo" id="prev_photo" value="<?php echo $teacher->photo; ?>" />
                                        <?php if($teacher->photo){ ?>
                                        <img src="<?php echo UPLOAD_PATH; ?>/teacher-photo/<?php echo $teacher->photo; ?>" alt="" width="70" /><br/><br/>
                                        <?php } ?>
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="photo"  id="photo" type="file">
                                        </div>
                                        <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                        <div class="help-block"><?php echo form_error('photo'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('resume'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="hidden" name="prev_resume" id="prev_resume" value="<?php echo $teacher->resume; ?>" />
                                        <?php if($teacher->resume){ ?>
                                        <a href="<?php echo UPLOAD_PATH; ?>/teacher-resume/<?php echo $teacher->resume; ?>"><?php echo $teacher->resume; ?></a> <br/>
                                        <?php } ?>
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="resume"  id="resume" type="file">
                                        </div>
                                        <div class="text-info"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
                                        <div class="help-block"><?php echo form_error('resume'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook_url"><?php echo $this->lang->line('facebook_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="facebook_url"  id="facebook_url" value="<?php echo isset($teacher->facebook_url) ?  $teacher->facebook_url : ''; ?>" placeholder="<?php echo $this->lang->line('facebook_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('facebook_url'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="linkedin_url"><?php echo $this->lang->line('linkedin_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="linkedin_url"  id="linkedin_url" value="<?php echo isset($teacher->linkedin_url) ?  $teacher->linkedin_url : ''; ?>" placeholder="<?php echo $this->lang->line('linkedin_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('linkedin_url'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="twitter_url"><?php echo $this->lang->line('twitter_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="twitter_url"  id="twitter_url" value="<?php echo isset($teacher->twitter_url) ?  $teacher->twitter_url : ''; ?>" placeholder="<?php echo $this->lang->line('twitter_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('twitter_url'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="google_plus_url"><?php echo $this->lang->line('google_plus_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="google_plus_url"  id="google_plus_url" value="<?php echo isset($teacher->google_plus_url) ?  $teacher->google_plus_url : ''; ?>" placeholder="<?php echo $this->lang->line('google_plus_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('google_plus_url'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="instagram_url"><?php echo $this->lang->line('instagram_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="instagram_url"  id="instagram_url" value="<?php echo isset($teacher->instagram_url) ?  $teacher->instagram_url : ''; ?>" placeholder="<?php echo $this->lang->line('instagram_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('instagram_url'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="youtube_url"><?php echo $this->lang->line('youtube_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="youtube_url"  id="youtube_url" value="<?php echo isset($teacher->youtube_url) ?  $teacher->youtube_url : ''; ?>" placeholder="<?php echo $this->lang->line('youtube_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('youtube_url'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pinterest_url"><?php echo $this->lang->line('pinterest_url'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="pinterest_url"  id="pinterest_url" value="<?php echo isset($teacher->pinterest_url) ?  $teacher->pinterest_url : ''; ?>" placeholder="<?php echo $this->lang->line('pinterest_url'); ?>" type="text">
                                        <div class="help-block"><?php echo form_error('pinterest_url'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="other_info"><?php echo $this->lang->line('other_info'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="other_info"  id="other_info" placeholder="<?php echo $this->lang->line('other_info'); ?>"><?php echo isset($teacher->other_info) ?  $teacher->other_info : $post['other_info']; ?></textarea>
                                        <div class="help-block"><?php echo form_error('other_info'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="is_view_on_web"><?php echo $this->lang->line('is_view_on_web'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12" name="is_view_on_web" id="is_view_on_web">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                            <option value="1" <?php if($teacher->is_view_on_web == 1){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('yes'); ?></option>                                           
                                            <option value="0" <?php if($teacher->is_view_on_web == 0){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('no'); ?></option>                                           
                                        </select>
                                        <div class="help-block"><?php echo form_error('is_view_on_web'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" name="id" id="id" value="<?php echo $teacher->id; ?>" />
                                        <a href="<?php echo site_url('teacher'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  
                        
                        <?php } ?>
                        
                        <?php if(isset($detail)){ ?>
                        
                        <div class="tab-pane fade in active" id="tab_view_teacher">
                            <div class="x_content"> 
                            <?php echo form_open_multipart(site_url(), array('name' => 'edit', 'id' => 'edit', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('name'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                        : <?php echo $teacher->name; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('responsibility'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">                                        
                                        : <?php echo $teacher->responsibility; ?>                                          
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('phone'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                        : <?php echo $teacher->phone; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('present'); ?> <?php echo $this->lang->line('address'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                       : <?php echo $teacher->present_address; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('permanent'); ?> <?php echo $this->lang->line('address'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                       : <?php echo $teacher->permanent_address; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('gender'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">                                            
                                        : <?php echo $this->lang->line($teacher->gender); ?>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('blood_group'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                         : <?php echo $this->lang->line($teacher->blood_group); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('religion'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $teacher->religion; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('birth_date'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo date('M j, Y', strtotime($teacher->dob)); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('join_date'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                     : <?php echo date('M j, Y', strtotime($teacher->joining_date)); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('role'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                     : <?php echo $teacher->role; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('salary_grade'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                     : <?php echo $teacher->grade_name; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('salary_type'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                     : <?php echo $this->lang->line($teacher->salary_type); ?>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('email'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                     : <?php echo $teacher->email; ?>
                                    </div>
                                </div>
                                 
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('photo'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php if($teacher->photo){ ?>
                                        <img src="<?php echo UPLOAD_PATH; ?>/teacher-photo/<?php echo $teacher->photo; ?>" alt="" width="70" /><br/><br/>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('resume'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php if($teacher->resume){ ?>
                                        <a href="<?php echo UPLOAD_PATH; ?>/teacher-resume/<?php echo $teacher->resume; ?>" class="btn btn-success btn-xs"> <i class="fa fa-download"></i> <?php echo $this->lang->line('download'); ?></a> <br/>
                                        <?php } ?>                                        
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('facebook_url'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                     : <?php echo $teacher->facebook_url; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('linkedin_url'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                     : <?php echo $teacher->linkedin_url; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('twitter_url'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                     : <?php echo $teacher->twitter_url; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('google_plus_url'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                     : <?php echo $teacher->google_plus_url; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('instagram_url'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                     : <?php echo $teacher->instagram_url; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('pinterest_url'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                     : <?php echo $teacher->pinterest_url; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('youtube_url'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                     : <?php echo $teacher->youtube_url; ?>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('other_info'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                     : <?php echo $teacher->other_info; ?>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('is_view_on_web'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                     : <?php echo $teacher->is_view_on_web ? $this->lang->line('yes') : $this->lang->line('no'); ?>
                                    </div>
                                </div>
                                <?php if(has_permission(EDIT, 'teacher', 'teacher')){ ?>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <a href="<?php echo site_url('teacher/edit/'.$teacher->id); ?>" class="btn btn-primary"><?php echo $this->lang->line('update'); ?></a>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php echo form_close(); ?>
                            </div>
                        </div>                          
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- datatable with buttons -->
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
 <script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
<!-- datatable with buttons -->
 <script type="text/javascript">
     
    $('#add_dob').datepicker();
    $('#add_joining_date').datepicker();
    $('#edit_dob').datepicker();
    $('#edit_joining_date').datepicker();
    
        $(document).ready(function() {
          $('#datatable-responsive').DataTable( {
              dom: 'Bfrtip',
              iDisplayLength: 15,
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
                  'pageLength'
              ],
              search: true
          });
        });
        
    $("#add").validate();     
    $("#edit").validate();    
</script>