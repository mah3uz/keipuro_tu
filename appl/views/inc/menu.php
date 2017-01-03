    <div class="col-sm-2 sidenav">
      <div class="well">
	<ul class="right_menu">
		<li> <button type="button" onclick="toggleFullScreen()" class="btn btn-success menubtn">Full Screen</button></li>
		<!--<li>  <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success menubtn">Table Of Content</button></li>-->

		<li>   <button type="button" onclick="window.location.href='<?php echo base_url('home/word_lists'); ?>'" class="btn btn-success menubtn">Table Of Content</button></li>

		<li>   <button type="button" onclick="window.location.href='<?php echo base_url('home/add_new_text'); ?>'" class="btn btn-success menubtn">New</button></li>
		<li>  <button type="button" class="btn btn-success menubtn">Email</button></li>
		<li>  <button type="button" class="btn btn-success menubtn">table Calculation</button></li>
		<li>  <button type="button" onclick="window.location.href='<?php echo base_url('user/logout'); ?>'" class="btn btn-success menubtn">Logout</button></li>
	</ul> 
      </div>
    </div>