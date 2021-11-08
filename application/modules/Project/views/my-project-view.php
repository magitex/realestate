<section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">My Project List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

              <table class="table table-hover">
                <tbody><tr>
                  <th>#</th>
                  <th>Project Name</th>
                  <th>Assigned To</th>
				  <th>Project Cost</th>
                  <th>Total Project Houre</th>
                  <th>Start Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <?php $n = 1; foreach ($get_my_todo_data as $value): ?>
                  <?php $todId = $value['assign_to']; ?>
                  <?php echo form_open("ToDo/updateMyToDo/{$todId}"); ?>
                <tr>

                  <td><?php echo $n++; ?></td>
                  <td><?php echo $value['title']; ?></td>
                  <td><?php echo $value['user_name']; ?></td>
                  <td><?php echo $value['totalcost']; ?></td>
				  <td><?php echo $value['totalhour']; ?></td>
                  <td><?php echo $value['start_date']; ?></td>

                  <?php if ($value['status']=='Pending'){ ?>
                  <td><span class="label label-warning">Pending</span></td>
                  <?php } 
				  else if($value['status']=='Completed')
				  {
				   ?>
                    <td><span class="label label-success">Completed</span></td>
					 <?php
					  }
					  else if($value['status']=='Active'){
					   ?>
                    <td><span class="label label-success">Active</span></td>
                  <?php }?>
                                  <?php echo "<td><a href='deleteproject?id=".$value['id']."'><button class='btn btn-danger'>Delete</button></a></td>";?>

                </tr>
                <?php echo form_close(); ?>
              <?php endforeach; ?>

              </tbody></table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</section>
