<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>dashboard</title>
	<meta name="brice muco" content="BriceMuco" />
	<!-- Date: 2016-02-29 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar ">
	  
	</nav>
	<!---add new person--->
	<div class="panel panel-primary">
      <div class="panel-heading">DashBoard</div>
      <div class="panel-body">
	      	<div class="container">
			  <h3>People</h3>
			  <ul class="list-group">
			  	<?php foreach ($persons as $row):?> 
			  		<li class="list-group-item"><?php echo $row->email; ?></li>
			  	<?php endforeach; ?>
			  </ul>
			  <!-- Trigger the modal add new person -->
			  <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#NewPersonModal">Add person</button>
			  <!-- Add new person Modal -->
			  <div class="modal fade" id="NewPersonModal" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header" style="background-color: #337AB7!important;">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title" style="color:white;">Add new person</h4>
			        </div>
			        <div class="modal-body">
			          	<?php echo form_open('pages/addperson');?>
					    <div class="form-group">
					      <label for="email">Email:</label>
					      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
					    </div>
					    <button type="submit" class="btn btn-default btn-block btn-success">Add person</button>
					  	<?php echo form_close();?>
					
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default btn-block btn-danger" data-dismiss="modal">Cancel</button>
			        </div>
			      </div>
			      
			    </div>
			  </div>
  
			
			
			</div>
			<!---end of add new person--->
			
			<!---add new task--->
			<div class="container">
			  <h3>Tasks</h3>
			  <ul class="list-group">
			  	<?php foreach ($tasks as $row):?>
			  		<li class="list-group-item">Task <?php echo $row->id; ?></li>
			  	<?php endforeach; ?>
			  </ul>
			  <!-- Trigger the modal add new person -->
			  <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#NewTaskModal">Add new Task</button>
			  <!-- Add new person Modal -->
			  <div class="modal fade" id="NewTaskModal" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header" style="background-color: #337AB7!important;">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title" style="color:white;">Add New Task</h4>
			        </div>
			        <div class="modal-body">
			          <?php echo form_open('pages/addTask');?>
			          	<div class="form-group">
						    <label for="email">Description :</label>
						    <textarea class="form-control" id = "description" name="description"></textarea>
						</div>
						<div class="form-group">
						    <label for="date">Due Date :</label>
						    <input type="date" id="date" name="date" class="form-control" ></>
						</div>
					    <div class="form-group">
						  <label for="assignto">Assign to:</label>
						  <select class="form-control" name="assignto" id="assignto">
						  	<?php foreach ($persons as $row):?> 
						  		<option value="<?php echo $row->email; ?>"><?php echo $row->email; ?></option>
						  	<?php endforeach; ?>
						  </select>
						</div>
					    <button type="submit" class="btn btn-default btn-block btn-success">Add Task</button>
					  </form>
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default btn-block btn-danger" data-dismiss="modal">Cancel</button>
			        </div>
			      </div>
			      
			    </div>
			  </div>
  			 <!---end of modal--->
  			 
			</div>
			<!---end of add new task--->
      </div>
      <div>
      	<p><?php  ?></p>
      </div>
    </div>
    
    
	
</body>
</html>