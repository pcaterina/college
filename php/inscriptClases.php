<!--Codigo para guardar datos en fichero txt utilizando Clases
<?php

class Alumno 
{
	public	$Nombre; 
	public	$Apellido;
	public	$Direccion;
	public	$Telefono;
	public	$Sexo; 
	public	$Edad;
	public	$Email;
	public	$Curso;
	
	
	public function SetNombre($nombre){
		$this->Nombre=$nombre;
	}
	public function GetNombre(){
		return $this->Nombre;
	}
	public function SetApellido($apellido){
		$this->Apellido=$apellido;
	}
	public function GetApellido(){
		return $this->Apellido;
		
	public function SetDireccion($direccion){
		$this->Direccion=$direccion;
	}
	public function GetDireccion(){
		return $this->Direccion;
	}
	public function SetTelefono($telefono){
		$this->Telefono=$telefono;
	}
	public function GetTelefono(){
		return $this->Telefono;
	}
	
	public function SetSexo($sexo){
		$this->Sexo=$sexo;
	}
	public function GetSexo(){
		return $this->Sexo;
	}
	public function SetEdad($edad){
		$this->Edad=$edad;
	}
	public function GetEdad(){
		return $this->Edad;
	}
	
	public function SetEmail($email){
		$this->Email=$email;
	}
	public function GetEmail(){
		return $this->Email;
	}
	
	public function Seturso($curso){
		$this->Curso=$curso;
	}
	public function GetCurso(){
		return $this->Curso;
	}
}
		$arayalumnos=  array ();
		$i=0;
		$file = fopen("../archivoRegistros/usuarios.txt","r") or die("Un error se ha producido.");
		while(!feof($file)) {
			$linea= trim(fgets($file));
			$datos= explode (",",$linea);
			
			$nombre=$datos[0];
			$apellido=$datos[1];
			$direccion=$datos[2];
			$telefono=$datos[3];
			$sexo=$datos[4];
			$edad=$datos[5];
			$email=$datos[6];
			$curso=$datos[7];
			
			$alumno = new Alumno();
			$alumno ->SetNombre($nombre);
			$alumno ->SetApellido($apellido
			$alumno ->SetDireccion($direccion);
			$alumno ->SetTelefono($telefono);
			$alumno ->SetSexo($sexo);
			$alumno ->SetEdad($edad);
			$alumno ->SetEmail($email);
			$alumno ->SetCurso($curso);
			
			$arayalumnos[$i]=$alumno;//guardo el objeto en un array
			$i++;
			
		}
		
		$j= count($arayalumnos);
		for ($i=0; $i<$j; $i++){
			
		echo	$arayalumnos[$i]->GetNombre(). ", ";
		echo	$arayalumnos[$i]->GetApellido().", ";
		echo	$arayalumnos[$i]->GetDireccion().", ";
		echo	$arayalumnos[$i]->GetTelefono().", ";
		echo	$arayalumnos[$i]->GetSexo().", ";
		echo	$arayalumnos[$i]->GetEdad().", ";
		echo	$arayalumnos[$i]->GetEmail().", ";
		echo	$arayalumnos[$i]->GetCurso().", ";
		echo "</br>";	
		}

?>