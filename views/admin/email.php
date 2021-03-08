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
             <form method="post" action="<?php echo base_url('index.php/AdCtr/sendemail');?>">
               <table cellpadding="10">
                 <tr>
                   <td>Email ID</td>
                   <td><input type="text" name="email" class="form-control"></td>
                 </tr>
                 <tr>
                   <td>Subject</td>
                   <td><input type="text" name="sub" class="form-control"></td>
                 </tr>
                 <tr>
                   <td>Message</td>
                   <td><textarea name="msg" class="form-control"></textarea></td>
                 </tr>
                 <tr>
                   <td></td>
                   <td><input type="submit" name="send" class="btn btn-primary" value="Send Email"></td>
                 </tr>
               </table>
             </form>
                <!-- <?php echo $links;?> -->
              </div>
        </div>
        <!-- <a href="<?php echo base_url('index.php/AdCtr/productForm');?>">Add New Product</a> -->
      </div><!-- /.container-fluid -->
    </section>
</div>
<?php include('footer.php');?>