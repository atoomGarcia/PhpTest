<?php 

session_start();

require_once "../modelos/Persona.php";


$persona=new Persona();

$idpersona=isset($_POST["idPersona"])? limpiarCadena($_POST["idPersona"]):"";

$nombre=isset($_POST["Nombre"])? limpiarCadena($_POST["Nombre"]):"";

$apaterno=isset($_POST["Apaterno"])? limpiarCadena($_POST["Apaterno"]):"";

$amaterno=isset($_POST["Amaterno"])? limpiarCadena($_POST["Amaterno"]):"";

$correo=isset($_POST["Correo"])? limpiarCadena($_POST["Correo"]):"";

$telefono=isset($_POST["Telefono"])? limpiarCadena($_POST["Telefono"]):"";


switch ($_GET["op"]) {

	case 'guardaryeditar':

        if (empty($idpersona)) {

            $rspta=$persona->insertar($nombre,$apaterno,$amaterno,$correo,$telefono);

            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar todos los datos del usuario";

        }else{

            $rspta=$persona->editar($idpersona,$nombre,$apaterno,$amaterno,$correo,$telefono);

            echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";

        }

	break;


	case 'desactivar':

	$rspta=$persona->desactivar($idpersona);

	echo $rspta ? "Persona desactivada correctamente" : "No se pudo desactivar a la persona";

	break;


	case 'activar':

	$rspta=$persona->activar($idpersona);

	echo $rspta ? "Persona activada correctamente" : "No se pudo activar  a la persona";

	break;


	case 'mostrar':

	$rspta=$persona->mostrar($idpersona);

	echo json_encode($rspta);

	break;


	case 'listar':

	$rspta=$persona->listar();

	$data=Array();

	while ($reg=$rspta->fetch_object()) {

		$data[]=array(

			"0"=>($reg->Estatus)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idPersona.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idPersona.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idPersona.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->idPersona.')"><i class="fa fa-check"></i></button>',

            "1"=>$reg->idPersona,

			"2"=>$reg->Nombre,

			"3"=>$reg->Apaterno,

			"4"=>$reg->Amaterno,

			"5"=>$reg->Correo,

			"6"=>$reg->Telefono,

			"7"=>($reg->Estatus)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'

		);

	}

    $results=array(

        "sEcho"=>1,//info para datatables

        "iTotalRecords"=>count($data),//enviamos el total de registros al datatable

        "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar

        "aaData"=>$data); 

    echo json_encode($results);



	break;
	
}

?>
