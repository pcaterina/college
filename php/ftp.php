<?php
class ftp
{
private $servidor;
private $usuario;
private $clave;
private $conexion;
private $login;

public function _construct ($servidor, $usuario, $clave){
   set_time_limit(0);
   $this->servidor=$servidor;
   $this->usuario=$usuario;
   $this->clave=$clave;
   $this->conectar($this->servidor);
   $this->loginFtp($usuario, $clave);
}
   private function conectar ($servidor){
       $this->conexion=ftp_connect($servidor, 21, 30);
}
private function loginFtp($usuario, $clave) {
$this->login = ftp_login($this->conexion, $usuario, $clave);
}
public function ver($directorio = "./") {
$this->archivos = ftp_nlist($this->conexion,$directorio);
foreach ($this->archivos as $archivo) {
echo "$archivo<br/>";
}
}
}
//$ftp = new ftp("127.0.0.1","luis","secreto");
$ftp = new ftp("ftp://ftp.cecca.es","","");
$ftp->ver("httpdocs/")
?>
