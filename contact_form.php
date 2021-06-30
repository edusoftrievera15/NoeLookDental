<?php
session_start();
include('includes/config.php');
if(isset($_POST['submit']))
{
	$cmessage = $_POST['message'];
	$name = $_POST['name'];
	$from = $_POST['email'];
    $subject = $_POST['subject'];
$query="insert into  contactos(message,name,email,subject) values(?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('ssss',$cmessage,$name,$from,$subject);
$stmt->execute();
echo"<script>alert('Paciente Registrado correctamente');</script>";
}
?>