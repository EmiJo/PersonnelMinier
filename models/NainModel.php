<?php
class NainModel {
    private $db ;

    /*public function __construct() {
        try {
            $this->db = SPDO::getInstance();
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }*/

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
            if( ( $statement = $this->db->query( 'SELECT `n_id`, `n_nom` FROM `nain` ORDER BY `n_nom` ASC' ) )!==false ) {
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
            if( ( $statement = $this->db->prepare( 'SELECT `n_id`, `n_nom` FROM `nain` WHERE `n_ville_fk`=:id ORDER BY `n_nom` ASC' ) )!==false ) {
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

    public function selectAllFromGroup( $group_id ) {
        try {
            if( ( $statement = $this->db->prepare( 'SELECT `n_id`, `n_nom` FROM `nain` WHERE `n_groupe_fk`=:id ORDER BY `n_nom` ASC' ) )!==false ) {
                if( $statement->bindValue( 'id', $group_id ) ) {
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
            if( ( $statement = $this->db->prepare( 'SELECT `nain`.*, `ville_natale`.`v_nom` AS `v_natale`, `taverne`.`t_id`, `taverne`.`t_nom`, `groupe`.`g_id`, `groupe`.`g_debuttravail`, `groupe`.`g_fintravail`, `tunnel`.`t_id` AS `tunnel_id`, `ville_depart`.`v_id` AS `v_dep_id`, `ville_depart`.`v_nom` AS `v_dep_nom`, `ville_arrivee`.`v_id` AS `v_arr_id`, `ville_arrivee`.`v_nom` AS `v_arr_nom` FROM `nain` INNER JOIN `ville` AS `ville_natale` ON `nain`.`n_ville_fk`=`ville_natale`.`v_id` LEFT JOIN `groupe` ON `nain`.`n_groupe_fk`=`groupe`.`g_id` LEFT JOIN `taverne` ON `groupe`.`g_taverne_fk`=`taverne`.`t_id` LEFT JOIN `tunnel` ON `groupe`.`g_tunnel_fk`=`tunnel`.`t_id` LEFT JOIN `ville` AS `ville_depart` ON `tunnel`.`t_villedepart_fk`=`ville_depart`.`v_id` LEFT JOIN `ville` AS `ville_arrivee` ON `tunnel`.`t_villearrivee_fk`=`ville_arrivee`.`v_id` WHERE `n_id`=:id' ) )!==false ) {
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

    public function modif( $nain ) {
           try {
            if( ( $statement = $this->db->prepare( 'UPDATE `nain` SET `nain`.`n_groupe_fk`=:groupe WHERE `n_id`=:id' ) )!==false ) {
                if( $statement->bindValue(`id`, $nain->getId() ) && $statement->bindValue('groupe', $nain->getGroupe() ) ) {
                    $result->$statement->execute();
                    $statement->closeCursor();
                    return $result;
                    }
                $statement->closeCursor();
            }
            return false;
            }   catch( PDOException $e ) {
                    die( $e->getMessage() );
                }
    }



}