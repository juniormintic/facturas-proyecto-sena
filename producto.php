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


        <title>PRODUCTOS</title>
    </head>
    <body>
    </body>
    
    <header>
              <h4>PRODUCTO</h4>
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
        
            <br>
        
            <button  type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
                        Registrar producto
                    </button>
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID PRODUCTO</th>
                        <th>NOMBRE</th>
                        <th>PRECIO</th>
                        <th>STOCK</th>
                        <th>ID CATEGORIA</th>
                        <th>IMAGEN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql= "SELECT * FROM producto";
                    $result=$conn->query($sql);
                        if($result->num_rows > 0){
                            while($row=$result->fetch_assoc()){
                            ?>
                    <tr>
                        <td><input type="checkbox" class="checkthis" /></td>
                        <td><?php echo $row["id_producto"]?></td>
                        <td><?php echo $row["nombre"]?></td>
                        <td><?php echo $row["precio"]?></td>
                        <td><?php echo $row["stock"]?></td>
                        <td><?php echo $row["id_categoria"]?></td>
                        <td><?php echo $row["imagen"]?></td>
                        <td><button class="btn btn-primary btn-xs edit_data" data-toggle='modal' data-target='#editUsu' data-id='<?php echo $row["id_producto"]?>' data-nombre='<?php echo $row["nombre"]; ?>' data-precio='<?php echo $row["precio"]; ?>' data-stock='<?php echo $row["stock"]; ?>'data-id_categoria='<?php echo $row["id_categoria"]; ?>'data-imagen='<?php echo $row["imagen"]; ?>' class='btn btn-info'><span class="glyphicon glyphicon-pencil" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td> 
                        <td><button class="btn btn-danger btn-xs delete_data"  data-toggle='modal' data-target='#confirm-delete'data-id='<?php echo $row["id_producto"]?>' data-nombre='<?php echo $row["nombre"]; ?>' data-precio='<?php echo $row["precio"]; ?>' data-stock='<?php echo $row["stock"]; ?>'data-id_categoria='<?php echo $row["id_categoria"]; ?>'data-imagen='<?php echo $row["imagen"]; ?>'class='btn btn-info'><span class="glyphicon glyphicon-trash" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td>
                    </tr>
                      <?php
                        }
                    }else{
                        echo "0 results";
                    }
                    
                    ?>
            </table>
       
        
       
        </div>
        </div>
    <!-- registro cliente -->
                     <form class="modal fade" id="myModal" method="POST" action="producto_sql_registro.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">REGISTRAR PRODUCTO</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                    <div class="form-vertical"  autocomplete="off">
                                        <div class="form-group"> 
                                             <div class="col-sm-10">
                                            <label for="id" class="col-sm-2 control-label">ID_CLIENTE</label>
                                            <input  id="id_producto" name="id_producto" type="text"  class="form-control" placeholder="Id producto" required >  
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
                                                <label for="precio" class="col-sm-2 control-label">precio:</label>
                                                <input type="text" class="form-control" id="precio" name="precio" placeholder="precio" required>
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="stock" class="col-sm-2 control-label">stock:</label>
                                                <input type="text" class="form-control" id="stock" name="stock" placeholder="stock">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="id_categoria" class="col-sm-2 control-label">id_categoria:</label>
                                                <select class="form-control col-md-9"  name="id_categoria" id="id_categoria"  required>
                                                <option></option>                                   
                                                    <?php
                                                      $sql2="SELECT * FROM categoria";
                                                      $result2=$conn->query($sql2);
                                                      while($row2=$result2->fetch_assoc()){
                                                          echo "<option value=\"".$row2['id_categoria']."\">".$row2["id_categoria"]." - ".$row2['nombre'].'</option>';
                                                      }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="imagen" class="col-sm-2 control-label">imagen:</label>
                                                <input type="text" class="form-control" id="imagen" name="imagen" placeholder="imagen">
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
                <form class="modal fade" id="editUsu" method="POST" action="producto_sql_actualizar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ACTUALIZAR PRODUCTO</h5>
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
                                                <label for="precio" class="col-sm-2 control-label">precio:</label>
                                                <input type="text" class="form-control" id="precio" name="precio" placeholder="precio" required>
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="stock" class="col-sm-2 control-label">stock:</label>
                                                <input type="text" class="form-control" id="stock" name="stock" placeholder="stock">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="id_categoria" class="col-sm-2 control-label">id_categoria:</label>
                                                <select class="form-control col-md-9"  name="id_categoria" id="id_categoria"  required>
                                                 <option></option>                                   
                                                    <?php
                                                      $sql3="SELECT * FROM categoria";
                                                      $result3=$conn->query($sql3);
                                                      while($row3=$result3->fetch_assoc()){
                                                          echo "<option value=\"".$row3['id_categoria']."\">".$row3["id_categoria"]." - ".$row3['nombre'].'</option>';
                                                      }
                                                    ?>
                                              </select>    
                                            </div>
                                        </div>
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="imagen" class="col-sm-2 control-label">imagen:</label>
                                                <input type="text" class="form-control" id="imagen" name="imagen" placeholder="imagen">
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
				<h5 class="modal-title" id="myModalLabel">ELIMINAR PRODUCTO</h5>
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
                                                <label for="precio" class="col-sm-2 control-label">precio:</label>
                                                <input type="text" class="form-control" id="precio" name="precio" placeholder="precio" required readonly>
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="stock" class="col-sm-2 control-label">stock:</label>
                                                <input type="text" class="form-control" id="stock" name="stock" placeholder="stock" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="id_categoria" class="col-sm-2 control-label">id_categoria:</label>
                                                <input type="text" class="form-control" id="id_categoria" name="id_categoria" placeholder="id_categoria" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="imagen" class="col-sm-2 control-label">imagen:</label>
                                                <input type="text" class="form-control" id="imagen" name="imagen" placeholder="imagen" readonly>
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
                    var recipient2 = button.data('precio');
                    var recipient3 = button.data('stock');
                    var recipient4 = button.data('id_categoria');
                    var recipient5 = button.data('imagen');
                    
                    var modal = $(this);
                    modal.find('.modal-body #id').val(recipient0);
                    modal.find('.modal-body #nombre').val(recipient1);
                    modal.find('.modal-body #precio').val(recipient2);
                    modal.find('.modal-body #stock').val(recipient3);
                    modal.find('.modal-body #id_categoria').val(recipient4);
                    modal.find('.modal-body #imagen').val(recipient5);
                    
                    
                 });
                $('#editUsu').on('show.bs.modal', function  (event)  {
                    
                    var button = $(event.relatedTarget);
                    var recipient0 = button.data('id');
                    var recipient1 = button.data('nombre');
                    var recipient2 = button.data('precio');
                    var recipient3 = button.data('stock');
                    var recipient4 = button.data('id_categoria');
                    var recipient5 = button.data('imagen');
                    
                    var modal = $(this);
                    modal.find('.modal-body #id').val(recipient0);
                    modal.find('.modal-body #nombre').val(recipient1);
                    modal.find('.modal-body #precio').val(recipient2);
                    modal.find('.modal-body #stock').val(recipient3);
                    modal.find('.modal-body #id_categoria').val(recipient4);
                    modal.find('.modal-body #imagen').val(recipient5);
                   
                    
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
