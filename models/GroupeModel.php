<?php
class GroupeModel {
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
            if( ( $statement = $this->db->query( 'SELECT `g_id` FROM `groupe` ORDER BY `g_id` ASC' ) )!==false ) {
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
            if( ( $statement = $this->db->prepare( 'SELECT `groupe`.*, `taverne`.`t_id`, `taverne`.`t_nom` FROM `groupe` LEFT JOIN `taverne` ON `groupe`.`g_taverne_fk`=`taverne`.`t_id` WHERE `g_id`=:id' ) )!==false ) {
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

/*************************************/

    public function modif( $groupe ) {
        try {
            if( ( $statement = $this->db->prepare( 'UPDATE `groupe` SET `groupe`.`g_debuttravail`=:hdeb, `groupe`.`g_fintravail`=:hfin,`groupe`.`g_tunnel_fk`=:tunnel, `groupe`.`g_taverne_fk`=:taverne WHERE `g_id`=:id' ) )!==false ) {
                if( $statement->bindValue( 'id', $groupe->getId() ) && $statement->bindValue( 'hdeb', $groupe->getDebuttravail() ) && $statement->bindValue( 'hfin', $groupe->getFintravail() ) && $statement->bindValue( 'tunnel', $groupe->getTunnel() ) && $statement->bindValue( 'taverne', $groupe->getTaverne() ) ) {
                    $result = $statement->execute();
                    $statement->closeCursor();

                    return $result;
                }
                $statement->closeCursor();
            }

            return false;
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }



}