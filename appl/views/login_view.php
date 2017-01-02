<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel="stylesheet" href="<?php echo base_url('assets/user/css/style.css'); ?>">

  
</head>

<body>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Log in</a></li>
        <li class="tab"><a href="#login">Sign Up</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Log in</h1>
          
          <form action="<?php echo base_url('user/userauthorication'); ?>" method="post">
          


			  <div class="field-wrap">
				<label>
				  Phone<span class="req">*</span>
				</label>
				<input type="text" name="phone" value="01922715500" required autocomplete="off"/>
			  </div>
			  
			  <div class="field-wrap">
				<label>
				 Password<span class="req">*</span>
				</label>
				<input type="password" value="123456" name="password" required autocomplete="off"/>
			  </div>
			  
			  <button type="submit" class="button button-block"/>Log in</button>
          
          </form>

        </div>
        
		
		
        <div id="login">   
          <h1>Sign Up</h1>
          
          <form action="loggedin.html" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block"/>Sign Up</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="<?php echo base_url('assets/user/js/index.js'); ?>"></script>

</body>
</html>
