<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin| Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<div class="login_form_inner">
            <h3>Log in to enter</h3>
            <form class="row login_form" action="<?php echo base_url('index.php/AdCtr/adminlogin');?>" method="post" id="loginForm" novalidate="novalidate">
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="name" name="username" placeholder="Username">
              </div>
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="name" name="pass" placeholder="Password">
              </div>
              
              <div class="col-md-12 form-group">
                <button type="submit" value="submit" class="btn btn-primary">Log In</button>
                <a href="#">Forgot Password?</a>
              </div>
            </form>
          </div>
</div>
</body>
</html>