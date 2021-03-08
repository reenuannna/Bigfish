<?php include('userheader.php');?>
<!-- <section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1 style="color:black">Login/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html" style="color:black;">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html" style="color:black;">Login/Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section> -->
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-12">
					<div class="login_form_inner">
						<h3>register</h3>
						<form class="row login_form" action="<?php echo base_url('index.php/UserCtr/registerData');?>" method="post" id="regForm">
							<div class="col-md-12 form-group">
								<span id="name_error" style="color: red"></span>
								<input type="text" class="form-control" id="txt_name" name="txt_name" placeholder="Enter your Name" value="<?php echo set_value('txt_name');?>">
								<i style="color: red"><?php echo form_error("txt_name"); ?></i>
								
							</div>
							<div class="col-md-12 form-group">
								<span id="add_error" style="color: red"></span>
								<input type="text" class="form-control" id="txt_address" name="txt_address" placeholder="Enter your Address" value="<?php echo set_value('txt_address');?>">
								<i style="color: red"><?php echo form_error("txt_address"); ?></i>
							</div>
							<div class="col-md-12 form-group">
									<span id="mob_error" style="color: red"></span>
								<input type="text" class="form-control" id="txt_mob" name="txt_mob" placeholder="Enter your Mobile Number" value="<?php echo set_value('txt_mob');?>">
								<i style="color: red"><?php echo form_error("txt_mob"); ?></i>
							</div>
							<div class="col-md-12 form-group">
								<span id="email_error" style="color: red"></span>
								<input type="email" class="form-control" id="txt_email" name="txt_email" placeholder="Enter your email" value="<?php echo set_value('txt_email');?>" >
								<i style="color: red"><?php echo form_error("txt_email"); ?></i>
							</div>
							<div class="col-md-12 form-group">
								<span id="pass_error" style="color: red"></span>
								<input type="text" class="form-control" id="txt_pass" name="txt_pass" placeholder="Password" value="<?php echo set_value('txt_pass');?>">
								<i style="color: red"><?php echo form_error("txt_pass"); ?></i>
							</div>
							<div class="col-md-12 form-group">
								<span id="cpass_error" style="color: red"></span>
								<input type="text" class="form-control" id="txt_cpass" name="txt_cpass" placeholder=" Confirm Password"><br>
								<i style="color: red"><?php echo form_error("txt_cpass"); ?></i>
							</div>

								<div class="col-md-12 form-group">
								<input type="submit" class="primary-btn" id="reg_btn" name="reg_btn" value="Register">
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include('footer.php');?>