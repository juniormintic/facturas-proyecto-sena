<?php
include 'conexion.php';
$id_factura=$_GET['id_factura'];
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

        <title>DETALLE</title>
    </head>
    <body>
        <header>
              <h4>DETALLE</h4>
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
       
         
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID DETALLE</th>
                        <th>ID FACTURA</th>
                        <th>ID PRODUCTOS</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO</th>
                        <th></th>
                        <th></th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php
                   $sql = "SELECT * FROM detalle WHERE id_facturas=$id_factura";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                   while($row=$result->fetch_assoc()){
                ?>     
                    <tr>
                        <td><input type="checkbox" class="checkthis" /></td>
                         <td><?php echo $row["id_detalle"] ?></td>
                    <td><?php echo $row["id_facturas"] ?></td>
                    <td><?php echo $row["id_producto"] ?></td>   
                    <td><?php echo $row["cantidad"] ?></td>
                    <td><?php echo $row["precio"] ?></td>
                        <td><button class="btn btn-primary btn-xs edit_data" data-toggle='modal' data-target='#editUsu' data-id='<?php echo $row["id_detalle"]?>' data-id_factura='<?php echo $row["id_facturas"]; ?>' data-id_producto='<?php echo $row["id_producto"]; ?>' data-cantidad='<?php echo $row["cantidad"]; ?>'data-precio='<?php echo $row["precio"]; ?>' class='btn btn-info'><span class="glyphicon glyphicon-pencil" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td> 
                        <td><button class="btn btn-danger btn-xs delete_data"  data-toggle='modal' data-target='#confirm-delete'data-id='<?php echo $row["id_detalle"]?>' data-id_factura='<?php echo $row["id_facturas"]; ?>' data-id_producto='<?php echo $row["id_producto"]; ?>' data-cantidad='<?php echo $row["cantidad"]; ?>'data-precio='<?php echo $row["precio"]; ?>' class='btn btn-info'><span class="glyphicon glyphicon-trash" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td>
                    </tr>
                    <?php
                        }
                    }else{
                        echo "0 result";
                    }
                    
                    ?>
                </tbody>
            </table>
            
       
            
         <!-- registro cliente -->
         <div><h4>REGISTRAR DETALLE</h4></div>
         <form method="POST" name="detalle_registro" action="detalle_sql_registro.php">
                
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID DETALLE</th>
                        <th><input type="text" name="id_detalle" value="" size="20" required=""> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ID FACTURA</td>
                        <td><input type="text" name="id_factura" value="<?php echo $id_factura?>" size="20" readonly ></td>
                    </tr>
                    <tr>
                        <td>ID PRODUCTO</td>
                        <td><select  name="id_producto" id="producto" required>
                                    <option></option>                                   
                                     <?php
                                       $sqlpro="SELECT * FROM producto";
                                       $result1=$conn->query($sqlpro);
                                       while($rowpro=$result1->fetch_assoc()){
                                          echo "<option value=\"".$rowpro['id_producto']."\">".$rowpro["id_producto"]." - ".$rowpro['nombre'].'</option>';
                                           
                                       }
                                     ?>
                                </select>  
                        </td>
                    </tr>
                    <tr>
                        <td>CANTIDAD</td>
                        <td><input type="text" name="cantidad" value="" size="20"required=""></td>
                    </tr>                    
                    <tr>
                        <td>PRECIO</td>
                        <td><input type="text" name="precio" value="" size="20"required=""></td>
                    </tr>
                    <tr>
                        <td><input name="insertar" type="reset" value="limpiar"class="btn btn-primary mb-2"</td>
                        <td><input name="insertar" type="submit" value="insertar registro" class="btn btn-primary mb-2"</td>
                    </tr>                    
                </tbody>
            </table>

        </form>
                </div>                              
                <!-- The Modal editar -->
                <form class="modal fade" id="editUsu" method="POST" action="detalle_sql_actualizar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ACTUALIZAR DETALLE</h5>
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
                                                <label for="id_facturas" class="col-sm-2 control-label">ID_FACTURA:</label>
                                                <input type="text" class="form-control col-md-9" name="id_facturas" value="<?php echo $id_factura?>" size="20" readonly >
                                                
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="id_producto" class="col-sm-2 control-label">ID_PRODUCTO:</label>
                                                <select class="form-control col-md-9"  name="id_producto" id="id_producto"  required>
                                                <option></option>                                   
                                                    <?php
                                                      $sql5="SELECT * FROM producto";
                                                      $result5=$conn->query($sql5);
                                                      while($row5=$result5->fetch_assoc()){
                                                          echo "<option value=\"".$row5['id_producto']."\">".$row5["id_producto"]." - ".$row5["nombre"].'</option>';
                                                      }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="cantidad" class="col-sm-2 control-label">cantidad:</label>
                                                <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad"required >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="precio" class="col-sm-2 control-label">precio:</label>
                                                <input type="text" class="form-control" id="precio" name="precio" placeholder="precio" required>
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
               <form class="modal fade" id="confirm-delete" method="POST" action="detalle_sql_eliminar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ELIMINAR DETALLE</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                    <div class="form-vertical"  autocomplete="off">
                                        
                                        <input  id="id" name="id" type="hidden" >  
                                        
                                        <div class="form-group">                                            
                                            
                                            <div class="col-sm-10">
                                                <label for="id_facturas" class="col-sm-2 control-label">id_facturas:</label>
                                                <input type="text" class="form-control col-md-9" name="id_facturas" value="<?php echo $id_factura?>"  readonly >
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="id_producto" class="col-sm-2 control-label">id_producto:</label>
                                                <input type="text" class="form-control" id="id_producto" name="id_producto" placeholder="id_producto" readonly>
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="cantidad" class="col-sm-2 control-label">cantidad:</label>
                                                <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="precio" class="col-sm-2 control-label">precio:</label>
                                                <input type="text" class="form-control" id="precio" name="precio" placeholder="precio" readonly>
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
                    var recipient1 = button.data('id_facturas');
                    var recipient2 = button.data('id_producto');
                    var recipient3 = button.data('cantidad');
                    var recipient4 = button.data('precio');
                   
                    var modal = $(this);
                    modal.find('.modal-body #id').val(recipient0);
                    modal.find('.modal-body #id_facturas').val(recipient1);
                    modal.find('.modal-body #id_producto').val(recipient2);
                    modal.find('.modal-body #cantidad').val(recipient3);
                    modal.find('.modal-body #precio').val(recipient4);
                    
                    
                 });
                $('#editUsu').on('show.bs.modal', function  (event)  {
                    
                    var button = $(event.relatedTarget);
                    var recipient0 = button.data('id');
                    var recipient1 = button.data('id_facturas');
                    var recipient2 = button.data('id_producto');
                    var recipient3 = button.data('cantidad');
                    var recipient4 = button.data('precio');
                  
                    var modal = $(this);
                    modal.find('.modal-body #id').val(recipient0);
                    modal.find('.modal-body #id_facturas').val(recipient1);
                    modal.find('.modal-body #id_producto').val(recipient2);
                    modal.find('.modal-body #cantidad').val(recipient3);
                    modal.find('.modal-body #precio').val(recipient4);
                   
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
