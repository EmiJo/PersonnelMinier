<?php
class TaverneModel {
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
            if( ( $statement = $this->db->query( 'SELECT `t_id`, `t_nom` FROM `taverne` ORDER BY `t_nom` ASC' ) )!==false ) {
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

    public function selectAllFromCity( $ville_id ) {
        try {
            if( ( $statement = $this->db->prepare( 'SELECT `t_id`, `t_nom` FROM `taverne` WHERE `t_ville_fk`=:id ORDER BY `t_nom` ASC' ) )!==false ) {
                if( $statement->bindValue( 'id', $ville_id ) ) {
                    if( $statement->execute() ) {
                        if( ( $datas = $statement->fetchAll( PDO::FETCH_ASSOC ) )!==false ) {
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

/*************************************/

    public function selectOne( $id ) {
        try {
            if( ( $statement = $this->db->prepare( 'SELECT `taverne`.* , `t_ville`.`v_nom` AS `t_villetaverne` FROM `taverne`

                INNER JOIN `ville` AS `t_ville` ON `taverne`.`t_ville_fk`=`t_ville`.`v_id`

                WHERE `t_id`=:id' ) )!==false ) {
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