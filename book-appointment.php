<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//Codigo para Registrar (Registration)
if(isset($_POST['submit']))
{
$roomno=$_POST['room'];
$seater=$_POST['seater'];
$feespm=$_POST['fpm'];
$foodstatus=$_POST['foodstatus'];
$stayfrom=$_POST['stayf'];
$duration=$_POST['duration'];
$course=$_POST['course'];
$regno=$_POST['regno'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$contactno=$_POST['contact'];
$emailid=$_POST['email'];
$emcntno=$_POST['econtact'];
$gurname=$_POST['gname'];
$gurrelation=$_POST['grelation'];
$gurcntno=$_POST['gcontact'];
$caddress=$_POST['address'];
$ccity=$_POST['city'];
$cstate=$_POST['state'];
$cpincode=$_POST['pincode'];
$paddress=$_POST['paddress'];
$pcity=$_POST['pcity'];
$pstate=$_POST['pstate'];
$ppincode=$_POST['ppincode'];
$query="insert into  registration(roomno,seater,feespm,foodstatus,stayfrom,duration,course,regno,firstName,middleName,lastName,gender,contactno,emailid,egycontactno,guardianName,guardianRelation,guardianContactno,corresAddress,corresCIty,corresState,corresPincode,pmntAddress,pmntCity,pmnatetState,pmntPincode) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('ssssssssssssssssssssssssss',$roomno,$seater,$feespm,$foodstatus,$stayfrom,$duration,$course,$regno,$fname,$mname,$lname,$gender,$contactno,$emailid,$emcntno,$gurname,$gurrelation,$gurcntno,$caddress,$ccity,$cstate,$cpincode,$paddress,$pcity,$pstate,$ppincode);
$stmt->execute();
echo"<script>alert('Registro Satisfactorio de tu Cita');</script>";
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
	<title>NoeLoolDental</title>
	<link rel="stylesheet" href="admin/css/font-awesome.min.css">
	<link rel="stylesheet" href="admin/css/bootstrap.min.css">
	<link rel="stylesheet" href="admin/css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="admin/css/bootstrap-social.css">
	<link rel="stylesheet" href="admin/css/bootstrap-select.css">
	<link rel="stylesheet" href="admin/css/fileinput.min.css">
	<link rel="stylesheet" href="admin/css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="admin/css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script>
function getSeater(val) {
$.ajax({
type: "POST",
url: "get_seater.php",
data:'roomid='+val,
success: function(data){
//alert(data);
$('#seater').val(data);
}
});

$.ajax({
type: "POST",
url: "get_seater.php",
data:'rid='+val,
success: function(data){
//alert(data);
$('#fpm').val(data);
}
});
}
</script>

</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Reservar Cita </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Diligencia toda la información</div>
									<div class="panel-body">
										<form method="post" action="" class="form-horizontal">
							<?php
$uid=$_SESSION['login'];
							 $stmt=$mysqli->prepare("SELECT emailid FROM registration WHERE emailid=? ");
				$stmt->bind_param('s',$uid);
				$stmt->execute();
				$stmt -> bind_result($email);
				$rs=$stmt->fetch();
				$stmt->close();
				if($rs)
				{ ?>
			<h3 style="color: red" align="left">Tienes Reservas ya Programada -- (Consulta en Detalles de reservas)</h3>
				<?php }
				else{
							echo "";
							}			
							?>			
<div class="form-group">
<label class="col-sm-4 control-label"><h4 style="color: green" align="left">Completa los datos requeridos para tu reserva </h4> </label>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Fecha de Cita</label>
<div class="col-sm-8">
<input type="date" name="stayf" id="stayf"  class="form-control" style='width:22%'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Hora de Cita</label>
<div class="col-sm-8">
<select name="room" id="room"class="form-control"  onChange="getSeater(this.value);" onBlur="checkAvailability()" style='width:22%'> 
<option value="">Selecciona...</option>
<?php $query ="SELECT * FROM rooms";
$stmt2 = $mysqli->prepare($query);
$stmt2->execute();
$res=$stmt2->get_result();
while($row=$res->fetch_object())
{
?>
<option value="<?php echo $row->room_no;?>"> <?php echo $row->room_no;?></option>
<?php } ?>
</select> 
<span id="room-availability-status" style="font-size:12px;"></span>

</div>
</div>
											
<div class="form-group">
<label class="col-sm-2 control-label">Profesional</label>
<div class="col-sm-8">
<input type="text" name="seater" id="seater"  class="form-control" readonly require="Disabled" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Especialidad</label>
<div class="col-sm-8">
<input type="text" name="fpm" id="fpm"  class="form-control" readonly require="Disabled">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Modo de Pago</label>
<div class="col-sm-8">
<input type="radio" value="0" name="foodstatus" checked="checked"> Efectivo <br>
<input type="radio" value="1" name="foodstatus"> Trasnferencia <br>

</div>
</div>	



<div class="form-group">
<label class="col-sm-2 control-label">Desea Recibir Notificaciones ?</label>
<div class="col-sm-8">
<select name="duration" id="duration" class="form-control">
<option value="">Selecciona..</option>
<option value="Si">Si</option>
<option value="No">No</option>


</select>
</div>
</div>

<!--div class="form-group">
<label class="col-sm-2 control-label">Monto Total</label>
<div class="col-sm-8">
<input type="text" name="ta" id="ta"  class="result form-control" >
</div>
</div-->

<div class="form-group">
<label class="col-sm-2 control-label"><h4 style="color: green" align="left">Información Personal </h4> </label>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Tipo de Consulta / Tratamiento </label>
<div class="col-sm-8">
<select name="course" id="course" class="form-control" required> 
<option value="">Selecciona tipo...</option>
<?php $query ="SELECT * FROM courses";
$stmt2 = $mysqli->prepare($query);
$stmt2->execute();
$res=$stmt2->get_result();
while($row=$res->fetch_object())
{
?>
<option value="<?php echo $row->course_fn;?>"><?php echo $row->course_fn;?>&nbsp;&nbsp;(<?php echo $row->course_sn;?>)</option>
<?php } ?>
</select> </div>
</div>

<?php	
$aid=$_SESSION['id'];
	$ret="select * from userregistration where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$aid);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 $cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>

<div class="form-group">
<label class="col-sm-2 control-label">No de registro : </label>
<div class="col-sm-8">
<input type="text" name="regno" id="regno"  class="form-control" value="<?php echo $row->regNo;?>" readonly >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Primer nombre : </label>
<div class="col-sm-8">
<input type="text" name="fname" id="fname"  class="form-control" value="<?php echo $row->firstName;?>" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Segundo nombre : </label>
<div class="col-sm-8">
<input type="text" name="mname" id="mname"  class="form-control" value="<?php echo $row->middleName;?>"  readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Apellido : </label>
<div class="col-sm-8">
<input type="text" name="lname" id="lname"  class="form-control" value="<?php echo $row->lastName;?>" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Género : </label>
<div class="col-sm-8">
<input type="text" name="gender" value="<?php echo $row->gender;?>" class="form-control" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">No de Contacto : </label>
<div class="col-sm-8">
<input type="text" name="contact" id="contact" value="<?php echo $row->contactNo;?>"  class="form-control" readonly>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Correo : </label>
<div class="col-sm-8">
<input type="email" name="email" id="email"  class="form-control" value="<?php echo $row->email;?>"  readonly>
</div>
</div>
<?php }
?>

<div class="form-group">
<label class="col-sm-2 control-label">Nª Cel de Referencia: </label>
<div class="col-sm-8">
<input type="text" name="econtact" id="econtact"  class="form-control" style='width:35%' required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Nombre de Contacto de referencia : </label>
<div class="col-sm-8">
<input type="text" name="gname" id="gname"  class="form-control" style='width:35%'  required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Parentesco del Contacto: </label>
<div class="col-sm-8">
<input type="text" name="grelation" id="grelation"  class="form-control" style='width:35%' required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Tiempo aproximado en llegar al consultorio : </label>
<div class="col-sm-8">
<input type="text" name="gcontact" id="gcontact"  class="form-control" required style='width:20%'> minutos 
</div>
</div>	
<label style="color: red" align="left">Los datos siguientes, seran solicitados en consulta para su Historia Clínica --- (Dejar vacio) </h4> </label>
<div class="form-group">
<label class="col-sm-3 control-label"><h4 style="color: green" align="left">Dirección de Correspondencia </h4> </label>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Dirección : </label>
<div class="col-sm-8">
<textarea  rows="5" name="address"  id="address" class="form-control" style='width:35%' readonly require="Disabled"></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Ciudad : </label>
<div class="col-sm-8">
<input type="text" name="city" id="city"  class="form-control" style='width:35%' readonly require="Disabled">
</div>
</div>	

<div class="form-group">
<label class="col-sm-2 control-label">Departamento </label>
<div class="col-sm-8">
<select name="state" id="state"class="form-control" style='width:35%' readonly require="Disabled"> 
<option value="">Seleccionar Departamento</option>
<?php $query ="SELECT * FROM states";
$stmt2 = $mysqli->prepare($query);
$stmt2->execute();
$res=$stmt2->get_result();
while($row=$res->fetch_object())
{
?>
<option value="<?php echo $row->State;?>"><?php echo $row->State;?></option>
<?php } ?>
</select> </div>
</div>							

<div class="form-group">
<label class="col-sm-2 control-label">Código PIN : </label>
<div class="col-sm-8">
<input type="text" name="pincode" id="pincode"  class="form-control" style='width:35%' readonly require="Disabled">
</div>
</div>	

<div class="form-group">
<label class="col-sm-3 control-label"><h4 style="color: green" align="left">Dirección Permanente </h4> </label>
</div>


<div class="form-group">
<label class="col-sm-5 control-label">Dirección de permanencia es la misma que la de correspondencia? </label>
<div class="col-sm-4">
<input type="checkbox" name="adcheck" value="1"/>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Dirección : </label>
<div class="col-sm-8">
<textarea  rows="5" name="paddress"  id="paddress" class="form-control" style='width:35%' readonly require="Disabled"></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Ciudad : </label>
<div class="col-sm-8">
<input type="text" name="pcity" id="pcity"  class="form-control" style='width:35%' readonly require="Disabled">
</div>
</div>	

<div class="form-group">
<label class="col-sm-2 control-label">Departamento </label>
<div class="col-sm-8">
<select name="pstate" id="pstate"class="form-control" style='width:35%' readonly require="Disabled"'> 
<option value="">Selecciona departamento</option>
<?php $query ="SELECT * FROM states";
$stmt2 = $mysqli->prepare($query);
$stmt2->execute();
$res=$stmt2->get_result();
while($row=$res->fetch_object())
{
?>
<option value="<?php echo $row->State;?>"><?php echo $row->State;?></option>
<?php } ?>
</select> </div>
</div>							

<div class="form-group">
<label class="col-sm-2 control-label">Código de PIN </label>
<div class="col-sm-8">
<input type="text" name="ppincode" id="ppincode"  class="form-control" style='width:35%' readonly require="Disabled">
</div>
</div>	


<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit">Cancelar</button>
<input type="submit" name="submit" Value="Registrar" class="btn btn-primary">
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
data:'roomno='+$("#room").val(),
type: "POST",
success:function(data){
$("#room-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>


<script type="text/javascript">

$(document).ready(function() {
	$('#duration').keyup(function(){
		var fetch_dbid = $(this).val();
		$.ajax({
		type:'POST',
		url :"ins-amt.php?action=userid",
		data :{userinfo:fetch_dbid},
		success:function(data){
	    $('.result').val(data);
		}
		});
		

})});
</script>

</html>