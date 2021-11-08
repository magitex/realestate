<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Add Category</h3>
            </div>
            <?php echo form_open('Category/addCategory'); ?>
              <div class="box-body">
                <?php $msg = $this->session->flashdata('message'); if(! empty($msg)): ?>
                <div class="alert alert-dismissible alert-success">
                  <?php echo $msg; ?>
                </div>
                <?php endif; ?>
                <div class="form-group">
                  <label for="user_name">Category Name</label>
                  <?php echo form_input(['name' => 'name', 'class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter Category Name']); ?>
                  <?php echo form_error('name', '<div class="text-danger">', '</div>'); ?>

                  </div>
                </div>
                				 
              
              </div>
              <div class="box-footer">

                <?php echo form_submit('', 'Add Category', ['class' => 'btn btn-primary' ]); ?>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </section>
