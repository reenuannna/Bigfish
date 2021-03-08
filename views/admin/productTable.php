 <?php include('header.php');?>
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
                      <th>Type</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Image</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data as  $value) {
                      ?>
                    <tr>
                      <td><?php echo $value->pr_id;?></td>
                      <td><?php echo $value->name;?></td>
                      <td><?php echo $value->type;?></td>
                      <td><?php echo $value->kg;?></td>
                      <td><?php echo $value->pr_price;?></td>
                      <td><img src="<?php echo base_url('upload/'.$value->image);?>" height="100"></td>
                    </tr>
                    <?php
                  }?>
                  </tbody>
                </table>
                <?php echo $links;?>
              </div>
        </div>
        <a href="<?php echo base_url('index.php/AdCtr/productForm');?>">Add New Product</a>
      </div><!-- /.container-fluid -->
    </section>
</div>
    <!-- /.content -->
              <?php include('footer.php');?>