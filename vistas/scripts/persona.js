var tabla;

function init(){

   mostrarform(false);

   listar();

   $("#formulario").on("submit",function(e){

		guardaryeditar(e);

	});
	
}



//funcion limpiar

function limpiar(){

	$("#nombre").val("");

    $("#num_documento").val("");

	$("#direccion").val("");

	$("#telefono").val("");

	$("#email").val("");

	$("#cargo").val("");

	$("#login").val("");

	$("#clave").val("");

	$("#imagenmuestra").attr("src","");

	$("#imagenactual").val("");

	$("#idusuario").val("");

}



//funcion mostrar formulario

function mostrarform(flag){

	limpiar();

	if(flag){

		$("#listadoregistros").hide();

		$("#formularioregistros").show();

		$("#btnGuardar").prop("disabled",false);

		$("#btnagregar").hide();

	}else{

		$("#listadoregistros").show();

		$("#formularioregistros").hide();

		$("#btnagregar").show();

	}

}



//cancelar form

function cancelarform(){

	limpiar();

	mostrarform(false);

}



//funcion listar

function listar(){

	tabla=$('#tbllistado').dataTable({

		"aProcessing": true,//activamos el procedimiento del datatable

		"aServerSide": true,//paginacion y filrado realizados por el server

		dom: 'Bfrtip',//definimos los elementos del control de la tabla

		buttons: [

                  'copyHtml5',

                  'excelHtml5',

                  'csvHtml5',

                  'pdf'

		],

		"ajax":

		{

			url:'../ajax/persona.php?op=listar',

			type: "get",

			dataType : "json",

			error:function(e){

				console.log(e.responseText);

			}

		},

		"bDestroy":true,

		"iDisplayLength":7,//paginacion

		"order":[[0,"desc"]]//ordenar (columna, orden)

	}).DataTable();

}

//funcion para guardaryeditar

function guardaryeditar(e){

     e.preventDefault();//no se activara la accion predeterminada 

     $("#btnGuardar").prop("disabled",true);

     var formData=new FormData($("#formulario")[0]);

     $.ajax({

     	url: "../ajax/persona.php?op=guardaryeditar",

     	type: "POST",

     	data: formData,

     	contentType: false,

     	processData: false,



     	success: function(datos){

     		alert(datos);

     		mostrarform(false);

     		tabla.ajax.reload();

     	}

     });

     limpiar();

}



function mostrar(idPersona){

	$.post("../ajax/persona.php?op=mostrar",{idPersona : idPersona},

		function(data,status)

		{

			data=JSON.parse(data);

			mostrarform(true);



			$("#Nombre").val(data.Nombre);

            $("#Apaterno").val(data.Apaterno);

            $("#Amaterno").val(data.Amaterno);

            $("#Correo").val(data.Correo);

            $("#Telefono").val(data.Telefono);

            $("#idPersona").val(data.idPersona);

		});


}

//funcion para desactivar

function desactivar(idPersona){


	$.post("../ajax/persona.php?op=desactivar", {idPersona : idPersona}, function(e){

		alert(e);

		tabla.ajax.reload();

	});

}


function activar(idPersona){


	$.post("../ajax/persona.php?op=activar", {idPersona : idPersona}, function(e){

		alert(e);

		tabla.ajax.reload();

	});

}

init();