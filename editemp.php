<!DOCTYPE html>
<html>
<head>
	<title>Admin DashBoard</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" 
	href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		
	


	</style>
</head>
<body style="background-color: #222">
	<?php
include'adminnav.php';
include'conn.php';

if(isset($_GET['fadi']))
	$x=$_GET['fadi'];

$result=mysqli_query($con,"select * from emp where id='$x'");

$rr=mysqli_fetch_array($result);
	?> 

<div class="container">
	<div class="alert alert-warning">
			<h2 class="text-center"><i class="fa fa-wrench"></i> Update Employee </h2>
		</div>


<form action="editemp.php?fadi=<?php echo $x; ?>" method="post">

<div class="row">
		<div class="col-md-6 mr-4">
			<div class="panel panel-warning">
				<div class="panel-body">
					<h3 >Personal Data :</h3>
					<label >Full Name :</label>
					<input value="<?php echo $rr['name']; ?>" type="text" class="form-control " placeholder="Full Name" name="n"><br>

					<label >Residence :</label>
					<select name="re" class="form-control">
						<option value="Resident">Resident</option>
						<option value="Non-Resident">Non-Resident</option>
					</select><br>


					<label >Nationalty :</label>
					<input value="<?php echo $rr['nat']; ?>" type="text" class="form-control " placeholder="Nationalty" name="nat"><br>
					
					<label >Qualification :</label>
					<input value="<?php echo $rr['qual']; ?>" type="text" class="form-control" placeholder="Qualification" name="q"><br>

					<label >Job Name :</label>
					<input value="<?php echo $rr['jobname']; ?>" type="text" class="form-control" placeholder="Job Name.." name="j"><br>

					<label >Salary :</label>
					<input value="<?php echo $rr['salary']; ?>" type="number" class="form-control" placeholder="Salary" name="s"><br>

					
				</div>
			</div>
		</div>


		<div class="col-md-6 mr-4">
			<div class="panel panel-warning">
				<div class="panel-body">
					<label >Rate :</label>
					<input value="<?php echo $rr['rate']; ?>" type="text" class="form-control" placeholder="Rate" name="r"><br>

					<label >Date Of Birth :</label>
					<input value="<?php echo $rr['dob']; ?>" type="Date" class="form-control" name="dob"><br>

					<label >Date Of Join :</label>
					<input value="<?php echo $rr['doj']; ?>" type="Date" class="form-control" name="doj"><br>

					<label >Start Date :</label>
					<input value="<?php echo $rr['sd']; ?>" type="Date" class="form-control" name="sd"><br>

					<label >End Date :</label>
					<input value="<?php echo $rr['ed']; ?>" type="Date" class="form-control" name="ed"><br>

					<input type="submit" value="Save" class="btn btn-warning btn-lg" name="btn">
					<a href="me.php" style="color: #131137;font-size: 15px;font-weight: bold;">Back To Employee Mangement Page <i class="fa fa-chevron-right"></i></a>
				</div>
			</div>
		</div>
	</div>

</form>
</div>



	<div class="footer" style="border:solid 1px #ffdb00;">
		<h2 style="color: #ffdb00;" class="text-center text-uppercase">HR BACT</h2>
	</div>

<?php



$name=isset($_POST['n'])?$_POST['n']:'';
$salary=isset($_POST['s'])?$_POST['s']:'';
$nat=isset($_POST['nat'])?$_POST['nat']:'';
$dob=isset($_POST['dob'])?$_POST['dob']:'';
$doj=isset($_POST['doj'])?$_POST['doj']:'';
$sd=isset($_POST['sd'])?$_POST['sd']:'';
$ed=isset($_POST['ed'])?$_POST['ed']:'';
$rate=isset($_POST['r'])?$_POST['r']:'';
$jobname=isset($_POST['j'])?$_POST['j']:'';
$qual=isset($_POST['q'])?$_POST['q']:'';
$re=isset($_POST['re'])?$_POST['re']:'';

if(isset($_POST['btn']))
{
	$res=mysqli_query($con,"update emp 
	set name='$name',nat='$nat',qual='$qual',jobname='$jobname',salary='$salary',rate='$rate',dob='$dob',doj='$doj',sd='$sd',ed='$ed',resident='$re' where id='$x'");
	
	if(isset($res))
	{
		echo'
		<script> alert("add Employee Successfully");</script>
		';
		
		
	}

	else{
	echo'
		<script> alert("add Employee Failed Try Again");</script>
		';
}
}
?>






<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
<?php
ob_end_flush();
?>