<?php

$nombre =$_POST["nombre"];
$apellido= $_POST["apellido"];
$direccion= $_POST["dir"];
$telefono= $_POST["telf"]; 
$email =$_POST["email"];
$edad =$_POST["edad"];
$sexo = $_POST["sexo"];
$curso= $_POST["curso"];
 
$_SESSION["Nombre"] = $nombre;
$_SESSION["Apellido"] = $apellido;
$_SESSION["Direccion"] = $direccion;
$_SESSION["Telefono"] = $telefono;
$_SESSION["E-mail"] = $email;
$_SESSION["Edad"] = $edad;
$_SESSION["Sexo"] = $sexo;
$_SESSION["Curso"] = $curso;


$usuario = fopen("../archivoRegistros/usuarios.txt", "a+") or die("Unable to open file!");
$txt = PHP_EOL.$nombre.";";
fwrite($usuario, $txt);
$txt = $apellido.";";
fwrite($usuario, $txt);
$txt = $direccion.";";
fwrite($usuario, $txt);
$txt = $telefono.";";
fwrite($usuario, $txt);
$txt = $email.";";
fwrite($usuario, $txt);
$txt = $edad.";";
fwrite($usuario, $txt);
$txt = $sexo.";";
fwrite($usuario, $txt);
$txt = $curso;
fwrite($usuario, $txt);
fclose($usuario);


		echo '<head> <link rel="stylesheet" type="text/css" href="../css/estilos.css">
		
			<body><div id="container">
				<header id="header">
					<section id="logo"><img src=../imagenes/logo.jpg width="200" height="150"></section>
					<section id="banner">	
						<h1 style=" color:#00cc99; font-size:40px; ">KatasTrophiCall College</h1>
					</section>
				</header>
			<div class="tab" >
				
			</div></body>';
	echo "</br></br><h3 align='center'>Hola &nbsp;".$nombre.", </h3></br>";
	echo "<p align='center'>Te has inscrito correctamente. </p></br>";
	echo '<p align="center" fontsize="22px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="../index.html" alt="Home" title="Home Page" >Pulse aqui </a>&nbsp; para volver a la pagina de inicio.</p>';
?>




