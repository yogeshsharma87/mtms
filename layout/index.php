<!DOCTYPE html>
<html>
<head>
	<title>Mtms</title>
<link rel="stylesheet" type="text/css" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/vendor/twbs/bootstrap/dist/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="/css/custom.css">
<script type="text/javascript" src="/vendor/components/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
<div style="padding: 20px;">
<?php $this->getNav();?>
	<table class='table border1 table-hover table-striped' width="100%">
		<thead>
			<tr class="info"> 
				<th colspan="7" class="text-center">
					<h3>Scheduled Inspections </h3>
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
			</tr>
		</thead>
		<tbody>
<?php 
$id = Mtms_Model_SessionManager::getInstance()->user['id'];
$inspections = Mtms_Model_Inspection::getInstance()->getAllByPilotId($id,true);
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
				</tr>
				<?php
			}
		}
	
?>
		</tbody>
	</table>
</div>
</body>
</html>
