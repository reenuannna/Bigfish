<?php include('header.php');  ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tables</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        
        <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Sl.No</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data as  $value) {
                      ?>
                    <tr>
                      <td><?php echo $value->reg_id;?></td>
                      <td><?php echo $value->ur_name;?></td>
                      <td><?php echo $value->address;?></td>
                      <td><?php echo $value->mobile;?></td>
                      <td><?php echo $value->email;?></td>
                     <td><a href="<?php echo base_url('index.php/AdCtr/email');?>"> Send Email</a></td>
                    </tr>
                    <?php
                  }?>
                  </tbody>
                </table>
                <!-- <?php echo $links;?> -->
              </div>
        </div>
        <!-- <a href="<?php echo base_url('index.php/AdCtr/productForm');?>">Add New Product</a> -->
      </div><!-- /.container-fluid -->
    </section>
</div>
<?php include('footer.php');?>