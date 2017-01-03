<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/main_style.css'); ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.bootstrap-growl.min.js'); ?>"></script>
  
<script src="<?php echo base_url('assets/js/main_js.js'); ?>"></script>
  
</head>
<body onLoad="notification()">



  
<div class="container-fluid text-center">    
  <div class="row content">
    
	
    <?php include ('inc/leftnav.php'); ?>
	
	
	
    <div class="col-sm-8 text-left well center-cont"> 
      <p>ようこそ <?php echo $username; ?> & ID: <?php echo $id_user; ?></p>
     
	 

	  
	  
    </div>
	
	
<script type="text/javascript">

    function notification(){
        $.bootstrapGrowl("Welcome to Keipuro Tu",{
            type: 'info',
            delay: 3000,
        });
    };

</script>
<?php include ('inc/menu.php'); ?>
	
	
	
  </div>
</div>


  <!-- Modal -->
  <?php include ('inc/list2.php'); ?>


</body>
</html>
