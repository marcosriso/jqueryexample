<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 11/11/14
 * Time: 3:40 PM
 */

    /* Lista de Itens. */
    require_once 'mysql_driver.php';
    $dbObj = new mysql_driver();

    if(isset($_GET['del'])){
        $delete = $dbObj->delete($_GET['del']);
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projeto para Chipweb</title>


    <script src="assets/jquery-2.1.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/chip.js"></script>

    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/chip.css" rel="stylesheet">


</head>

<body>

<!-- Modal de Edição -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar</h4>
            </div>
            <div class="modal-body">
                <form class="" method="post" action="process.php?edit=1" role="form">
                    <div id="lines_edition">
                        <div id="form_edition">
                            <div class="form-group ">
                                <label  for="editfilme">Filme</label>
                                <input type="text" class="form-control" id="editfilme" name="editfilme" placeholder="Filme">
                            </div>
                            <div class="form-group ">
                                <label  for="editsite">Site</label>
                                <input class="form-control" type="text" id="editsite" name="editsite"  placeholder="Site">
                            </div>
                            <div class="form-group ">
                                <label  for="editator">Ator</label>
                                <input type="text" class="form-control" id="editator" name="editator" placeholder="Ator">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Gravar</button>
                    <input type="hidden" id="id_filme" name="id_filme" value="" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Intelitica</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="http://intelitica.com">Home Page</a></li>
                <li><a href="http://intelitica.com">Intelitica</a></li>
                <li><a href="http://getbootstrap.com/">Conheça o Bootstrap</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="padding-top"></div>
    <div class="starter-template">
        <h1>Exemplo</h1>
        <p class="lead">Exemplo de adição de campos com jQuery.</p>

        <?php
            if(isset($_GET['ok']) && $_GET['ok'] == 1){
        ?>
                <div class="alert alert-success alert-dismissible" id="success-alert" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                    <strong>Sucesso!</strong> Foram adicionados com sucesso.
                </div>
        <?php } ?>

        <?php
            if( isset($delete) && $delete ){
        ?>
                <div class="alert alert-danger alert-dismissible" id="success-alert" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                    <strong>Sucesso!</strong> Foi deletado com sucesso.
                </div>
        <?php } ?>


        <form class="" method="post" action="process.php" role="form">
            <div id="lines">
                <div id="line1">
                    <div class="form-group col-lg-2 col-md-2">
                        <label class="sr-only" for="filme1">Filme</label>
                        <input type="text" class="form-control" id="filme1" name="filme1" placeholder="Filme">
                    </div>
                    <div class="form-group col-lg-2 col-md-2">
                            <label class="sr-only" for="site1">Site</label>
                            <input class="form-control" type="text" id="site1" name="site1"  placeholder="Site">
                    </div>
                    <div class="form-group col-lg-2 col-md-2">
                        <label class="sr-only" for="ator1">Ator</label>
                        <input type="text" class="form-control" id="ator1" name="ator1" placeholder="Ator">
                    </div>
                </div>

                <button type="button" onclick="adicionar_campo()" id="adicionar" class="btn btn-info">Adicionar</button>
            </div>
            <br/>
            <button type="submit" class="btn btn-danger">Gravar</button>
            <input type="hidden" id="counter" name="counter" value="1" />
        </form>

    </div>
    <hr/>
    <div class="">
        <h1>Lista</h1>
        <p class="lead">Filmes adicionados.</p>

        <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Filme</th>
            <th>Site</th>
            <th>Ator</th>
            <th></th>
        </tr>

        <?php
            foreach ($dbObj->get_all( ) as $row) {
                echo '<tr>';
                echo '<td id="idf_'.$row['id_filme'].'">' . $row['id_filme'] . '</td>';
                echo '<td id="fil_'.$row['id_filme'].'">' . $row['filme'] . '</td>';
                echo '<td id="sit_'.$row['id_filme'].'">' . $row['site']  . '</td>';
                echo '<td id="ato_'.$row['id_filme'].'">' . $row['ator']  . '</td>';
                echo '<td>
                            <button class="btn btn-mini btn-info" onclick="update_record('.$row['id_filme'].')">Editar</button>
                            <button class="btn btn-mini btn-danger" onclick="delete_record('.$row['id_filme'].')">X</button>
                     </td>';
                echo '</tr>';
            }
        ?>

        </table>

    </div>

</div>


</body>
</html>
