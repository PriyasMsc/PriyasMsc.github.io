<!DOCTYPE html>
<html>
<head>
<title>Simple Image Upload Using AngularJs</title>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="../js/main.js" ></script>
<link rel='shortcut icon' type='image/x-icon' href='../../img/p.png' />
<link rel="stylesheet" href="../../css/bootstrap.css" type="text/css">
</head> 
<body  ng-app="myApp"  ng-controller="UploadController">

<!-- Adding the ng-app declaration to initialize AngularJS -->
<div id="main" >
<div class = "row">
		<div class = "col-md-3"></div>
		<div class = "col-md-6">
			<h3 class = "text-primary">Simple Image Upload Using AngularJs</h3>
			<hr style = "boreder-top:1px dotted #000;"/>
			<a class = "btn btn-success" href =  "index.html"><span class = "glyphicon glyphicon-hand-right"></span> Back</a>
			<table class = "table table-hover">
				<thead>
					<tr>	
						<th>Name<th>
						<th>Image<th>
					</tr>
				</thead>
				<tbody>
					<?php
						$conn = new mysqli("localhost", "860030", "ramdeveloper", "860030") or die(mysqli_error($conn));
						$query = $conn->query("SELECT * FROM `member` where `flag`='2'") or die(mysqli_error($conn));
						while($fetch = $query->fetch_array()){
					?>
					<tr>
						<td><?php echo $fetch['image']?></td>
						<td colspan = "2"><center><?php echo '<img src = "images/'.$fetch['image'].'" width = "150px" height = "70px"/>'?></center></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>	
</div>
</body>
</html>
