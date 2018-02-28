<?php
class VilleModel {
    private $db ;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=exotunnel;charset=utf8', 'root', '');
        }   catch( PDOException $e ) {
                die( $e->getMessage() );
            }
    }

/*************************************/

    public function selectAll() {
        try {
            if( ( $statement = $this->db->query( 'SELECT `v_id`, `v_nom` FROM `ville` ORDER BY `v_nom` ASC' ) )!==false ) {
                if( ( $datas = $statement->fetchAll( PDO::FETCH_ASSOC ) )!==false ) {
                    $statement->closeCursor();
                    return $datas;
                }
                $statement->closeCursor();
            }

            return false;
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }

/*************************************/

    public function selectOne( $id ) {
        try {
            if( ( $statement = $this->db->prepare( 'SELECT `ville`.* FROM `ville` WHERE `v_id`=:id' ) )!==false ) {
                if( $statement->bindValue( 'id', $id ) ) {
                    if( $statement->execute() ) {
                        if( ( $datas = $statement->fetch( PDO::FETCH_ASSOC ) )!==false ) {
                            $statement->closeCursor();
                            return $datas;
                        }
                    }
                }
                $statement->closeCursor();
            }

            return false;
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }


}