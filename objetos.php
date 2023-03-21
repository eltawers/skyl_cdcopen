<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trabajo Skyl</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/css_div.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Desafío <sup>CCD Open</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Seccion
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    
                   

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
					<!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Registros Buscados</h6>
                                    
                                </div>
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Comentario</h5>
										<input type="text" id="id_data" style="display:none">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
										<form>
										  
										  <div class="form-group">
											<label for="message-text" class="col-form-label">Message:</label>
											<textarea class="form-control" id="comentario"></textarea>
										  </div>
										</form>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
										<button type="button" class="btn btn-primary" onclick="guardar_cambio()">Guardar</button>
									  </div>
									</div>
								  </div>
								</div>
                                <!-- Card Body -->
								
                                <div class="card-body">
											<div class="input-group">
												<div class="input-group-append">
													<table class="table table-dark" >
												  <thead>
													<tr>
													  <th scope="col">#</th>
													  <th scope="col">title</th>
													  <th scope="col">authors</th>
													  <th scope="col">publisher</th>
													  <th scope="col">publishedDate</th>
													  <th scope="col">Comentar</th>
													  <th scope="col">Eliminar</th>
													</tr>
												  </thead>
												  <tbody>
													
													<?php 
													include("data/conexion.php");
													$conn = conectar();
													
													$datos = mysqli_query($conn,"SELECT * FROM registro_libros ORDER BY Id");
													$num_results = mysqli_num_rows($datos);
													for($i=0; $i<$num_results; $i++) {
														$row = mysqli_fetch_assoc($datos);
														
														echo '<tr id="row_'.$row['id'].'">';
														  echo '<th scope="row">'.$i.'</th>';
														  echo ' <td>'.$row['title'].'</td>';
														  echo '<td>'.$row['authors'].'</td>';
														  echo '<td>'.$row['publisher'].'</td>';
														  echo '<td>'.$row['publishedDate'].'</td>';
														  echo '<td><img onclick=abrircomentario('.$row['id'].'); style="cursor:pointer" width="15px" src="data:image/png;base64,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"></td>';
														  echo '<td><img style="cursor:pointer" onclick=del_cambio('.$row['id'].') width="15px" src="https://w7.pngwing.com/pngs/698/202/png-transparent-computer-icons-icon-design-remove-save-icon-format-miscellaneous-trademark-logo.png"></td>';

														echo '</tr>';
														
													}
													?>
												  </tbody>
												</table>
												</div>
												
											</div>	
                                </div>
									
									
										
									
                                
								
                            </div>
                        </div>
						 
                    </div>
					
					<div class="div_resultado" id="resultado">
						
					</div>

				</div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright @ Roberto Torres Salazar</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/general.js"></script>

</body>

</html>