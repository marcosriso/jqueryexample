<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 11/12/14
 * Time: 11:19 AM
 */
    require_once 'mysql_driver.php';

    if(isset($_POST['id_filme'])) {

        $insert_data = array(
            'id_filme' => $_POST['id_filme'],
            'filme' => $_POST['editfilme'],
            'site'  => $_POST['editsite'],
            'ator'  => $_POST['editator'],
        );

        $dbObj = new mysql_driver();

        /* Usando queries preparadas do PDO MySQL para Maior Segurança. */

        $sql = "UPDATE `chiptest`.`filme` SET filme = :filme, site = :site, ator = :ator WHERE id_filme = :id_filme;";

        $prepObj = $dbObj->db->prepare( $sql );
        $prepObj->execute( $insert_data );

        header('Location: index.php?ok=1');
        exit();
    }


    $qtd = $_POST['counter'];

    $i = 1;
    $filme = '';
    $site  = '';
    $ator  = '';
    $insert_data = array();

    do {

        $insert_data = array(
            'filme' => $_POST['filme'.$i],
            'site'  => $_POST['site'.$i],
            'ator'  => $_POST['ator'.$i],
        );

        $dbObj = new mysql_driver();

        /* Usando queries preparadas do PDO MySQL para Maior Segurança. */

        $sql = "INSERT INTO `chiptest`.`filme` (`filme`, `site`, `ator`) VALUES (:filme, :site, :ator);";

        $prepObj = $dbObj->db->prepare( $sql );
        $prepObj->execute( $insert_data );
        $i++;

    }
    while ( $i <= $qtd );

    header('Location: index.php?ok=1');

