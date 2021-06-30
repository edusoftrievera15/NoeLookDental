<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=$_POST['password'];
$stmt=$mysqli->prepare("SELECT email,password,id FROM userregistration WHERE email=? and password=? ");
				$stmt->bind_param('ss',$email,$password);
				$stmt->execute();
				$stmt -> bind_result($email,$password,$id);
				$rs=$stmt->fetch();
				$stmt->close();
				$_SESSION['id']=$id;
				$_SESSION['login']=$email;
				$uip=$_SERVER['REMOTE_ADDR'];
				$ldate=date('d/m/Y h:i:s', time());
				if($rs)
				{
             $uid=$_SESSION['id'];
             $uemail=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
$city = $addrDetailsArr['geoplugin_city'];
$country = $addrDetailsArr['geoplugin_countryName'];
$log="insert into userLog(userId,userEmail,userIp,city,country) values('$uid','$uemail','$ip','$city','$country')";
$mysqli->query($log);
if($log)
{
header("location:dashboard.php");
				}
}
				else
				{
					echo "<script>alert('Usuario o Contraseña Inválidos');</script>";
				}
			}
				?>
				<?php
					//session_start();
					include('includes/config.php');
					if(isset($_POST['submit']))
					{
					$regno=$_POST['regno'];
					$fname=$_POST['fname'];
					$mname=$_POST['mname'];
					$lname=$_POST['lname'];
					$gender=$_POST['gender'];
					$contactno=$_POST['contact'];
					$emailid=$_POST['email'];
					$password=$_POST['password'];
					$query="insert into  userRegistration(regNo,firstName,middleName,lastName,gender,contactNo,email,password) values(?,?,?,?,?,?,?,?)";
					$stmt = $mysqli->prepare($query);
					$rc=$stmt->bind_param('ssssssss',$regno,$fname,$mname,$lname,$gender,$contactno,$emailid,$password);
					$stmt->execute();
					echo"<script>alert('Paciente Registrado Exitosamente');</script>";
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
	<title>NoeLookDental</title>
	<link rel="stylesheet" href="admin/css/font-awesome.min.css">
	<link rel="stylesheet" href="admin/css/bootstrap.min.css">
	<link rel="stylesheet" href="admin/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="admin/css/bootstrap-social.css">
	<link rel="stylesheet" href="admin/css/bootstrap-select.css">
	<link rel="stylesheet" href="admin/css/fileinput.min.css">
	<link rel="stylesheet" href="admin/css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="admin/css/style.css">
	<link rel="stylesheet" href="assets/css/stylesp.css">

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
	<!--?php include('includes/header.php');?-->
	<!--div class="ts-main-content"-->
		<!--?php include('includes/sidebar.php');?-->
		<!--div class="content-wrapper"-->
			<!--div class="container-fluid"-->
	<main>
			<div class="contenedor-todo" >
            <div class="caja-trasera" >
                <div class="caja-trasera-login" >
                    <h3>Ya tienes una Cuenta?</h3>
                    <p>Inicia Sesión para ingresar a la pagina</p>
                    <button id="btn-iniciar-sesion" >Iniciar Sesión</button>
                </div>
                <div class="caja-trasera-register" >
                    <h3>Aun no tienes cuenta?</h3>
                    <p>Resgistrate para inciar sesión</p>
                    <button id="btn-registrarse" >Registrarse</button>
                </div>
            </div>   
        <!--Fomrulario de login y regsitro-->
				
            <div class="contenedor-login-register" >
            <!--Login-->
                <form action=""  method="POST" class="formulario-login">
				<!--center> <li ><a href="admin"><i class="fa fa-lg fa-sign-in"></i> Login Administrador</a> </li-->
                    <p class="centrado">
                        <a href="admin"><i class="fa fa-lg fa-sign-in"></i>  Login Administrador</a>
                        <img src="../LoginNoeLook/assets/img/logologin.png" width="250" height="110" >
                      </p>
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Email" name="email" class="form-control mb">
                    <input type="password" placeholder="Password" name="password" class="form-control mb">
                    <center><input type="submit" name="login" class="	" value="Iniciar"style='width:50%' ></center>
                    <br>
					<center><a href="/ProyectoDentalEduardo/index.php"><i class="fa fa-lg fa-sign-in"></i>  Ir a Pagina Principal</a></center>
                </form>
                <!--Registro-->
                
				<form method="post" action="" name="registration" class="formulario-register" onSubmit="return valid();">
                    <p class="centrado">
                        <img src="../LoginNoeLook/assets/img/logologin.png" width="250" height="110" >
                      </p>
                    <!--h2>Registrarse</h2-->
					<input type="text" name="regno" id="regno" placeholder="DNI" class="form-control" required="required" style='width:35%' >
                    <input type="text" name="fname" id="fname" placeholder="Nombres" class="form-control" required="required" >
					<input type="text" name="mname" id="mname" placeholder="Apellido Paterno" class="form-control">
                    <input type="text" name="lname" id="lname" placeholder="Apellidos Materno" class="form-control" required="required">
					<select name="gender" class="form-control" required="required" style='width:55%' >
					<option value="">Seleccionar Genero</option>
					<option value="male">Hombre</option>
					<option value="female">Mujer</option>
					<option value="others">Otros</option>
					</select>
					<input type="text" name="contact" id="contact" placeholder="Celular" class="form-control" required="required">
					<input type="email" name="email" id="email" placeholder="Correo" class="form-control" onBlur="checkAvailability()" required="required">
						<span id="user-availability-status" style="font-size:12px;"></span>
					<input type="password" name="password" id="password" placeholder="Password" class="form-control" required="required">
                    <input type="password" name="cpassword" id="cpassword" placeholder="Confirmar Password" class="form-control" required="required">
                    
                    <!--button class="btn btn-default" type="submit">Cancelar</button-->
					<input type="submit" name="submit" Value="Registrar" class="btn btn-primary" style='width:50%' >
					<center><a href="/ProyectoDentalEduardo/index.php"><i class="fa fa-lg fa-sign-in"></i>  Ir a Pagina Principal</a></center>
					
                </form>
        </div>
        </div>
		</div>
		</div>
	</main>
	
	<script src="assets/js/script.js"></script>
</body>
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
error:function ()
{
event.preventDefault();
alert('error');
}
});
}
</script>

</html>