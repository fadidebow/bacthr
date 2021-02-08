<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin DashBoard</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" 
	href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color: #222">
	<?php
include'adminnav.php';
	?> 

<div class="container">
	<div style="height: 60px;"></div>
	<div style="border-radius: 10px;border:solid 2px #ffdb00;">
	<div class="row">
		<div class="col-md-6 mr-4">
			<img src="images/bact1.png" style="width: 100%">
		</div>


		<div class="col-md-6 mr-4">
			<h1 style="color: #ffdb00;">HR BACT <i class="fa fa-home"></i></h1>
			<h2 style="color: #ffdb00;">Manage Employee Information</h2>
			<h3 style="color: #ffdb00;">Easely Way To Catch Every Thing</h3>
		</div>
	</div>
</div>
</div>









<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>

<?php
ob_end_flush();
?>