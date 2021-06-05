<?php 

//incluir la conexion de base de datos

require "../config/conexion.php";



class Persona{


public function __construct(){



}


//metodo insertar persona

public function insertar($nombre,$apaterno,$amaterno,$correo,$telefono){
    
    $sw=true;
	$sql="INSERT INTO persona (Nombre,Apaterno,Amaterno,Correo,Telefono,Estatus) VALUES ('$nombre','$apaterno','$amaterno','$correo','$telefono','1')";
	$sql;
    ejecutarConsulta($sql) or $sw=false;

	 return $sw;

}
//editar persona
public function editar($idpersona,$nombre,$apaterno,$amaterno,$correo,$telefono){
   
    $sw=true;
	$sql="UPDATE Persona SET Nombre='$nombre',Apaterno='$apaterno',Amaterno='$amaterno',Correo='$correo',Telefono='$telefono' WHERE idPersona='$idpersona'";
    ejecutarConsulta($sql) or $sw=false;

	return $sw;

}
//inactivar persona
public function desactivar($idpersona){

	$sql="UPDATE persona SET Estatus='0' WHERE idPersona='$idpersona'";
    return ejecutarConsulta($sql);

}
//activar persona
public function activar($idpersona){

	$sql="UPDATE persona SET Estatus='1' WHERE idPersona='$idpersona'";
    return ejecutarConsulta($sql);

}

// mostrar datos de persona
public function mostrar($idpersona){

	$sql="SELECT * FROM persona WHERE idPersona='$idpersona'";

	return ejecutarConsultaSimpleFila($sql);

}

//listar personas

public function listar(){

	$sql="SELECT * FROM persona";
	return ejecutarConsulta($sql);

}

}


 ?>
