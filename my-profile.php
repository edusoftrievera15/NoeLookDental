<?php
session_start();
include('includes/config.php');
date_default_timezone_set('Asia/Kolkata');
include('includes/checklogin.php');
check_login();
$aid=$_SESSION['id'];
if(isset($_POST['update']))
{

$regno=$_POST['regno'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$contactno=$_POST['contact'];
$udate = date('d-m-Y h:i:s', time());
$query="update  userRegistration set regNo=?,firstName=?,middleName=?,lastName=?,gender=?,contactNo=?,updationDate=? where id=?";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('ssssssss',$regno,$fname,$mname,$lname,$gender,$contactno,$udate,$aid);
$stmt->execute();
echo"<script>alert('Profile updated Succssfully');</script>";
}
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Mi Perfil</title>
	<link rel="stylesheet" href="admin/css/font-awesome.min.css">
	<link rel="stylesheet" href="admin/css/bootstrap.min.css">
	<link rel="stylesheet" href="admin/css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="admin/css/bootstrap-social.css">
	<link rel="stylesheet" href="admin/css/bootstrap-select.css">
	<link rel="stylesheet" href="admin/css/fileinput.min.css">
	<link rel="stylesheet" href="admin/css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="admin/css/style.css">
<script type="text/javascript" src="js2/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js2/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
function valid()
{
if(document.registration.password.value!= document.registration.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.registration.cpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
	<?php	
$aid=$_SESSION['id'];
	$ret="select * from userregistration where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$aid);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>	
				<div class="row">
					<div class="col-md-12">						
						<h2 class="page-title">Perfil <?php echo $row->firstName; echo " "; echo $row->lastName?></h2>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">


ÚLTIMA FECHA DE ACTUALIZACIÓN : &nbsp; <?php echo $row->updationDate;?> 
</div>
									

<div class="panel-body">
<form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();">
								
								

<div class="form-group">
<label class="col-sm-2 control-label">N° DNI : </label>
<div class="col-sm-8">
<input type="text" name="regno" id="regno"  class="form-control" required="required" value="<?php echo $row->regNo;?>" >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Nombres : </label>
<div class="col-sm-8">
<input type="text" name="fname" id="fname"  class="form-control" value="<?php echo $row->firstName;?>"   required="required" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Apellidos: </label>
<div class="col-sm-8">
<input type="text" name="mname" id="mname"  class="form-control" value="<?php echo $row->middleName;?>"  >
</div>
</div>

<!--div class="form-group">
<label class="col-sm-2 control-label">Last Name : </label>
<div class="col-sm-8">
<input type="text" name="lname" id="lname"  class="form-control" value="<!?php echo $row->lastName;?>" required="required">
</div>
</div-->

<div class="form-group">
<label class="col-sm-2 control-label">Genero : </label>
<div class="col-sm-8">
<select name="gender" class="form-control" required="required">
<option value="<?php echo $row->gender;?>"><?php echo $row->gender;?></option>
<option value="male">Masculino</option>
<option value="female">Femenino</option>
<option value="others">Otros</option>

</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Celular : </label>
<div class="col-sm-8">
<input type="text" name="contact" id="contact"  class="form-control" maxlength="10" value="<?php echo $row->contactNo;?>" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Email id: </label>
<div class="col-sm-8">
<input type="email" name="email" id="email"  class="form-control" value="<?php echo $row->email;?>" readonly>
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>
<?php } ?>

						



<div class="col-sm-6 col-sm-offset-4">

<input type="submit" name="update" Value="Actualizar Perfil" class="btn btn-primary">
</div>
</form>

									</div>
									</div>
								</div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		</div>
	</div>
	<script src="js2/jquery.min.js"></script>
	<script src="js2/bootstrap-select.min.js"></script>
	<script src="js2/bootstrap.min.js"></script>
	<script src="js2/jquery.dataTables.min.js"></script>
	<script src="js2/dataTables.bootstrap.min.js"></script>
	<script src="js2/Chart.min.js"></script>
	<script src="js2/fileinput.js"></script>
	<script src="js2/chartData.js"></script>
	<script src="js2/main.js"></script>
</body>
<script type="text/javascript">
	$(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#paddress').val( $('#address').val() );
                $('#pcity').val( $('#city').val() );
                $('#pstate').val( $('#state').val() );
                $('#ppincode').val( $('#pincode').val() );
            } 
            
        });
    });
</script>
	<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

</html>