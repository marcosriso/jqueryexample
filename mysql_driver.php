<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 11/11/14
 * Time: 3:40 PM
 */

class mysql_driver {

    private $banco   = 'maptest';
    private $usuario = 'root';
    private $senha   = 'zimbros';
    public $db;

    function __construct () {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname='.$this->banco . ';charset=utf8', $this->usuario, $this->senha);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function get_all( ) {

        $sql = "Select * from filme order by id_filme desc";
        $query = $this->db->query($sql);

        return $query;
    }

    public function delete ( $id ) {
        $sql = "delete from filme where id_filme =  :id_filme";

        $dbQry = $this->db->prepare($sql);


        if( $dbQry->execute( array('id_filme' => $id) ) )
            return true;

        return false;
    }


} 