  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <!--<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>-->
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  <table class="table">
    <thead>
      <tr>
        <th>Word</th>
		<th>View</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
		  
		  <?php
			foreach($word_lists as $word_list){ 
			?>
			
			
	  <tr>
        <td><?php echo $word_list->name_word; ?></td>
        <td><button type="button" class="btn btn-primary btn-xs">View</button></td>
        <td><button type="button" class="btn btn-info btn-xs">Edit</button></td>
		<td><button type="button" class="btn btn-danger btn-xs">Delete</button></td>
      </tr>
			

			
			<?php } ?>
			
</tbody>
  </table>		
			
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
