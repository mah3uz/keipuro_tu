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
     
	         <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
		  
		  
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        
                        <th>Word</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        
						
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($word_lists as $list): $segment++;?>
                        <tr>
                            <th scope="row"><?php echo $segment; ?></th>
                            <td><a href="<?php echo base_url();?>home/word_view/<?php echo $list['id_word']; ?>"><?php echo $list['name_word']; ?></a></td>
                           

                            
                            <td><a  href="<?php echo site_url('admin/view') . '/' . $list['id_word']; ?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a></td>
							<td><a onclick="return confirm('Delete Resume?');" href="<?php echo base_url('home/delete_word') . '/' . $list['id_word']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <?php echo $this->pagination->create_links();?>
        </div>

	  
	  
    </div>
	
	
<script type="text/javascript">

    function notification(){
        $.bootstrapGrowl("List of words",{
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
