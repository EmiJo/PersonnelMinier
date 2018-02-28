<?php
class TaverneController {
    private $model;

    public function __construct() {
        require_once( 'models/TaverneModel.php' );
        $this->model = new TaverneModel;
    }

    public function showAction() {
        $tavernes = $this->model->selectAll();
        include( 'views/tavernes.php' );
    }

    public function showOneAction( $id ) {
        $taverne = $this->model->selectOne( $id );

        require_once( 'vendor/Taverne.class.php' );
        $taverneObj = new Taverne( $taverne );

        require_once( 'vendor/Ville.class.php' );
        $ville = new Ville(
            array(
                'v_id'  => $taverneObj->getVille(),
                'v_nom' => $taverne['t_villetaverne']
            )
        );
        $taverneObj->setVille( $ville );

        include( 'views/taverne.php' );
    }
}


