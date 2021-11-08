<section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

            <?php $msg = $this->session->flashdata('message'); if(! empty($msg)): ?>
                <div class="alert alert-dismissible alert-success">
                  <?php echo $msg; ?>
                </div>
                <?php endif; ?>

              <table class="table table-hover">
                <tbody><tr>
                  <th>#</th>
                  <th>Category Name</th>
                
                <!--  <th>Employee's Seniors</th>-->
                  <th>Action</th>
                </tr>
                <?php $n = 1; foreach ($get_all_Category as $value): ?>

                <tr>
                  <td><?php echo $n++; ?></td>
                  <td><?php echo $value['name']; ?></td>
             
                  
                  
                  <?php echo "<td><a href='deleteCategoryRec?id=".$value['id']."'><button class='btn btn-danger'>Delete</button></a></td>";?>
                 
                </tr>
              <?php endforeach; ?>

              </tbody></table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</section>
