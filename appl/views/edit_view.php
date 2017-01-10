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
  
  <script type="text/javascript" src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
  
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.bootstrap-growl.min.js'); ?>"></script>
  
</head>



<body onLoad="notification()">



  
<div class="container-fluid text-center">    
  <div class="row content">
    
	
    <?php include ('inc/leftnav.php'); ?>
	

    <div class="col-sm-8 text-left well center-cont"> 
     <!--  <p>Welcome <?php echo $username; ?> & ID: <?php echo $id_user; ?></p> -->


	
	
	
<?php foreach ($words as $word){ ?>	

	
	
	
		<form method="post" name="word-form" id="word-form">
		 
			<textarea class="ckeditor" name="word" id="word"><?php echo $word->text; ?></textarea>
			<input type="hidden" name="id_word" value="<?php echo $word->id_word;?>">
			
			<input type="submit" name="savedraft" id="savedraft" onclick="saveWord();return false;" value="Save Now" class="button hidden"/>

		</form>  

<?php } ?>		




<script>setInterval(function () {document.getElementById("savedraft").click();}, 1000);</script>
		

<script>
function saveWord() 
{
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    jQuery.ajax({
        type: 'POST',
        url: '<?php echo base_url('home/update_word/'); ?><?php echo $word->id_word; ?>',
        data: $("#word-form").serialize()
     });  
     return false; 

 }

</script>	


	
    </div>
	

	

	
<?php include ('inc/menu.php'); ?>
	

<script type="text/javascript">

    function notification(){
        $.bootstrapGrowl("You don't need to save. text will auto save.",{
            type: 'info',
            delay: 3000,
        });
    };

</script>
	
	
  </div>
</div>


  <!-- Modal -->
  <?php include ('inc/list.php'); ?>




<script src="<?php echo base_url('assets/js/main_js.js'); ?>"></script>
</body>
</html>