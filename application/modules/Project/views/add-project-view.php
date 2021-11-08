<link href="../assets/plugins/fSelect.css" rel="stylesheet">

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Add My Project</h3>
            </div>
            <?php echo form_open_multipart('project/addMyProject'); ?>
              <div class="box-body">
                <?php $msg = $this->session->flashdata('message'); if(! empty($msg)): ?>
                <div class="alert alert-dismissible alert-success">
                  <?php echo $msg; ?>
                </div>
                <?php endif; ?>
                <div class="form-group">
                  <label for="todo_name">Project Name</label>
                  <?php echo form_input(['name' => 'title', 'class' => 'form-control', 'id' => 'title', 'placeholder' => 'Give your  name']); ?>
                  <?php echo form_error('title', '<div class="text-danger">', '</div>'); ?>

                  </div>
				  <div class="box-body">
                <div class="form-group">
                  <label for="user_password">Project Category</label>
				
                <select class="test" name="category[]" multiple="multiple" data-validation="required" data-validation-error-msg="">
       
    
								<?php
								 
        foreach ($get_all_projectCategory as $row) {
		?>
		
		 <option value="<?php echo $row['id']?>"><?php echo stripslashes($row['name'])?></option>
		 <?php
		 
		
       
		}
								?>
								</select>
                  <?php //echo form_error('category', '<div class="text-danger">', '</div>'); ?>
                </div>
              </div>
			  <div class="box-body">
                <div class="form-group">
                  <label for="user_password">Assign to</label>
				
                <select class="form-control" name="assign_to" >
       <option value="">Select a vendor</option>
    
								<?php
								 
        foreach ($get_all_user as $row) {
		?>
		
		 <option value="<?php echo $row['user_id']?>"><?php echo stripslashes($row['user_name'])?></option>
		 <?php
		 
		
       
		}
								?>
								</select>
                  <?php //echo form_error('assign_to', '<div class="text-danger">', '</div>'); ?>
                </div>
              </div>
			  <div class="form-group">
                  <label for="todo_name">Project Cost</label>
                  <?php echo form_input(['name' => 'totalcost', 'class' => 'form-control', 'id' => 'totalcost', 'placeholder' => 'Give your  cost']); ?>
                                   <?php //echo form_error('totalcost', '<div class="text-danger">', '</div>'); ?>


                  </div>
				  <div class="form-group">
                  <label for="todo_name">Project Start Date</label>
                 <input type="date" name="start_date" />
                                                    <?php //echo form_error('start_date', '<div class="text-danger">', '</div>'); ?>


                  </div>
				  <div class="form-group">
                  <label for="todo_name">Total Project Houre</label>
                 <input type="number" name="totalhour" />
                            <?php //echo form_error('totalhous', '<div class="text-danger">', '</div>'); ?>


                  </div>
				  <div class="form-group">
                  <label for="todo_name">Project Document</label>
                 <input type="file" name="document" />
                 

                  </div>
				   <div class="form-group">
                  <label for="todo_name">Project Image</label>
                 <input type="file" name="image" />
                 

                  </div>
				    <div class="form-group">
                  <label for="todo_name">Status</label>
                 <select class="form-control" name="status" >
				 <option value="Active" selected="selected">Active</option>
				 <option value="Pending" >Pending</option>
				  <option value="Completed" >Completed</option>
				 </select>
                 

                  </div>
                </div>
       <div class="box-body">
                <div class="form-group">
                  <label for="todo_comment">Description</label>
                  <?php echo form_textarea(['name' => 'description', 'class' => 'form-control', 'id' => 'description', 'placeholder' => 'description', 'rows' => '4']); ?>
                </div>
              </div>
                </div>

              
              </div>
              <div class="box-footer">

                <?php echo form_submit('', 'Create My Project', ['class' => 'btn btn-primary' ]); ?>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </section>
<script src="http://localhost/etmsci/assets/bower_components/jquery-1.11.0.min"></script>
	<script src="../assets/plugins/fSelect.js"></script>

<script>
 var jq = $.noConflict();
    jq(document).ready(function () {
	 window.fs_test = jq('.test').fSelect();
            
        });
      
</script>