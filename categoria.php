<?php
include'conexion.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
       <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">      
        <!--css los iconos y menu desplegable -->
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <!--libreria de iconos-->
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <!--js para la paginacion-->
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>        
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        
        <title>CATEGORIA</title>
    </head>
    <body>
        <header>
              <h4>CATEGORIA</h4>
              <div ><span class="icon-menu"></span></div>>
        </header>

          <ul class="menu">
                <li class="line"><a href="index.html"><label class="icon-home"><font>INICIO</font></label></a></li>
                <li class="line"><a href="factura.php"><label class="icon-cart"><font >FACTURA</font></label></a></li>
                <li class="line"><a href="cliente.php"><label class="icon-user-tie"><font>CLIENTE</font></label></a></li>
                <li class="line"><a href="vendedor.php"><label class="icon-profile"><font>VENDEDOR</font></label></a></li>
                <li class="line"><a href="producto.php"><label class="icon-dropbox"><font>PRODUCTO</font></label></a></li>
                
                <li class="line"><a href="categoria.php"><label class="icon-database"><font>CATEGORIA</font></label></a></li>
                <li class="line"><a href="modo_pago.php"><label class="icon-coin-dollar"><font>MODO PAGO</font></label></a></li>               
                
            </ul>
        <div class="container">
	<div class="row">
        
            <br>
        <button  type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
                        Registrar cliente
                    </button>
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID CATEGORIA</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCION</th>                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql="SELECT * FROM categoria";
                    $result=$conn->query($sql);
                    if($result->num_rows >0){
                        while($row=$result->fetch_assoc()){
                            ?>
                    <tr>
                        <td><input type="checkbox" class="checkthis" /></td>
                        <td><?php echo $row["id_categoria"]?></td>
                        <td><?php echo $row["nombre"]?></td>
                        <td><?php echo $row["descripcion"]?></td>                        
                        <td><button class="btn btn-primary btn-xs edit_data" data-toggle='modal' data-target='#editUsu' data-id='<?php echo $row["id_categoria"]?>' data-nombre='<?php echo $row["nombre"]; ?>'  data-des='<?php echo $row["descripcion"]; ?>' class='btn btn-info'><span class="glyphicon glyphicon-pencil" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td> 
                        <td><button class="btn btn-danger btn-xs delete_data"  data-toggle='modal' data-target='#confirm-delete'data-id='<?php echo $row["id_categoria"]?>' data-nombre='<?php echo $row["nombre"]; ?>' data-des='<?php echo $row["descripcion"]; ?>'class='btn btn-info'><span class="glyphicon glyphicon-trash" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td>
                    </tr>
                    <?php
                        }
                    }else{
                        echo "0 results";
                    }
                    
                    ?>
                </tbody>
            </table>
            
             </div>
        </div>
        
       <!-- registro categoria -->
                     <form class="modal fade" id="myModal" method="POST" action="categoria_sql_registro.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">REGISTRAR CATEGORIA</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                    <div class="form-vertical"  autocomplete="off">
                                        <div class="form-group"> 
                                             <div class="col-sm-10">
                                            <label for="id" class="col-sm-2 control-label">ID_CATEGORIA</label>
                                            <input  id="id_categoria" name="id_categori" type="text"  class="form-control" placeholder="Id categoria" required >  
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
                                                <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
                                                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" required>
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
                <form class="modal fade" id="editUsu" method="POST" action="categoria_sql_actualizar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ACTUALIZAR CATEGORIA</h5>
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
                                                <label for="des" class="col-sm-2 control-label">descripcion</label>
                                                <input type="text" class="form-control" id="des" name="descripcion" placeholder="descripcion" required>
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
               <form class="modal fade" id="confirm-delete" method="POST" action="categoria_sql_eliminar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ELIMINAR CATEGORIA</h5>
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
                                                <label for="des" class="col-sm-2 control-label">descripcion</label>
                                                <input type="text" class="form-control" id="des" name="descripcion" placeholder="descripcion" required readonly>
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
                    var recipient2 = button.data('des');
                    
                    var modal = $(this);
                    modal.find('.modal-body #id').val(recipient0);
                    modal.find('.modal-body #nombre').val(recipient1);
                    modal.find('.modal-body #des').val(recipient2);
                    
                    
                 });
                $('#editUsu').on('show.bs.modal', function  (event)  {
                    
                    var button = $(event.relatedTarget);
                    var recipient0 = button.data('id');
                    var recipient1 = button.data('nombre');
                    var recipient2 = button.data('des');
                   
                    var modal = $(this);
                    modal.find('.modal-body #id').val(recipient0);
                    modal.find('.modal-body #nombre').val(recipient1);
                    modal.find('.modal-body #des').val(recipient2);
                    
                    
                });
                
                
                //script que nos sirve para confirmar las eliminacion del dato de la tabla
                    //$('#confirm-delete').on('show.bs.modal', function (e) {
                    //$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

                    //$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
                //});


            </script>
           
            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <!--js_menu-->
            <script src="js/script.js"></script>
            <?php 
            $conn->close();
            
            ?>
    </body>
</html>
