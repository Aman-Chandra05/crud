<div class="container">
	<h1>User Information</h1>
	<form action="<?= base_url('User/insertuser')?>" method="post">
	  <div class="form-group">
	    <label for="name">Name:</label>
	    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?= set_value('name');?>">
		<?php echo form_error('name');?>
	  </div>
	  <div class="form-group">
	    <label for="email">Email: </label>
	    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?= set_value('email');?>">
		<?php echo form_error('email');?>
	  </div>
	  <div class="form-group">
	    <label for="phone">Phone: </label>
	    <input type="number" class="form-control" id="phone" placeholder="Enter Phone" name="phone" value="<?= set_value('phone');?>">
		<?php echo form_error('phone');?>
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	  <a href="<?= base_url('User/index')?>" class="btn btn-secondary">Cancel</a>
	</form>
</div>