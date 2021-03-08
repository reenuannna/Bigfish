 <?php include('header.php');?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">New Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?php echo base_url('index.php/AdCtr/insertProduct');?>" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" name="txt_name" id="exampleInputEmail1" placeholder="Enter the Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Type</label>
                    <select name="txt_type" class="form-control">
                    	<option selected="selected" disabled="disabled">--Select type--</option>
                    	<?php foreach ($data as  $value) {
                    	?>
                    	<option><?php echo $value->name;?></option>
                    <?php  }?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="inputqnty">Quantity</label>
                    <input type="number" class="form-control" name="txt_qnty" id="txt_qnty" value="0">
                  </div>
                  <div class="form-group">
                    <label for="inputPrice">Price</label>
                    <input type="text" class="form-control" name="txt_price" id="txt_price" placeholder="Enter the Price">
                  </div>
                  <div class="form-group">
                    <label for="inputImage">Image</label>
                    <input type="file" class="form-control" name="txt_img" id="txt_img">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
     
    </section>
    <!-- /.content -->
  </div>
    <!-- /.content -->
              <?php include('footer.php');?>