<?php include('userheader.php');?>
	<!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1 style="color:black;">Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html" style="color:black;">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html" style="color:black;">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
     <?php if ($this->session->userdata('id')=="") {
                       ?>
                      <center> <h2>You Should <a href="<?php echo base_url('index.php/UserCtr/login');?>">Login</a></h2></center>
                       <?php
                   }
                   else
                    {
                        ?>
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                   <form method="post">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <?php foreach ($cartrst as $key => $value) {
                             ?>
                        <tbody>
                            
                            <tr>
                                <td><input type="checkbox" name="ckbox[]" id="ckbox" checked="checked"></td>
                                    <div class="media">
                                        <td>
                                            <input type="hidden" name="c_id" id="c_id" value="<?php echo $value->c_id;?>">
                                        <div class="d-flex">
                                            <img src="<?php echo base_url('upload/'.$value->image);?>" alt="" width='100'>
                                        </div>
                                    </td>
                                        <td>
                                        <div class="media-body">
                                            <p><?php echo $value->name;?></p>
                                            <input type="hidden" name="pid" id="pid" value="<?php echo $value->pr_id;?>">
                                        </div></td>
                                    </div>
                                
                                <td>
                                    <h5><?php echo $value->pr_price;?></h5>
                                    <input type="hidden" name="price" id="price" value="<?php echo $value->pr_price;?>">
                                </td>
                                <td>
                                    <div class="product_count">
                                    <input type="number" name="qty" id="qty" min=".5" value="<?php echo $value->qunty;?>" step=".1" max="<?php echo $value->kg;?>"title="Quantity:"class="sst">
                                      
                                    </div>
                                      </td>
                       
                                <td>
                                    <div class="product_count">
                                    <!-- <h5 id="tot"><?php echo $value->total;?></h5> -->
                                     <input type="text" name="tot" id="tot" value="<?php echo $value->total;?>">
                                 </div>
                                </td>
                            </tr>
                           
                        </tbody>
                        <?php
                    }?>
                    </table>
                    <a href="<?php echo base_url('index.php/UserCtr/order');?>" class="btn btn-primary btn-lg btn-block">Proceed to Buy</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
                }?>
                             <script type="text/javascript">
                                     $(document).ready(function(){
    $(".sst").on('change',function() {
    // Get the row containing the input
    var row = $(this).closest('tr');
    // var p = $('#price').val();
    var pid = row.find("#pid").val();    
    var qty = row.find(this).val();
  
    var price = row.find('#price').val();
    var cid = row.find('#c_id').val();
     
    var total =  qty*price;
    
    row.find('#tot').val(total);
    // location.reload(true);
    // //  $("#tot_amount").val(total);
            $.ajax({
                  type: 'post',
                    url: "<?php echo base_url('index.php/UserCtr/update');?>",
                  
                    data: {
                        pid: pid,
                        qty: qty,
                        total:total,
                        c_id:cid
                    },
                 
                    success: function(result) {
                        // alert(result);
                        
                    }
                });

    });

    
});  
                                    </script>
                              
    <!--================End Cart Area =================-->

    <!-- start footer Area -->
  <?php include('footer.php');?>