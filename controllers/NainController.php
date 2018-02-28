<?php
class NainController {
    private $model;

    public function __construct() {
        require_once( 'models/NainModel.php' );
        $this->model = new NainModel;
    }

    public function showAction() {
        $nains = $this->model->selectAll();
        include( 'views/nains.php' );
    }

    public function showOneAction( $id ) {
        $nain = $this->model->selectOne( $id );

        require_once( 'vendor/Nain.class.php' );
        $nainObj = new Nain( $nain );

        require_once( 'vendor/Ville.class.php' );
        $ville = new Ville(
            array(
                'v_id'  => $nainObj->getVille(),
                'v_nom' => $nain['v_natale']
            )
        );
        $nainObj->setVille( $ville );

        require_once( 'vendor/Groupe.class.php' );
        $groupe = new Groupe( $nain );

        require_once( 'vendor/Taverne.class.php' );
        $taverne = new Taverne( $nain );
        $groupe->setTaverne( $taverne );

        require_once( 'vendor/Tunnel.class.php' );
        $tunnel = new Tunnel(
            array(
                't_id'              => $nain['tunnel_id'],
                't_villedepart'     => new Ville(
                                        array(
                                            'v_id'  => $nain['v_dep_id'],
                                            'v_nom' => $nain['v_dep_nom']
                                        )
                ),
                't_villearrivee'    => new Ville(
                                        array(
                                            'v_id'  => $nain['v_arr_id'],
                                            'v_nom' => $nain['v_arr_nom']
                                        )
                ),
            )
        );
        $groupe->setTunnel( $tunnel );

        $nainObj->setGroupe( $groupe );

        require_once( 'models/GroupeModel.php' );
        $groupeModel = new GroupeModel;
        $groupes = $groupeModel->selectAll();

        include( 'views/nain.php' );
    }

    public function modifAction( $id ) {
        $nain = $this->model->selectOne( $id );
        require_once( 'vendor/Nain.class.php' );
        $nainObj = new Nain( $nain );

        if( $_POST['groupe']==0 ) {
            $nainObj->setGroupe( null );
        } else {
            $nainObj->setGroupe( $_POST['groupe'] );
        }

        if( $this->model->modif( $nainObj ) ) {
            $_SESSION['message'] = 'Groupe du nain modifié';
        } else {
            $_SESSION['message'] = 'Modification échouée';
        }

        $this->showOneAction( $id );
    }
}