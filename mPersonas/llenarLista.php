<?php 
// Conexion a la base de datos
include'../conexion/conexion.php';

// Codificacion de lenguaje
mysql_query("SET NAMES utf8");

// Consulta a la base de datos
$consulta=mysql_query("SELECT
							id_persona,
							activo,
							CONCAT(ap_paterno,' ',ap_materno,' ',nombre) AS Persona,
							sexo,
							direccion,
							telefono,
							fecha_nacimiento,
							correo,
							tipo_persona,
							nombre,
							ap_paterno,
							ap_materno
						FROM
							personas",$conexion) or die (mysql_error());
// $row=mysql_fetch_row($consulta)
 ?>
				            <div class="table-responsive">
				                <table id="example1" class="table table-responsive table-condensed table-bordered table-striped">

				                    <thead align="center">
				                      <tr class="info" >
				                        <th>#</th>
				                        <th>Nombre</th>
				                        <th>Correo</th>
				                        <th>Telefono</th>
				                        <th>Genero</th>
				                        <th>Editar</th>
				                        <th>Estatus</th>
				                      </tr>
				                    </thead>

				                    <tbody align="center">
				                    <?php 
				                    $n=1;
				                    while ($row=mysql_fetch_row($consulta)) {
										$idPersona   =$row[0];
										$activo      =$row[1];
										$nomPersona  =$row[2];
										$sexo        =$row[3];
										$direccion   =$row[4];
										$telefono    =$row[5];
										$fecha_nac   =$row[6];
										$correo      =$row[7];
										$tipoPersona =$row[8];
										$nombre      =$row[9];
										$paterno     =$row[11];
										$materno     =$row[11];

										$sexo=($sexo=='M')?'<i class="fas fa-male fa-lg"></i>':'<i class="fas fa-female fa-lg"></i>';
				                      ?>
				                      <tr>
				                        <td>
				                          <p>
				                          	<?php echo "$n"; ?>
				                          </p>
				                        </td>
				                        <td>
				                          <p>
				                          	<?php echo $nomPersona; ?>
				                          </p>
				                        </td>
				                        <td>
				                          <p>
				                          	<?php echo $correo; ?>
				                          </p>
				                        </td>
				                        <td>
				                          <p>
				                          	<?php echo $telefono; ?>
				                          </p>
				                        </td>
				                        <td>
				                          <p>
				                          	<?php echo $sexo; ?>
				                          </p>	
				                        <td>
				                          <button type="button" class="btn btn-login btn-sm" 
				                          onclick="abrirModalEditar(
				                          							'<?php echo $nombre ?>',
				                          							'<?php echo $paterno ?>',
				                          							'<?php echo $materno ?>',
				                          							'<?php echo $direccion ?>',
				                          							'<?php echo $telefono ?>',
				                          							'<?php echo $fecha_nac ?>',
				                          							'<?php echo $correo ?>',
				                          							'<?php echo $tipoPersona ?>'

				                          							);">
				                          	<i class="far fa-edit"></i>
				                          </button>
				                        </td>
				                        <td>
											<input  data-size="small" data-style="android" value="<?php echo "$valor"; ?>" type="checkbox" <?php echo "$checado"; ?>  id="<?php echo "interruptor".$n; ?>"  data-toggle="toggle" data-on="Desactivar" data-off="Activar" data-onstyle="danger" data-offstyle="success" class="interruptor" data-width="100" onchange="status(this.value,<?php echo $n; ?>,<?php echo $idTablaPrincipal; ?>,'<?php echo $nombre; ?>');">
				                        </td>
				                      </tr>
				                      <?php
				                      $n++;
				                    }
				                     ?>

				                    </tbody>

				                    <tfoot align="center">
				                      <tr class="info">
				                        <th>#</th>
				                        <th>Nombre</th>
				                        <th>Correo</th>
				                        <th>Telefono</th>
				                        <th>Genero</th>
				                        <th>Editar</th>
				                        <th>Estatus</th>
				                      </tr>
				                    </tfoot>
				                </table>
				            </div>
			
      <script type="text/javascript">
        $(document).ready(function() {
              $('#example1').DataTable( {
                 "language": {
                         // "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                          "url": "../plugins/datatables/langauge/Spanish.json"
                      },
                 "order": [[ 0, "asc" ]],
                 "paging":   true,
                 "ordering": true,
                 "info":     true,
                 "responsive": true,
                 "searching": true,
                 stateSave: false,
                  dom: 'Bfrtip',
                  lengthMenu: [
                      [ 10, 25, 50, -1 ],
                      [ '10 Registros', '25 Registros', '50 Registros', 'Todos' ],
                  ],
                 columnDefs: [ {
                      // targets: 0,
                      // visible: false
                  }],
                  buttons: [
                            {
                                extend: 'pageLength',
                                text: 'Registros',
                                className: 'btn btn-default'
                            },
                          {
                              extend: 'excel',
                              text: 'Exportar a Excel',
                              className: 'btn btn-default',
                              title:'Bajas-Estaditicas',
                              exportOptions: {
                                  columns: ':visible'
                              }
                          },
                         {
                              text: 'Nueva Persona',
                              action: function (  ) {
                                      ver_alta();
                              },
                              counter: 1
                          },
                  ]
              } );
          } );

      </script>
      <script>
            $(".interruptor").bootstrapToggle('destroy');
            $(".interruptor").bootstrapToggle();
      </script>
    
    
