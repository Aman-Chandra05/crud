
	<div id="main" class="container">
		<h1>Registered User</h1>
		<div >
			<?php 
			$success=$this->session->userdata('success');
			if($success!=''){
			?>
			<div class="alert alert-success"><?= $success;?></div>
			<?php
			}
			?>
			<?php 
			$failure=$this->session->userdata('failure');
			if($failure!=''){
			?>
			<div class="alert alert-danger"><?= $failure;?></div>
			<?php
			}
			?>
		</div>
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
			  <th scope="col">Phone</th>
			  <th scope="col">Change</th>
			  <th scope="col">Remove</th>
		    </tr>
		  </thead>
		  <tbody>
			<?php
			if(!empty($users)){
				foreach ($users as $user) {
					echo "<tr><td>".$user['id']."</td><td>".$user['name']."</td><td>".$user['email']."</td><td>".$user['phone']."</td>";?>
					<td><a href="<?= base_url('User/edit/'.$user['id']) ?>" class="btn btn-primary">Edit</a></td>
					<td><a href="<?= base_url('User/delete/'.$user['id']) ?>" class="btn btn-danger">Delete</a></td>
				<?php
				}
			}
			?>
		  </tbody>
		</table>
		
	</div>
