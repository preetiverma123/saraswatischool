<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-calculator"></i><small> <?php echo $this->lang->line('manage_expenditure'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content quick-link">
                <?php echo $this->lang->line('quick_link'); ?>:
               <?php if(has_permission(VIEW, 'accounting', 'incomehead')){ ?>
                    <a href="<?php echo site_url('accounting/incomehead/index'); ?>"><?php echo $this->lang->line('income_head'); ?></a>                  
                <?php } ?> 
                <?php if(has_permission(VIEW, 'accounting', 'income')){ ?>
                   | <a href="<?php echo site_url('accounting/income/index'); ?>"><?php echo $this->lang->line('manage_income'); ?></a>                     
                <?php } ?> 
                <?php if(has_permission(VIEW, 'accounting', 'invoice')){ ?>
                   
                   <?php if($this->session->userdata('role_id') == STUDENT || $this->session->userdata('role_id') == GUARDIAN){ ?>
                        | <a href="<?php echo site_url('accounting/invoice/due'); ?>"><?php echo $this->lang->line('due_invoice'); ?></a>                    
                   <?php }else{ ?>
                        | <a href="<?php echo site_url('accounting/invoice'); ?>"><?php echo $this->lang->line('manage_invoice'); ?></a>
                        | <a href="<?php echo site_url('accounting/invoice/due'); ?>"><?php echo $this->lang->line('due_invoice'); ?></a>                    
                    <?php } ?> 
                <?php } ?> 
                <?php if(has_permission(VIEW, 'accounting', 'exphead')){ ?>
                   | <a href="<?php echo site_url('accounting/exphead/index'); ?>"><?php echo $this->lang->line('expenditure_head'); ?></a>                  
                <?php } ?> 
                <?php if(has_permission(VIEW, 'accounting', 'expenditure')){ ?>
                   | <a href="<?php echo site_url('accounting/expenditure/index'); ?>"><?php echo $this->lang->line('manage_expenditure'); ?></a>                  
                <?php } ?> 
                
            </div>
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                    
                    <ul  class="nav nav-tabs bordered">
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_expenditure_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('expenditure'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
                        <?php if(has_permission(ADD, 'accounting', 'expenditure')){ ?>
                            <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="#tab_add_expenditure"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('expenditure'); ?></a> </li>                          
                        <?php } ?>
                        <?php if(isset($edit)){ ?>
                            <li  class="active"><a href="#tab_edit_expenditure"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('expenditure'); ?></a> </li>                          
                        <?php } ?>                
                        <?php if(isset($detail)){ ?>
                            <li  class="active"><a href="#tab_view_expenditure"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> <?php echo $this->lang->line('expenditure'); ?></a> </li>                          
                        <?php } ?>                
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_expenditure_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                        <th><?php echo $this->lang->line('academic_year'); ?></th>
                                        <th><?php echo $this->lang->line('expenditure_head'); ?></th>
                                        <th><?php echo $this->lang->line('expenditure'); ?> <?php echo $this->lang->line('method'); ?></th>
                                        <th><?php echo $this->lang->line('amount'); ?></th>
                                        <th><?php echo $this->lang->line('date'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?></th>                                            
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php $count = 1; if(isset($expenditures) && !empty($expenditures)){ ?>
                                        <?php foreach($expenditures as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $obj->session_year; ?></td>
                                            <td><?php echo $obj->head; ?></td>
                                            <td><?php echo $this->lang->line($obj->expenditure_via); ?></td>
                                            <td><?php echo $obj->amount; ?></td>
                                            <td><?php echo date('M j, Y', strtotime($obj->date)); ?></td>
                                            <td>
                                                <?php if(has_permission(VIEW, 'accounting', 'expenditure')){ ?>
                                                    <a href="<?php echo site_url('accounting/expenditure/view/'.$obj->id); ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>
                                                <?php } ?>
                                                <?php if($obj->expenditure_type != 'salary'){ ?>
                                                    <?php if(has_permission(EDIT, 'accounting', 'expenditure')){ ?>
                                                        <a href="<?php echo site_url('accounting/expenditure/edit/'.$obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                    <?php } ?>
                                                    <?php if(has_permission(DELETE, 'accounting', 'expenditure')){ ?>
                                                        <a href="<?php echo site_url('accounting/expenditure/delete/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                    <?php } ?>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_add_expenditure">
                            <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('accounting/expenditure/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                 
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="expenditure_head_id"><?php echo $this->lang->line('expenditure_head'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="expenditure_head_id"  id="expenditure_head_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <?php foreach($expenditure_heads as $obj ){ ?>
                                            <option value="<?php echo $obj->id; ?>"  <?php echo isset($post['expenditure_head_id']) && $post['expenditure_head_id'] == $obj->id ?  'selected="selected"' : ''; ?>><?php echo $obj->title; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('expenditure_head_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="expenditure_via"><?php echo $this->lang->line('expenditure'); ?> <?php echo $this->lang->line('method'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="expenditure_via"  id="expenditure_via" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <?php $payments = get_payment_methods(); ?>
                                            <?php foreach($payments as $key=>$value ){ ?>
                                            <option value="<?php echo $key; ?>"  <?php echo isset($post['expenditure_via']) && $post['expenditure_via'] == $key ?  'selected="selected"' : ''; ?>><?php echo $value; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('expenditure_via'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount"><?php echo $this->lang->line('amount'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="amount"  id="amount" value="<?php echo isset($post['amount']) ?  $post['amount'] : ''; ?>" placeholder="<?php echo $this->lang->line('amount'); ?>" required="required" type="number">
                                        <div class="help-block"><?php echo form_error('amount'); ?></div>
                                    </div>
                                </div>  
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date"><?php echo $this->lang->line('date'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="date"  id="add_date" value="<?php echo isset($post['date']) ?  $post['date'] : ''; ?>" placeholder="<?php echo $this->lang->line('date'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('date'); ?></div>
                                    </div>
                                </div>  
                                
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"><?php echo $this->lang->line('note'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="note"  id="note" placeholder="<?php echo $this->lang->line('note'); ?>"><?php echo isset($post['note']) ?  $post['note'] : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('note'); ?></div>
                                    </div>
                                </div>
                               
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('accounting/expenditure'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        
                        <?php if(isset($edit)){ ?>
                        <div class="tab-pane fade in active" id="tab_edit_expenditure">
                            <div class="x_content"> 
                               <?php echo form_open(site_url('accounting/expenditure/edit/'.$expenditure->id), array('name' => 'edit', 'id' => 'edit', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                                             
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="expenditure_head_id"><?php echo $this->lang->line('expenditure_head'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="expenditure_head_id"  id="expenditure_head_id" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <?php foreach($expenditure_heads as $obj ){ ?>
                                            <option value="<?php echo $obj->id; ?>" <?php if($expenditure->expenditure_head_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->title; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('expenditure_head_id'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="expenditure_via"><?php echo $this->lang->line('expenditure'); ?> <?php echo $this->lang->line('method'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="expenditure_via"  id="expenditure_via" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <?php $payments = get_payment_methods(); ?>
                                            <?php foreach($payments as $key=>$value ){ ?>
                                            <option value="<?php echo $key; ?>" <?php if($expenditure->expenditure_via == $key){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('expenditure_via'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount"><?php echo $this->lang->line('amount'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="amount"  id="amount" value="<?php echo isset($expenditure->amount) ?  $expenditure->amount : $post['amount']; ?>" placeholder="<?php echo $this->lang->line('amount'); ?>" required="required" type="number">
                                        <div class="help-block"><?php echo form_error('amount'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date"><?php echo $this->lang->line('date'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="date"  id="edit_date" value="<?php echo isset($expenditure->date) ?  date('d-m-Y', strtotime($expenditure->date)) : $post['date']; ?>" placeholder="<?php echo $this->lang->line('date'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('date'); ?></div>
                                    </div>
                                </div>
                             
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"><?php echo $this->lang->line('note'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="note"  id="note" placeholder="<?php echo $this->lang->line('note'); ?>"><?php echo isset($expenditure->note) ?  $expenditure->note : $post['note']; ?></textarea>
                                        <div class="help-block"><?php echo form_error('note'); ?></div>
                                    </div>
                                </div>
                                                             
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" value="<?php echo isset($expenditure) ? $expenditure->id : $id; ?>" name="id" />
                                        <a  href="<?php echo site_url('accounting/expenditure'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  
                        <?php } ?>
                        
                        <?php if(isset($detail)){ ?>
                        <div class="tab-pane fade in active" id="tab_view_expenditure">
                            <div class="x_content"> 
                               <?php echo form_open(site_url(), array('name' => 'detail', 'id' => 'detail', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                                             
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('academic_year'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $expenditure->session_year; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('expenditure_head'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $expenditure->head; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('expenditure'); ?> <?php echo $this->lang->line('method'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $this->lang->line($expenditure->expenditure_via); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('amount'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $expenditure->amount; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('date'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo date('M j, Y', strtotime($expenditure->date)); ?>
                                    </div>
                                </div>
                         
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('note'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $expenditure->note; ?>
                                    </div>
                                </div>  
                                 <?php if($expenditure->expenditure_type != 'salary'){ ?>
                                    <?php if(has_permission(EDIT, 'accounting', 'expenditure')){ ?>
                                       <div class="ln_solid"></div>
                                       <div class="form-group">
                                           <div class="col-md-6 col-md-offset-3">
                                               <a  href="<?php echo site_url('accounting/expenditure/edit/'.$expenditure->id); ?>" class="btn btn-primary"><?php echo $this->lang->line('update'); ?></a>
                                           </div>
                                       </div>
                                   <?php } ?>
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
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
 <script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
 <script type="text/javascript">
     
  $('#add_date').datepicker();
  $('#edit_date').datepicker();
  
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
