<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Biblioteca Info-UNLP</title>
    <!-- Bootstrap -->
    <link href='<?php echo URL_PATH;?>/css/bootstrap/bootstrap.min.css' type='text/css' rel="stylesheet">
    <link href='<?php echo URL_PATH;?>/css/my_styles.css' type='text/css' rel="stylesheet">
    <!-- Font Awesome-->
    <link href='<?php echo URL_PATH;?>/css/fontawesome/css/fontawesome-all.css' rel="stylesheet">
</head>

<body>
    <!-- NavBar -->
    <?php require_once('genericNavBar.php');?>

    <div class="container">
        
        <!-- Busqueda-->
        <div class="row mb-3">
            <div class="col-4 d-none d-md-block" style="position: relative;">
                    <img src="<?php echo URL_PATH;?>/img/logo-info.png" style="position: absolute;top: 0;bottom: 0;left: 0;right: 0;width: 85%;height: auto;margin: auto;"/>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header text-white bg-dark">
                        Refinar busqueda
                    </div>
                    <div class="card-body">
                        <form action="<?php echo URL_PATH;?>/" method="post">
                            <div class="form-group row">
                                <label class="col-3">Titulo</label>
                                <input type="text" class="form-control col-9" name="title" placeholder="Ingrese el titulo aqui...">
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Autor</label>
                                <input type="text" class="form-control col-9" name="author" placeholder="Ingrese el nombre del autor aqui...">
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Lector</label>
                                <input type="text" class="form-control col-9" name="user" placeholder="Ingrese el lector aqui...">
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Fecha desde</label>
                                <input type="date" class="form-control col-9" name="date_from">
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Fecha hasta</label>
                                <input type="date" class="form-control col-9" name="date_until">
                            </div>
                            <div align="right">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Catalogo-->
        <div class="row">
            <div class="col">
                <h2 class="text-center">Operaciones</h2>
                <?php
                    //filtros

                    // if(!is_null($params['author_filter']) || !is_null($params['title_filter'])){
                    //     echo "<p style='text-align: center'><small>Busqueda filtrada por:</small><br>";
                    //     if(!is_null($params['title_filter']))
                    //         echo "<small>Titulo: " . $params['title_filter'] . "</small><br>";
                    //     if(!is_null($params['author_filter']))
                    //         echo "<small>Autor: " . $params['author_filter'] . "</small><br>";                        
                    //     echo "</p>";
                    // }
                ?>
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Lector</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($params['list'] as $row){
                                echo "<tr>";
                                echo "<td>" . $row['titulo'] . "</td>";
                                echo "<td>" . $row['a_nombre'] . " " . $row['a_apellido'] ."</td>";
                                echo "<td>" . $row['u_nombre'] . " " . $row['u_apellido'] ."</td>";
                                echo "<td>" . $row['ultimo_estado'] . "</td>";
                                echo "<td>" . $row['fecha_ultima_modificacion'] . "</td>";
                                echo "<td>";
                                if(strcmp($row['ultimo_estado'], "RESERVADO") == 0){
                                    echo "<form method='get' action='" . URL_PATH . "" . "' style='display: inline'>";
                                    echo "<input type='hidden' name='' value=" . "" . ">";
                                    echo "<button type='submit' class='btn btn-success'>";
                                    echo "Prestar";
                                    echo "</button></form>";
                                }else if(strcmp($row['ultimo_estado'], "PRESTADO") == 0){
                                    echo "<form method='get' action='" . URL_PATH . "" . "' style='display: inline'>";
                                    echo "<input type='hidden' name='' value=" . "" . ">";
                                    echo "<button type='submit' class='btn btn-info'>";
                                    echo "Devolver";
                                    echo "</button></form>";
                                }
                                echo "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                </div>               
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src='<?php echo URL_PATH;?>/js/jquery.min.js' type='text/javascript'></script>
    <script src='<?php echo URL_PATH;?>/js/bootstrap.min.js' type='text/javascript'></script>
</body>