<!DOCTYPE html>
<html>
<head>
<?php require_once 'head.php';?>
</head>
<body>
<div style="padding: 20px;">
<?php $this->getNav();?>
	<table class='table table-hover table-striped border1' width="100%">
		<thead>
			<tr class="info"> 
				<th colspan="7" class="text-center">
					<h3>All Inspections </h3>					
				</th>
				<th class="text-center">
					<button class="btn btn-primary btn-block add-inspection" type="submit" data-target="#myModal" data-toggle="modal">Add New</button>
				</th>

			</tr>
			<tr class="info">
			<th class="text-center">ID</th>
			<th class="text-center">Region</th>
			<th class="text-center">Tower-ID</th>
			<th class="text-center">Supervisor Assigned</th>
			<th class="text-center">Local Technician Assigned</th>
			<th class="text-center">Reported on</th>
			<th class="text-center">Current Status</th>
			<th class="text-center action">Action</th>
			</tr>
		</thead>
		<tbody>
<?php 
$id = Mtms_Model_SessionManager::getInstance()->user['id'];
$inspections = Mtms_Model_Inspection::getInstance()->getAllByPilotId($id);
		foreach($inspections as $data) {
	    	if(!empty($data)) {
				/*if ($data['http_code']==200) {
					$paint = '';
				} else {
					$paint = 'danger';
				}*/
				?>
				<tr class="<?php // echo $paint?>">
				<?php 
					echo '<td class="text-center">'.$data['id'].'</td>';
					echo '<td class="text-center">'.$data['fk_region_id'].'</td>';
					echo '<td class="text-center">'.$data['fk_tower_id'].'</td>';
					echo '<td class="text-center">'.$data['fk_supervisor'].'</td>';
					echo '<td class="text-center">'.$data['fk_technician'].'</td>';
					echo '<td class="text-center">'.$data['reported_on'].'</td>';
					echo '<td class="text-center">'.$data['status'].'</td>';
				?>
				<td class="action text-center">
					<a class="glyphicon glyphicon-pencil btn btn-success btn-xs edit-inspection" href="#"  data-toggle="modal" data-id="<?php echo $data['id']?>" data-target="#myModal"></a>
					<a class="glyphicon glyphicon-remove btn btn-danger btn-xs delete-inspection" data-id="<?php echo $data['id']?>" onclick="if (confirm('you really want to delete this !') == true) { deleteInspection(this); return true; } else { return false }"></a>
				</td>
				</tr>
				<?php
			}
		}
	
?>
		</tbody>
	</table>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">edit inspection</h4>
      </div>
      <div class="modal-body">
		<form id="edit-form">
		<input type="hidden" name="inspection-id" id="inspection-id">
			<div class="form-group">
		        <label for="exampleInputEmail1">
		            Region
		        </label>
		        <select class="form-control" id="fk_region" name="fk_region">
		        <?php $regions = Mtms_Model_Region::getInstance()->getAllRegions();
		        foreach ($regions as $region) {
		        	?><option value="<?php echo $region['id']?>"><?php echo $region['name']?></option><?php
		        }
		        ?>
		        </select>
		    </div>
		    <div class="form-group">
		        <label for="exampleInputEmail1">
		            Tower
		        </label>
		        <select class="form-control" id="fk_tower" name="fk_tower">
		        <?php $towers = Mtms_Model_Tower::getInstance()->getAllTowers();
		        foreach ($towers as $tower) {
		        	?><option value="<?php echo $tower['id']?>"><?php echo $tower['name']?></option><?php
		        }
		        ?>
		        </select>
		    </div>
		    <div class="form-group">
		        <label for="exampleInputEmail1">
		            Supervisor
		        </label>
		        <select class="form-control" id="fk_supervisor" name="fk_supervisor">
		        <?php $supervisors = Mtms_Model_User::getInstance()->getAllSupervisor();
		        foreach ($supervisors as $user) {
		        	?><option value="<?php echo $user['id']?>"><?php echo $user['name']?></option><?php
		        }
		        ?>
		        </select>
		    </div>
		    <div class="form-group">
		        <label for="exampleInputEmail1">
		            Local Technician
		        </label>
		        <select class="form-control" id="fk_technician" name="fk_technician">
		        <?php $pilots = Mtms_Model_User::getInstance()->getAllPilots();
		        foreach ($pilots as $user) {
		        	?><option value="<?php echo $user['id']?>"><?php echo $user['name']?></option><?php
		        }
		        ?>
		        </select>
		    </div>
		    <div class="form-group">
		        <label for="exampleInputEmail1">
		            Status
		        </label>
		        <select  class="form-control" id="status" name="status">
		        	<option value=0>pending</option>
		        	<option value=1>resolved</option>
		        </select>
		        </input>
		    </div>
		    
		    <div class="form-group text-center">
			    <a class="btn btn-primary form-submit" href="#">
			        Save changes
			    </a>
		    </div>
		</form>

      </div>      
    </div>
  </div>
</div>

<div class="modal fade success-box" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Success</h4>
      </div>
      <div class="modal-body">
        Successfully saved !
      </div>
    </div>
  </div>
</div>

<div class="modal fade error-box" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">error</h4>
      </div>
      <div class="modal-body">
      	unexpected error !!
      </div>
    </div>
  </div>
</div>


</div>
</body>
</html>
