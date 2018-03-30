<?php


$titulo=($_POST["asunto"]);
$mensaje=($_POST["mensaje"]);
$destino=($_POST["email"]);
$desde="From:".($_POST["nombre"]);

 mail($destino, $titulo, $mensaje,$desde);
 
 $nombre=($_POST["nombre"]);
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
	echo "</br></br><h3 align='center'>Hola &nbsp;&nbsp;&nbsp;".$nombre.", </h3></br>";
	echo "<p align='center'>Tu email se ha enviado correctamente. </p></br>";
	echo '<p align="center" fontsize="22px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="../index.html" alt="Home" title="Home Page">Pulse aqui </a>&nbsp; para volver a la pagina de inicio.</p>';

 
 
 
 
	//echo "Tu email se ha enviado.";
	//if ( mail($destino, $titulo, $mensaje,$desde) === TRUE) {
	//echo "Tu email se ha enviado.";
			//header("location:../index.html");
	/*	} 	
		else {
			echo "Se a producido un error, tu mensaje no se pudo enviar.";
		}*/
?>


	
	