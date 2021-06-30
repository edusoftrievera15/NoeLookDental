<?php

    //session_start();
        
    include('includes/config.php');

    if(isset($_POST['nombre_completo']) && !empty($_POST['nombre_alumno']) &&
        isset($_POS['email']) && !empty(['email']) &&
        isset($_POS['cel']) && !empty(['cel']) &&
        isset($_POS['edad']) && !empty(['edad']) &&
        isset($_POS['fecha']) && !empty(['fecha']) &&
        isset($_POS['hora']) && !empty(['hora']) &&
        isset($_POS['tconsultas']) && !empty(['tconsultas'])) {

            $con=mysqli_connect($dbuser,$dbpass,$host,$db);
            mysqli_query($con,("INSERT INTO consulta(nombre_completo,email) VALUES ('$_POST[nombre_completo]','$_POST[email]')"));
            echo "datos insertados";

        }else{
            echo "error al instalar";


        }


?>