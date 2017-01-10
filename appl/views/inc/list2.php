
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
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
		  
		  
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Word</th>
                        <th>View</th>
                        <th>Delete</th>
                        
						
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($word_lists as $list): $segment++;?>
                        <tr>
                            <th scope="row"><?php echo $segment; ?></th>
                            <td><?php echo $list['name_word']; ?></td>

                            
                            <td><a  href="<?php echo site_url('admin/view') . '/' . $list['id_word']; ?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a></td>
							<td><a onclick="return confirm('Delete Resume?');" href="<?php echo site_url('admin/delete_list') . '/' . $list['id_word']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <?php echo $this->pagination->create_links();?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>