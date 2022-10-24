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

        <title>FACTURA</title>
    </head>
    <body>
        <header>
              <h4>FACTURA</h4>
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
                        Registrar factura
                    </button>
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID FACTURAS</th>
                        <th>ID CLIENTE</th>
                        <th>FECHA</th>
                        <th>ID VENDEDOR</th>
                        <th>MODO PAGO</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql="SELECT * FROM factura";
                    $result=$conn->query($sql);
                    if($result->num_rows >0){
                        while($row=$result->fetch_assoc()){
                            ?>
                    <tr>
                        <td><input type="checkbox" class="checkthis" /></td>
                        <td><?php echo $row["id_facturas"]?></td>
                        <td><?php echo $row["id_cliente"]?></td>
                        <td><?php echo $row["fecha"]?></td>
                        <td><?php echo $row["id_vendedor"]?></td>
                        <td><?php echo $row["num_pago"]?></td>
                        <td><button class="btn btn-primary btn-xs edit_data" data-toggle='modal' data-target='#editUsu' data-id='<?php echo $row["id_facturas"]?>' data-id_cliente='<?php echo $row["id_cliente"]; ?>' data-fecha='<?php echo $row["fecha"]; ?>' data-id_vendedor='<?php echo $row["id_vendedor"]; ?>'data-num_pago='<?php echo $row["num_pago"]; ?>' class='btn btn-info'><span class="glyphicon glyphicon-pencil" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td> 
                        <td><button class="btn btn-danger btn-xs delete_data"  data-toggle='modal' data-target='#confirm-delete'data-id='<?php echo $row["id_facturas"]?>' data-id_cliente='<?php echo $row["id_cliente"]; ?>' data-fecha='<?php echo $row["fecha"]; ?>' data-id_vendedor='<?php echo $row["id_vendedor"]; ?>'data-num_pago='<?php echo $row["num_pago"]; ?>'class='btn btn-info'><span class="glyphicon glyphicon-trash" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td>  
                        <td ><a class="btn btn-primary mb-2" href="detalles.php?id_factura=<?php echo $row["id_facturas"]; ?>">Detalle</a></td>
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
         <form class="modal fade" id="myModal" method="POST" action="factura_sql_registro.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">REGISTRAR FACTURA</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                    <div class="form-vertical"  autocomplete="off">
                                        <div class="form-group"> 
                                             <div class="col-sm-10">
                                            <label for="id" class="col-sm-2 control-label">ID_FACTURA</label>
                                            <input  id="id_factura" name="id_factura" type="text"  class="form-control" placeholder="Id factura" required >  
                                         </div>
                                            </div>
                                        <div class="form-group">                                            
                                            
                                            <div class="col-sm-10">
                                                <label for="id_cliente" class="col-sm-2 control-label">ID_CLIENTE:</label>
                                                <select class="form-control col-md-9"  name="id_cliente" id="id_cliente"  required>
                                                <option></option>                                   
                                                    <?php
                                                      $sql2="SELECT * FROM cliente";
                                                      $result2=$conn->query($sql2);
                                                      while($row2=$result2->fetch_assoc()){
                                                          echo "<option value=\"".$row2['id_cliente']."\">".$row2["id_cliente"]." - ".$row2['nombre'].'</option>';
                                                      }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="fecha" class="col-sm-2 control-label">fecha:</label>
                                                <input type="date" class="form-control" id="apellido" name="fecha" placeholder="fecha" required>
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="id_vendedor" class="col-sm-2 control-label">ID_VENDEDOR:</label>
                                                <select class="form-control col-md-9"  name="id_vendedor" id="id_vendedor"  required>
                                                <option></option>                                   
                                                    <?php
                                                      $sql4="SELECT * FROM vendedor";
                                                      $result4=$conn->query($sql4);
                                                      while($row4=$result4->fetch_assoc()){
                                                          echo "<option value=\"".$row4['id_vendedor']."\">".$row4["id_vendedor"]." - ".$row4['nombre'].'</option>';
                                                      }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="num_pago" class="col-sm-2 control-label">MODO_DE_PAGO:</label>
                                                <select class="form-control col-md-9"  name="num_pago" id="num_pago"  required>
                                                <option></option>                                   
                                                    <?php
                                                      $sql3="SELECT * FROM modo_pago";
                                                      $result3=$conn->query($sql3);
                                                      while($row3=$result3->fetch_assoc()){
                                                          echo "<option value=\"".$row3['num_pago']."\">".$row3["num_pago"]." - ".$row3['nombre'].'</option>';
                                                      }
                                                    ?>
                                                </select>
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
                <form class="modal fade" id="editUsu" method="POST" action="factura_sql_actualizar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ACTUALIZAR FACTURA</h5>
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
                                                <label for="id_cliente" class="col-sm-2 control-label">ID_CLIENTE:</label>
                                               <select class="form-control col-md-9"  name="id_cliente" id="id_cliente"  required>
                                                <option></option>                                   
                                                    <?php
                                                      $sql5="SELECT * FROM cliente";
                                                      $result5=$conn->query($sql5);
                                                      while($row5=$result5->fetch_assoc()){
                                                          echo "<option value=\"".$row5['id_cliente']."\">".$row5["id_cliente"]." - ".$row5['nombre'].'</option>';
                                                      }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="fecha" class="col-sm-2 control-label">Fecha:</label>
                                                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="fecha" required>
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="id_vendedor" class="col-sm-2 control-label">ID_vendedor:</label>
                                                <select class="form-control col-md-9"  name="id_vendedor" id="id_vendedor"  required>
                                                <option></option>                                   
                                                    <?php
                                                      $sql6="SELECT * FROM vendedor";
                                                      $result6=$conn->query($sql6);
                                                      while($row6=$result6->fetch_assoc()){
                                                          echo "<option value=\"".$row6['id_vendedor']."\">".$row6["id_vendedor"]." - ".$row6['nombre'].'</option>';
                                                      }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="num_pago" class="col-sm-2 control-label">Modo_de_pago:</label>
                                                <select class="form-control col-md-9"  name="num_pago" id="num_pago"  required>
                                                <option></option>                                   
                                                    <?php
                                                      $sql7="SELECT * FROM modo_pago";
                                                      $result7=$conn->query($sql7);
                                                      while($row7=$result7->fetch_assoc()){
                                                          echo "<option value=\"".$row7['num_pago']."\">".$row7["num_pago"]." - ".$row7['nombre'].'</option>';
                                                      }
                                                    ?>
                                                </select>
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
               <form class="modal fade" id="confirm-delete" method="POST" action="factura_sql_eliminar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ELIMINAR FACTURA</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                    <div class="form-vertical"  autocomplete="off">
                                        
                                        <input  id="id" name="id" type="hidden" >  
                                        
                                        <div class="form-group">                                            
                                            
                                            <div class="col-sm-10">
                                                <label for="id_cliente" class="col-sm-2 control-label">ID_CLIENTE:</label>
                                                <input type="text" class="form-control" id="id_cliente" name="id_cliente" placeholder="id_cliente" required readonly >
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="fecha" class="col-sm-2 control-label">fecha:</label>
                                                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="fecha" required readonly>
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="id_vendedor" class="col-sm-2 control-label">ID_VENDEDOR:</label>
                                                <input type="text" class="form-control" id="id_vendedor" name="id_vendedor" placeholder="id_vendedor" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="num_pago" class="col-sm-2 control-label">num_pago:</label>
                                                <input type="text" class="form-control" id="num_pago" name="num_pago" placeholder="num_pago" readonly>
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
                    var recipient1 = button.data('id_cliente');
                    var recipient2 = button.data('fecha');
                    var recipient3 = button.data('id_vendedor');
                    var recipient4 = button.data('num_pago');
                   
                    var modal = $(this);
                    modal.find('.modal-body #id').val(recipient0);
                    modal.find('.modal-body #id_cliente').val(recipient1);
                    modal.find('.modal-body #fecha').val(recipient2);
                    modal.find('.modal-body #id_vendedor').val(recipient3);
                    modal.find('.modal-body #num_pago').val(recipient4);
                  
                    
                 });
                $('#editUsu').on('show.bs.modal', function  (event)  {
                    
                    var button = $(event.relatedTarget);
                    var recipient0 = button.data('id');
                    var recipient1 = button.data('id_cliente');
                    var recipient2 = button.data('fecha');
                    var recipient3 = button.data('id_vendedor');
                    var recipient4 = button.data('num_pago');
                    
                    var modal = $(this);
                    modal.find('.modal-body #id').val(recipient0);
                    modal.find('.modal-body #id_cliente').val(recipient1);
                    modal.find('.modal-body #fecha').val(recipient2);
                    modal.find('.modal-body #id_vendedor').val(recipient3);
                    modal.find('.modal-body #num_pago').val(recipient4);
                   
                    
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
