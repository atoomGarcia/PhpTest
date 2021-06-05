<?php 

//activamos almacenamiento en el buffer

ob_start();

session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>phpTest</title>

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <!-- Font Awesome -->

  <link rel="stylesheet" href="../public/css/font-awesome.min.css">

  <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../public/css/_all-skins.min.css">
  <link rel="stylesheet" href="../public/css/animate.css" />
  <link rel="stylesheet" href="../public/datatables/jquery.dataTables.min.css">

<link rel="stylesheet" href="../public/datatables/buttons.dataTables.min.css">

<link rel="stylesheet" href="../public/datatables/responsive.dataTables.min.css"> 
</head>
<body>

<div class="container">

      <div class="row">

        <div class="col-md-12">

      <div class="box">

<div class="box-header with-border">

  <h1 class="box-title">Persona <button class="btn btn-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i> Agregar</button> </a></h1>

  <div class="box-tools pull-right">

    
  </div>

</div>

<!--box-header-->

<!--centro-->

<div class="panel-body table-responsive" id="listadoregistros">

  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <h1>Listado de personas:</h1>
    <thead>
    
      <th>Opciones</th>

      <th>ID</th>

      <th>Nombre</th>

      <th>Apaterno</th>

      <th>Amaterno</th>

      <th>Correo</th>

      <th>Teléfono</th>

      <th>Estado</th>

    </thead>

    <tbody>

    </tbody>

    <tfoot>

      <th>Opciones</th>

      <th>ID</th>

      <th>Nombre</th>

      <th>Apaterno</th>

      <th>Amaterno</th>

      <th>Correo</th>

      <th>Teléfono</th>

      <th>Estado</th>

    </tfoot>   

  </table>

</div>

<div class="panel-body" id="formularioregistros">
  <form action="" name="formulario" id="formulario" method="POST">

    <div class="form-group col-lg-12 col-md-12 col-xs-12">

      <label for="">Nombre(*):</label>

      <input class="form-control" type="hidden" name="idPersona" id="idPersona">

      <input class="form-control" type="text" name="Nombre" id="Nombre" maxlength="50" placeholder="Nombre" required>

    </div>

    <div class="form-group col-lg-6 col-md-6 col-xs-12">

      <label for="">Apelido Paterno(*):</label>

      <input class="form-control" type="text" name="Apaterno" id="Apaterno" maxlength="50" placeholder="Apellido Paterno" required>

    </div>

    <div class="form-group col-lg-6 col-md-6 col-xs-12">

      <label for="">Apelido Materno(*):</label>

      <input class="form-control" type="text" name="Amaterno" id="Amaterno" maxlength="50" placeholder="Apellido Materno" required>

    </div>

       <div class="form-group col-lg-6 col-md-6 col-xs-12">

      <label for="">Correo</label>

      <input class="form-control" type="Email" name="Correo" id="Correo" maxlength="40" placeholder="Correo Electronico" required>

    </div>

       <div class="form-group col-lg-6 col-md-6 col-xs-12">

      <label for="">Teléfono</label>

      <input class="form-control" type="number" name="Telefono" id="Telefono" maxlength="20" placeholder="Teléfono" required>

    </div>

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <button class="btn btn-primary" type="submit" id="Guardar"><i class="fa fa-save"></i>  Guardar</button>

        <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>

    </div>

  </form>

</div>

<!--fin centro-->

      </div>

      </div>

      </div>

 <script src="../public/js/jquery.min.js"></script>

<script src="../public/js/bootstrap.min.js"></script>

<script src="../public/js/adminlte.min.js"></script>

<script src="../public/datatables/buttons.colVis.min.js"></script>

<script src="../public/datatables/buttons.html5.min.js"></script>

<script src="../public/datatables/dataTables.buttons.min.js"></script>

<script src="../public/datatables/jquery.dataTables.min.js"></script>

<script src="../public/datatables/jszip.min.js"></script>

<script src="../public/datatables/pdfmake.min.js"></script>

<script src="../public/datatables/vfs_fonts.js"></script>

<script src="../public/datatables/datatables.min.js"></script>

<script src="../public/js/jquery.PrintArea.js"></script>

 <script src="scripts/persona.js"></script>
 

</body>

</html>



 <?php 

ob_end_flush();
?>