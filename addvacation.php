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
			<h1 class="text-center"><i class="fa fa-table"></i>  Add Vacation  </h1>
		</div>


		<div class="row">

			<div class="col-md-2"></div>

			<div class="col-md-8">
				<div class="panel panel-warning">
			<div class="panel-heading">
				<h1 class="text-center text-uppercase">add New vacation </h1>
			</div>

			<div class="panel-body">
		<form action="addvacation.php" method="post">
		<label >Employee Name :</label>
					<select name="n" class="form-control">
						<?php
						include'conn.php';
						$r=mysqli_query($con,"select * from vac");
						while($row=mysqli_fetch_array($r))
						{
							echo'
							<option value="'.$row['name'].'">'.$row['name'].'</option>

							';
						}


						?>
					</select><br>



<label >Number Of Days :</label>
		<input type="text" placeholder="enter number of days"  class="form-control" name="num"><br>


		<label >Vacation Type :</label>

		<input type="text" placeholder="entertype of vacation"  class="form-control" name="t"><br>

		<label >Start Date :</label>

		<input type="date" class="form-control" name="sd"><br>

<label >End Date :</label>

		<input type="date" class="form-control" name="ed"><br>

	


		<input type="submit" value="Save" class="btn btn-warning btn-lg" name="btn">
		
		</form>
			</div>

			<div class="panel-footer"></div>

		</div>
			</div>

			<div class="col-md-2"></div>
			




		</div>

</div>









<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>

<?php

$name=isset($_POST['n'])?$_POST['n']:'';
$num=isset($_POST['num'])?$_POST['num']:'';
$type=isset($_POST['t'])?$_POST['t']:'';

$sd=isset($_POST['sd'])?$_POST['sd']:'';

$ed=isset($_POST['ed'])?$_POST['ed']:'';



$tt='';
$take='';
if(isset($_POST['btn']))
{

$r1=mysqli_query($con,"select * from vac where name='$name'");
$tr=mysqli_fetch_array($r1);


if($num > $tr['remin'])
{
	echo'
		<script> alert("your remin day less than the entered value");</script>
		';
}

else{
$tt=$tr['remin']-$num;
$take=$tr['taked']+$num;
$res=mysqli_query($con,"insert into 
	vacation(name,total,taked,remin,sd,ed,type)
	values('$name','".$tr['total']."','$num','$tt','$sd','$ed','$type')");


	$qq=mysqli_query($con,"update vac set remin='$tt',taked='$take' where name='$name'");
	if(isset($res))
	{
		echo'
		<script> alert("add Data Successfully");</script>
		';
	}

	else{
	echo'
		<script> alert("add Data Failed Try Again");</script>
		';
}
}







	
}
ob_end_flush();
?>
