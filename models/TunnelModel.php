<?php
class TunnelModel {
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
            if( ( $statement = $this->db->query( 'SELECT `tunnel`.* FROM `tunnel` ORDER BY `t_id` ASC' ) )!==false ) {
                if( ($datas = $statement->fetchAll( PDO::FETCH_ASSOC ))!==false ) {
                    $statement->closeCursor();
                    return $datas;
                }
                $statement->closeCursor();
            }
            return false ;
        }   catch( PDOException $e ) {
                die( $e->getMessage() );
            }
    }

/*************************************/

    public function selectAllFromCity( $ville_id ) {
        try {
            if( ( $statement = $this->db->prepare( 'SELECT `tunnel`.*, `depart`.`v_nom` AS `v_depart`, `arrivee`.`v_nom` AS `v_arrivee`, `depart`.`v_id` AS `v_depart_id`, `arrivee`.`v_id` AS `v_arrivee_id` FROM `tunnel` INNER JOIN `ville` AS `depart` ON `tunnel`.`t_villedepart_fk`=`depart`.`v_id` INNER JOIN `ville` AS `arrivee` ON `tunnel`.`t_villearrivee_fk`=`arrivee`.`v_id` WHERE `t_villedepart_fk`=:id OR `t_villearrivee_fk`=:id ORDER BY `t_id` ASC' ) )!==false ) {
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
            if( ( $statement = $this->db->prepare( 'SELECT `tunnel`.*, `depart`.`v_nom` AS `v_depart`, `arrivee`.`v_nom` AS `v_arrivee`, `depart`.`v_id` AS `v_depart_id`, `arrivee`.`v_id` AS `v_arrivee_id` FROM `tunnel` INNER JOIN `ville` AS `depart` ON `tunnel`.`t_villedepart_fk`=`depart`.`v_id` INNER JOIN `ville` AS `arrivee` ON `tunnel`.`t_villearrivee_fk`=`arrivee`.`v_id` WHERE `tunnel`.`t_id`=:id' ) )!==false ) {
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