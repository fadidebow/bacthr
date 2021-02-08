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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
</head>
<body style="background-color: #dedede">
	<?php
include'adminnav.php';
	?> 

<div class="container">
	<div class="alert alert-warning">
			<h3 class="text-center"><i class="fa fa-user"></i> Manage Employee </h3>
		</div>

<div class="table-responsive">
		<table class="table" id="xx">
		<thead>
			<tr>
				<th>Name</th>
				<th>Nationalty</th>
				<th>Qualifications</th>
				<th>Job Name</th>
				<th>Salary</th>
				<th>Rate</th>
				<th>Date Of Birth</th>
				<th>Date Of Join</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Resdint</th>

				<th>Delete</th>
				<th>Update</th>
			</tr>
		</thead>

		<tbody>
			<?php
			include'conn.php';
			$e=mysqli_query($con,"select * from emp");

			while($row=mysqli_fetch_array($e))
			{
				echo'
				<tr>
					
					
					<td>'.$row['name'].'</td>
					<td>'.$row['nat'].'</td>
					<td>'.$row['qual'].'</td>
					<td>'.$row['jobname'].'</td>
					<td>'.$row['salary'].'</td>
					<td>'.$row['rate'].'</td>
					<td>'.$row['dob'].'</td>
					<td>'.$row['doj'].'</td>
					<td>'.$row['sd'].'</td>
					<td>'.$row['ed'].'</td>
					<td>'.$row['resident'].'</td>


<td> <a href="me.php?fadi='.$row['id'].'" class="btn btn-danger">Delete <i class="fa fa-trash"></i>   </a> </td>



<td> <a href="editemp.php?fadi='.$row['id'].'" class="btn btn-primary">edit <i class="fa fa-edit"></i></a> </td>
					</tr>


				';
			}



		if(isset($_GET['fadi']))
		{
			$x=$_GET['fadi'];

			$t=mysqli_query($con,"delete from emp where id='$x'");
			if(isset($t)){
				header("Location: me.php");
			}
		}

			?>
		</tbody>



		
	</table>

</div>


</div>









<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
	$(document).ready( function () {
    $('#xx').DataTable();
} );
</script>
</body>
</html>
<?php
ob_end_flush();
?>