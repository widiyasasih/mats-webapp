<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register Mats</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/ico" href="<?php echo base_url('assets/login/')?>images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/')?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/')?>fonts/font-awesome-4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/')?>vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/')?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/')?>vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/')?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/')?>css/main.css">
<!--===============================================================================================-->
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100" >
                <div class="login100-pic js-tilt" data-tilt style="margin-top:-90px"><br><br><br>
					<img src="<?php echo base_url('assets/login/')?>images/img-02.png" alt="IMG">
				</div>
                <?php $attributes = array('class' => 'login100-form validate-form',
                                          'style' => 'margin-top:-90px');
                echo form_open('register', $attributes);?>
					<span class="login100-form-title" style="text-transform: uppercase; ">
						<?= $title;?>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid fullname is required">
						<input class="input100" type="hidden" value="1" name="online_status">
						<input class="input100" type="hidden" value="2" name="level_id">
						<input class="input100" type="text" name="fullname" placeholder="Fullname" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <font color="red"><i><?php echo form_error('fullname', '<div class="error">', '</div>'); ?></i></font>
                    
					<div class="wrap-input100 validate-input" data-validate = "Valid username is required">
						<input class="input100" type="text" name="username" placeholder="Username" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <font color="red"><i><?php echo form_error('username', '<div class="error">', '</div>'); ?></i></font>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required">
						<input class="input100" type="text" name="email" placeholder="Email" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
					</div>
                    <font color="red"><i><?php echo form_error('email', '<div class="error">', '</div>'); ?></i></font>

                    <div class="wrap-input100 validate-input" data-validate = "Valid phone number is required">
						<input class="input100" type="text" name="telp_primary" placeholder="Phone" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
					</div>
                    <font color="red"><i><?php echo form_error('telp_primary', '<div class="error">', '</div>'); ?></i></font>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <font color="red"><i><?php echo form_error('password', '<div class="error">', '</div>'); ?></i></font>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="confirm_password" placeholder="Confirm Password" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
					</div>
                    <font color="red"><i><?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?></i></font>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" style="text-transform: uppercase; ">
							Register
						</button>
					</div>

					<div class="text-center p-t-70">
						<a class="txt2" href="<?php echo base_url('login')?>">
                        <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
							Back to Login
						</a>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?php echo base_url('assets/login/')?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/')?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url('assets/login/')?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/')?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/')?>vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/')?>js/main.js"></script>

</body>
</html>