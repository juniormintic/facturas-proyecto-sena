<?php
include 'conexion.php';

?>
    <!--primero que todo cambiamos el idioma a español lang="es" -->
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <meta charset="UTF-8">
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
            <link href="css/style.css" rel="stylesheet" type="text/css"/>
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
            <!------ Include the above in your HEAD tag ---------->
            
           
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
           

            <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <link href="css/main.css" rel="stylesheet" type="text/css"/>
            
            <!--menu -->
            
            <title>cliente</title>       
        </head>
        <body>
            
            
         
          <header>
              <h4>CLIENTE</h4>
              <div ><span class="icon-menu"></span></div>>
        </header>
            <nav>
           <ul class="menu">
                <li class="line"><a href="index.html"><label class="icon-home"><font>INICIO</font></label></a></li>
                <li class="line"><a href="factura.php"><label class="icon-cart"><font >FACTURA</font></label></a></li>
                <li class="line"><a href="cliente.php"><label class="icon-user-tie"><font>CLIENTE</font></label></a></li>
                <li class="line"><a href="vendedor.php"><label class="icon-profile"><font>VENDEDOR</font></label></a></li>
                <li class="line"><a href="producto.php"><label class="icon-dropbox"><font>PRODUCTO</font></label></a></li>
                
                <li class="line"><a href="categoria.php"><label class="icon-database"><font>CATEGORIA</font></label></a></li>
                <li class="line"><a href="modo_pago.php"><label class="icon-coin-dollar"><font>MODO PAGO</font></label></a></li>               
                
            </ul>
            </nav>
            <br>
	<!--Menu-->
     
   <div class="container">
	<div class="row">
             
		 <button  type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
                        Registrar cliente
                    </button>
            <br>
            <br>
            
                <!--tabla responsive para mostrar los datos-->
                <div class="table-responsive-xl" >
                    <table id="example" class="table table-hover">
                        <thead class='thead-light'>
                            <!--campos fijos de la tabla-->
                            <tr>
                                 <td><input type="checkbox" class="checkthis" /></td>
                                <th>CLAVE</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th>
                                <th>DIRECCION</th>
                                <th>FECHA DE NACIMIENTO</th>
                                <th>TELEFONO</th>
                                <th>CORREO</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>			
                        <tbody>

                            <?php
                    $sql="SELECT * FROM cliente";
                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            ?>
                                    <tr>
                                         <td><input type="checkbox" class="checkthis" /></td>
                                        <td><?php echo $row["id_cliente"]?></td>
                                        <td><?php echo $row["nombre"]?></td>
                                        <td><?php echo $row["apellido"]?></td>
                                        <td><?php echo $row["direccion"]?></td>
                                        <td><?php echo $row["fecha_nacimiento"]?></td>
                                        <td><?php echo $row["telefono"]?></td>
                                        <td><?php echo $row["email"]?></td>
                                        <!--agregamos los botones para sus respectivas acciones modificar y borrar datos-->
                                        <td><button class="btn btn-primary btn-xs edit_data" data-toggle='modal' data-target='#editUsu' data-id='<?php echo $row["id_cliente"]?>' data-nombre='<?php echo $row["nombre"]; ?>' data-apellido='<?php echo $row["apellido"]; ?>' data-direccion='<?php echo $row["direccion"]; ?>'data-fecha_nacimiento='<?php echo $row["fecha_nacimiento"]; ?>'data-telefono='<?php echo $row["telefono"]; ?>'data-email='<?php echo $row["email"]; ?>' class='btn btn-info'><span class="glyphicon glyphicon-pencil" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td> 
                                        <td><button class="btn btn-danger btn-xs delete_data"  data-toggle='modal' data-target='#confirm-delete'data-id='<?php echo $row["id_cliente"]?>' data-nombre='<?php echo $row["nombre"]; ?>' data-apellido='<?php echo $row["apellido"]; ?>' data-direccion='<?php echo $row["direccion"]; ?>'data-fecha_nacimiento='<?php echo $row["fecha_nacimiento"]; ?>'data-telefono='<?php echo $row["telefono"]; ?>'data-email='<?php echo $row["email"]; ?>'class='btn btn-info'><span class="glyphicon glyphicon-trash" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td>
                                    </tr>

                               <?php
                        }
                    }else{
                        echo "0 result";
                    }
                    
                    ?>

                        </tbody>
                    </table>
                </div>
                 
            </div>
                    <!--paginacion-->
                    
            
                     <!-- registro cliente -->
                     <form class="modal fade" id="myModal" method="POST" action="cliente_sql_registro.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">REGISTRAR CLIENTE</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                    <div class="form-vertical"  autocomplete="off">
                                        
                                        
                                        
                                        <div class="form-group"> 
                                             <div class="col-sm-10">
                                            <label for="id" class="col-sm-2 control-label">ID_CLIENTE</label>
                                            <input  id="id_cliente" name="id_cliente" type="text"  class="form-control" placeholder="Id cliente" required >  
                                         </div>
                                            </div>
                                        <div class="form-group">                                            
                                            
                                            <div class="col-sm-10">
                                                <label for="nombre" class="col-sm-2 control-label">Nombre:</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="apellido" class="col-sm-2 control-label">apellido:</label>
                                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" required>
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="direccion" class="col-sm-2 control-label">direccion:</label>
                                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="fecha_nacimiento" class="col-sm-2 control-label">fecha_nacimiento:</label>
                                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="fecha_nacimiento">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="telefono" class="col-sm-2 control-label">telefono:</label>
                                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="correo" class="col-sm-2 control-label">correo:</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <td> <input name="limpiar" type="reset" class="btn btn-primary" value="Limpiar"></td>
                                                <td><input name="actualizar"type="submit" class="btn btn-primary" value="Guardar datos"></td>
                                            </div>
                                        </div>
                                    </div>
                                </tbody>
                                </table>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">cancelar</button>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </form>
                </div>                              
                <!-- The Modal editar -->
                <form class="modal fade" id="editUsu" method="POST" action="cliente_sql_actualizar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ACTUALIZAR CLIENTE</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                    <div class="form-vertical"  autocomplete="off">
                                        
                                        <input  id="id" name="id" type="hidden" >  
                                        </div>
                                        <div class="form-group">                                            
                                            
                                            <div class="col-sm-10">
                                                <label for="nombre" class="col-sm-2 control-label">Nombre:</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="apellido" class="col-sm-2 control-label">apellido:</label>
                                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" required>
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="direccion" class="col-sm-2 control-label">direccion:</label>
                                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="fecha_nacimiento" class="col-sm-2 control-label">fecha_nacimiento:</label>
                                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="fecha_nacimiento">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="telefono" class="col-sm-2 control-label">telefono:</label>
                                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="correo" class="col-sm-2 control-label">correo:</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <td> <input name="limpiar" type="reset" class="btn btn-primary" value="Limpiar"></td>
                                                <td><input name="actualizar"type="submit" class="btn btn-primary" value="Guardar datos"></td>
                                            </div>
                                        </div>
                                    </div>
                                </tbody>
                                </table>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">cancelar</button>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </form>
                
                
                
                
                
                <!-- Modal eliminar -->
               <form class="modal fade" id="confirm-delete" method="POST" action="cliente_sql_eliminar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ELIMINAR CLIENTE</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                    <div class="form-vertical"  autocomplete="off">
                                        
                                        <input  id="id" name="id" type="hidden" >  
                                        
                                        <div class="form-group">                                            
                                            
                                            <div class="col-sm-10">
                                                <label for="nombre" class="col-sm-2 control-label">Nombre:</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required readonly >
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="apellido" class="col-sm-2 control-label">apellido:</label>
                                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" required readonly>
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="direccion" class="col-sm-2 control-label">direccion:</label>
                                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="fecha_nacimiento" class="col-sm-2 control-label">fecha_nacimiento:</label>
                                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="fecha_nacimiento" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="telefono" class="col-sm-2 control-label">telefono:</label>
                                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="correo" class="col-sm-2 control-label">correo:</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="email" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                               
                                                <td><input name="eliminar"type="submit" class="btn btn-primary" value="Eliminar datos"></td>
                                            </div>
                                        </div>
                                    </div>
                                </tbody>
                                </table>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">cancelar</button>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </form>
	


            
            
         
            <script src="js/index.js" type="text/javascript"></script>
            <script src="js/jquery.min.js" type="text/javascript"></script>
            <script src="js/bootstrap.min.js" type="text/javascript"></script>
            <script>
                //script que elabora el pie de paginas de nuestra tabla y el buscador en tiempo real
                $(document).ready(function () {
                    $('#example').DataTable();
                });
                //script que  extrae los datos y los almanena para así poder modificarlos
                $('#confirm-delete').on('show.bs.modal',function  (event)  {
                    
                    var button = $(event.relatedTarget);
                    var recipient0 = button.data('id');
                    var recipient1 = button.data('nombre');
                    var recipient2 = button.data('apellido');
                    var recipient3 = button.data('direccion');
                    var recipient4 = button.data('fecha_nacimiento');
                    var recipient5 = button.data('telefono');
                    var recipient6 = button.data('email');
                    var modal = $(this);
                    modal.find('.modal-body #id').val(recipient0);
                    modal.find('.modal-body #nombre').val(recipient1);
                    modal.find('.modal-body #apellido').val(recipient2);
                    modal.find('.modal-body #direccion').val(recipient3);
                    modal.find('.modal-body #fecha_nacimiento').val(recipient4);
                    modal.find('.modal-body #telefono').val(recipient5);
                    modal.find('.modal-body #email').val(recipient6);
                    
                 });
                $('#editUsu').on('show.bs.modal', function  (event)  {
                    
                    var button = $(event.relatedTarget);
                    var recipient0 = button.data('id');
                    var recipient1 = button.data('nombre');
                    var recipient2 = button.data('apellido');
                    var recipient3 = button.data('direccion');
                    var recipient4 = button.data('fecha_nacimiento');
                    var recipient5 = button.data('telefono');
                    var recipient6 = button.data('email');
                    var modal = $(this);
                    modal.find('.modal-body #id').val(recipient0);
                    modal.find('.modal-body #nombre').val(recipient1);
                    modal.find('.modal-body #apellido').val(recipient2);
                    modal.find('.modal-body #direccion').val(recipient3);
                    modal.find('.modal-body #fecha_nacimiento').val(recipient4);
                    modal.find('.modal-body #telefono').val(recipient5);
                    modal.find('.modal-body #email').val(recipient6);
                    
                });
                
                
                //script que nos sirve para confirmar las eliminacion del dato de la tabla
                    //$('#confirm-delete').on('show.bs.modal', function (e) {
                    //$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

                    //$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
                //});


            </script>
           
            <script src="../js/jquery-1.12.4.js" type="text/javascript"></script>
            <script src="../js/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="../js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
            <!--menu-->
             <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script src="js/script.js"></script>
            <?php 
            $conn->close();
            
            ?>
        </body>
    </html>

