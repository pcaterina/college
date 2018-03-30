
<?php 
 
$contrasena = $_GET["passw"];
$archivo="admin.txt";

$file = fopen($archivo, "r") or die("No se puede abrir el archivo!");
$dato=trim(fgets($file));

if ($contrasena==$dato){ 
	echo "Tiene acceso al fichero";
}
	else{
	echo "No tiene acceso al fichero";	
	}

fclose($file);
?>
