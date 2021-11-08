<link href="../assets/plugins/fSelect.css" rel="stylesheet">
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Add Vendor</h3>
            </div>
            <?php echo form_open('User/adduser'); ?>
              <div class="box-body">
                <?php $msg = $this->session->flashdata('message'); if(! empty($msg)): ?>
                <div class="alert alert-dismissible alert-success">
                  <?php echo $msg; ?>
                </div>
                <?php endif; ?>
                <div class="form-group">
                  <label for="user_name">Vendor Name</label>
                  <?php echo form_input(['name' => 'user_name', 'class' => 'form-control', 'id' => 'user_name', 'placeholder' => 'Enter Employee Name']); ?>
                  <?php echo form_error('user_name', '<div class="text-danger">', '</div>'); ?>

                  </div>
                </div>
                				     <?php echo form_hidden('user_role', 'Employee'); ?>

                <div class="box-body">
                <div class="form-group">
                  <label for="user_email">Email address</label>
                  <?php echo form_input(['type' => 'email', 'name' => 'user_email', 'class' => 'form-control', 'id' => 'user_email', 'placeholder' => 'Enter Employee Email']); ?>
                  <?php echo form_error('user_email', '<div class="text-danger">', '</div>'); ?>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="user_password">Password</label>
                  <?php echo form_password(['name' => 'user_password', 'class' => 'form-control', 'id' => 'user_password', 'placeholder' => 'Enter Employee Password']); ?>
                  <?php echo form_error('user_password', '<div class="text-danger">', '</div>'); ?>
                </div>
              </div>
			  <div class="box-body">
                <div class="form-group">
                  <label for="user_password">Contact Number</label>
                  <?php echo form_password(['name' => 'phone', 'class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Enter Employee Contact']); ?>
                  <?php echo form_error('phone', '<div class="text-danger">', '</div>'); ?>
                </div>
              </div>
			    <div class="box-body">
                <div class="form-group">
                  <label for="user_password">Address</label>
                  <?php echo form_password(['name' => 'address', 'class' => 'form-control', 'id' => 'address', 'placeholder' => 'Enter Employee address']); ?>
                  <?php echo form_error('address', '<div class="text-danger">', '</div>'); ?>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="user_password">Category</label>
				
                <select class="test" name="category[]" multiple="multiple" data-validation="required" data-validation-error-msg="">
       
    
								<?php
								 
        foreach ($get_all_Category as $row) {
		?>
		
		 <option value="<?php echo $row['id']?>"><?php echo stripslashes($row['name'])?></option>
		 <?php
		 
		
       
		}
								?>
								</select>
                  <?php echo form_error('user_password', '<div class="text-danger">', '</div>'); ?>
                </div>
              </div>
              </div>
              <div class="box-footer">

                <?php echo form_submit('', 'Add Vendor', ['class' => 'btn btn-primary' ]); ?>
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