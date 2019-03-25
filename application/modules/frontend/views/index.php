<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa fa-desktop"></i><small> <?php echo $this->lang->line('manage_frontend_page'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content quick-link">
                <?php echo $this->lang->line('quick_link'); ?>:
                <?php if(has_permission(VIEW, 'frontend', 'frontend')){ ?>
                   <a href="<?php echo site_url('frontend/index'); ?>"><?php echo $this->lang->line('manage_frontend'); ?> </a>                    
                <?php } ?>
                <?php if(has_permission(VIEW, 'frontend', 'slider')){ ?>
                   | <a href="<?php echo site_url('frontend/slider/index'); ?>"><?php echo $this->lang->line('manage_slider'); ?> </a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'setting', 'setting')){ ?>
                   | <a href="<?php echo site_url('setting'); ?>"><?php echo $this->lang->line('frontend'); ?> <?php echo $this->lang->line('setting'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'announcement', 'notice')){ ?>
                   | <a href="<?php echo site_url('announcement/notice/index'); ?>"><?php echo $this->lang->line('manage_notice'); ?></a>
                <?php } ?>    
                <?php if(has_permission(VIEW, 'announcement', 'news')){ ?>
                   | <a href="<?php echo site_url('announcement/news/index'); ?>"><?php echo $this->lang->line('manage_news'); ?></a>
                <?php } ?>    
                <?php if(has_permission(VIEW, 'announcement', 'holiday')){ ?>
                   | <a href="<?php echo site_url('announcement/holiday/index'); ?>"><?php echo $this->lang->line('manage_holiday'); ?></a>                    
                <?php } ?>
                <?php if(has_permission(VIEW, 'teacher', 'teacher')){ ?>
                  | <a href="<?php echo site_url('teacher/index'); ?>"><?php echo $this->lang->line('manage_teacher'); ?> </a>                    
                <?php } ?>   
                <?php if(has_permission(VIEW, 'hrm', 'employee')){ ?>
                   | <a href="<?php echo site_url('hrm/employee'); ?>"><?php echo $this->lang->line('manage_employee'); ?></a>
                <?php } ?>   
                
                
            </div>
            
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                    
                    <ul  class="nav nav-tabs bordered">
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_page_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
                        <?php if(isset($add)){ ?>
                            <?php if(has_permission(ADD, 'frontend', 'frontend')){ ?>
                               <li  class="active"><a href="#tab_add_page"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('page'); ?></a> </li>                          
                            <?php } ?>
                         <?php } ?>
                            
                        <?php if(isset($edit)){ ?>
                            <li  class="active"><a href="#tab_edit_page"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('page'); ?></a> </li>                          
                        <?php } ?>                
                        <?php if(isset($detail)){ ?>
                            <li  class="active"><a href="#tab_view_page"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> <?php echo $this->lang->line('page'); ?></a> </li>                          
                        <?php } ?>                
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_page_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                        <th><?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('name'); ?></th>
                                        <th><?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('title'); ?></th>
                                        <th><?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('image'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?></th>                                            
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php $count = 1; if(isset($pages) && !empty($pages)){ ?>
                                        <?php foreach($pages as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $obj->page_name; ?></td>
                                            <td><?php echo $obj->page_title; ?></td>
                                            <td>
                                                <?php  if($obj->page_image != ''){ ?>
                                                <img src="<?php echo UPLOAD_PATH; ?>/page/<?php echo $obj->page_image; ?>" alt="" width="150" /> 
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if(has_permission(EDIT, 'frontend', 'frontend')){ ?>
                                                    <a href="<?php echo site_url('frontend/edit/'.$obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                <?php } ?>
                                                <?php if(has_permission(VIEW, 'frontend', 'frontend')){ ?>
                                                    <a href="<?php echo site_url('frontend/view/'.$obj->id); ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>
                                                <?php } ?>
                                                <?php if(has_permission(DELETE, 'frontend', 'frontend')){ ?>
                                                    <a href="<?php echo site_url('frontend/delete/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_add_page">
                            <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('frontend/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_name"><?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('name'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="page_name"  id="page_name" value="<?php echo isset($post['page_name']) ?  $post['page_name'] : ''; ?>" placeholder="<?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('name'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('page_name'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_title"><?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('title'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="page_title"  id="page_title" value="<?php echo isset($post['page_title']) ?  $post['page_title'] : ''; ?>" placeholder="<?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('title'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('page_title'); ?></div>
                                    </div>
                                </div>
                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_description"><?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('description'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="page_description"  id="add_page_description" placeholder="<?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('description'); ?>"><?php echo isset($post['page_description']) ?  $post['page_description'] : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('page_description'); ?></div>
                                    </div>
                                </div>
                               
                                
                               <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('image'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="image"  id="image" type="file">
                                        </div>
                                        <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                        <div class="help-block"><?php echo form_error('page_image'); ?></div>
                                    </div>
                               </div>
                                
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('frontend/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if(isset($edit)){ ?>
                        <div class="tab-pane fade in active" id="tab_edit_page">
                            <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('frontend/edit/'.$page->id), array('name' => 'edit', 'id' => 'edit', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_name"><?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('name'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="page_name"  id="page_name" value="<?php echo isset($page->page_name) ?  $page->page_name : $post['page_name']; ?>" placeholder="<?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('name'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('page_name'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_title">

                                     <?php if($page->id=='4'){


                                        echo 'MD Name' ?> <span class="required">*</span>
                                    <?php } elseif($page->id=='5'){

                                         echo 'Principal Name' ?> <span class="required">*</span>
                                    <?php
                                        }else
                                    {
                                     echo $this->lang->line('page'); 
                                     echo $this->lang->line('title'); ?> 

                                     <span class="required">*</span>
                                    <?php }?>
                                    </label>
                                   
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class="form-control col-md-7 col-xs-12"  name="page_title"  id="page_title" value="<?php echo isset($page->page_title) ?  $page->page_title : $post['page_title']; ?>" placeholder="<?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('title'); ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('page_title'); ?></div>
                                        </div>
                                    
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_description"><?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('description'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="page_description"  id="edit_page_description" placeholder="<?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('description'); ?>"><?php echo isset($page->page_description) ?  $page->page_description : $post['page_description']; ?></textarea>
                                        <div class="help-block"><?php echo form_error('page_description'); ?></div>
                                    </div>
                                </div>                                                         
                                                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('image'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="hidden" name="prev_image" id="prev_image" value="<?php echo $page->page_image; ?>" />
                                        <?php if($page->page_image){ ?>
                                        <img src="<?php echo UPLOAD_PATH; ?>/page/<?php echo $page->page_image; ?>" alt="" width="150" /><br/><br/>
                                        <?php } ?>
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="image"  id="image" type="file">
                                        </div>
                                        <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                        <div class="help-block"><?php echo form_error('page_image'); ?></div>
                                    </div>
                                </div>
                                                         
                                                                                             
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" value="<?php echo isset($page) ? $page->id : $id; ?>" name="id" />
                                        <a href="<?php echo site_url('frontend/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  
                        <?php } ?>
                        
                        
                        <?php if(isset($detail)){ ?>
                        <div class="tab-pane fade in active" id="tab_view_page">
                            <div class="x_content"> 
                               <?php echo form_open_multipart(site_url(), array('name' => 'detail', 'id' => 'detail', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('name'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $page->page_name; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4">
                                    <?php 

                                    if($page->id=='4')
                                    {
                                        echo 'MD Name'; 
                                    }elseif ($page->id=='5') {
                                        echo 'Principal Name';
                                    }
                                    else{
                                        echo $this->lang->line('page'); 
                                        echo $this->lang->line('title');
                                    }?>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $page->page_title; ?>
                                    </div>
                                </div>
                               
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('description'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $page->page_description; ?>
                                    </div>
                                </div>
                               
                                                                
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('page'); ?> <?php echo $this->lang->line('image'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php if($page->page_image){ ?>
                                    <img src="<?php echo UPLOAD_PATH; ?>/page/<?php echo $page->page_image; ?>" alt=""  class="img-responsive" /><br/><br/>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('modified'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo date('M j, Y', strtotime($page->modified_at)); ?>
                                    </div>
                                </div>     
                                
                                <?php if(has_permission(EDIT, 'frontend', 'frontend')){ ?>                                                             
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <a href="<?php echo site_url('frontend/edit/'.$page->id); ?>" class="btn btn-primary"><?php echo $this->lang->line('update'); ?></a>
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

 <link href="<?php echo VENDOR_URL; ?>editor/jquery-te-1.4.0.css" rel="stylesheet">
 <script type="text/javascript" src="<?php echo VENDOR_URL; ?>editor/jquery-te-1.4.0.min.js"></script>
 <script type="text/javascript">
     
  $('#add_page_description').jqte();
  $('#edit_page_description').jqte();
  
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
  <style type="text/css">
      .jqte_editor{height: 250px;}
  </style>
      