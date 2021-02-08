<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin DashBoard</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" 
	href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color: #222">
	<?php
include'adminnav.php';
	?> 

<div class="container">
	<div class="alert alert-warning">
			<h1 class="text-center"><i class="fa fa-table"></i> Add Documents to Employee </h1>
		</div>


		<div class="row">

			<div class="col-md-3"></div>

			<div class="col-md-6">
				<div class="panel panel-warning">
			<div class="panel-heading">
				<h1 class="text-center text-uppercase">Insert New Document </h1>
			</div>

			<div class="panel-body">
		<form action="adddoc.php" method="post" enctype="multipart/form-data">
		<label >Employee Name :</label>
					<select name="n" class="form-control">
						<?php
						include'conn.php';
						$r=mysqli_query($con,"select * from emp");
						while($row=mysqli_fetch_array($r))
						{
							echo'
							<option value="'.$row['name'].'">'.$row['name'].'</option>

							';
						}


						?>
					</select><br>



<label >Document Type :</label>
		<input type="text" placeholder="enter Document Type"  class="form-control" name="t"><br>

<label >Choose Document :</label>
<input type="file"   class="form-control" name="ff"><br>

		<input type="submit" value="Save" class="btn btn-warning btn-lg" name="btn">
		
		</form>
			</div>

			<div class="panel-footer"></div>

		</div>
			</div>

			<div class="col-md-3"></div>
			




		</div>

</div>









<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>

<?php

$name=isset($_POST['n'])?$_POST['n']:'';
$type=isset($_POST['t'])?$_POST['t']:'';

$filename=isset($_FILES['ff']['name'])?$_FILES['ff']['name']:'';
$file=isset($_FILES['ff']['tmp_name'])?$_FILES['ff']['tmp_name']:'';

$dt=date("Y-m-d");
$filename=$name.'_'.$dt.'_'.$filename;


if(isset($_POST['btn']))
{
	move_uploaded_file($file, "uploads/$filename");
	$res=mysqli_query($con,"insert into 
	documents(name,doctype,file)
	values('$name','$type','$filename')");
	if(isset($res))
	{
		echo'
		<script> alert("add Document Successfully");</script>
		';
	}

	else{
	echo'
		<script> alert("add Document failed.. Try Again");</script>
		';
}
}
ob_end_flush();
?>
