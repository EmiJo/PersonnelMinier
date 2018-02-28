<?php
class VilleController {
    private $model;

    public function __construct() {
        require_once( 'models/VilleModel.php' );
        $this->model = new VilleModel;
    }

    public function showAction() {
        $villes = $this->model->selectAll();
        include( 'views/villes.php' );
    }

     public function showOneAction( $id ) {
        $ville = $this->model->selectOne( $id );

        require_once( 'vendor/Ville.class.php' );
        $villeObj = new Ville( $ville );

        require_once( 'models/NainModel.php' );
        $nainModel = new NainModel;
        $nains = $nainModel->selectAllFromCity( $id );

        require_once( 'models/TaverneModel.php' );
        $taverneModel = new TaverneModel;
        $tavernes = $taverneModel->selectAllFromCity( $id );

        require_once( 'models/TunnelModel.php' );
        $tunnelModel = new TunnelModel;
        $tunnels = $tunnelModel->selectAllFromCity( $id );

        include( 'views/ville.php' );
    }
}

