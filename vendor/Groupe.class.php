<?php
class Groupe {
    private $id;
    private $debuttravail;
    private $fintravail;
    private $taverne;
    private $tunnel;

/*------------------ ID ------------------*/
/*
@param mixed $id
@return self
*/
    public function setId($id) {
        if( ctype_digit( $id ) ) {
            $this->id = $id;
        }
        return $this;
    }

/*
@return mixed
*/
    public function getId() {
        return $this->id;
    }


/*------------------ DEBUT TRAVAIL -----------------*/
/*
@param mixed $debuttravail
@return self
*/
    public function setDebuttravail($debuttravail) {
        $this->debuttravail = $debuttravail;

        return $this;
    }

    public function getDebuttravail() {
        return $this->debuttravail;
    }


/*------------------ FIN TRAVAIL -----------------*/
/*
@param mixed $fintravail
@return self
*/
    public function setFintravail($fintravail) {
        $this->fintravail = $fintravail;

        return $this;
    }

    public function getFintravail() {
        return $this->fintravail;
    }


/*------------------ TAVERNE -----------------*/
/*
@param mixed $taverne
@return self
*/
    public function setTaverne($taverne) {
        $this->taverne = $taverne;

        return $this;
    }

/**
@return mixed
*/
    public function getTaverne() {
        return $this->taverne;
    }


/*------------------ TUNNEL -----------------*/
/*
@param mixed $tunnel
@return self
*/
    public function setTunnel($tunnel) {
        $this->tunnel = $tunnel;

        return $this;
    }

/**
@return mixed
*/
    public function getTunnel() {
        return $this->tunnel;
    }



/*------------------ METHODES FONCTIONS ----------------*/

    public function __construct( $datas=null) {
        if( !is_null($datas) ) {
            $this->hydrate( $datas );
        }
    }


    public function hydrate( $datas ) { //On hydrate pour récupérer les infos.
        foreach ($datas as $key => $value) {
            // $key = 'g_id'
            $methodName = str_replace('g_', '', $key ); //methodName = 'id'=> ça enlève le g_ .
            $methodName = str_replace('_fk','', $methodName ); //=> ça enlève les fk ou il y en a.
            $methodName = ucfirst($methodName); //methodName = 'Groupe'  => ça met la majuscule.
            $methodName = 'set' . ucfirst($methodName); //methodName = 'setId'  => ça rajoute le set !!!

            if( method_exists( $this, $methodName ) ) { //On verifie si la méthode existe.
            $this->$methodName( $value ); // $this->setId($value) SOIT $this->setId($datas['g_id']) ;
            }
        }
    }

}