<?php

class Tunnel {
    private $id;
    private $progres;
    private $villedepart;
    private $villearrivee;

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


/*------------------ PROGRES -----------------*/
/*
@param mixed $progres
@return self
*/
    public function setProgres($progres) {
        $this->progres = $progres;

        return $this;
    }

    public function getProgres() {
        return $this->progres;
    }


/*------------------ VILLE DE DEPART -----------------*/
/*
@param mixed $villedepart
@return self
*/
    public function setVilledepart($villedepart) {
        $this->villedepart = $villedepart;

        return $this;
    }

/**
@return mixed
*/
    public function getVilledepart() {
        return $this->villedepart;
    }


/*------------------ VILLE D ARRIVEE -----------------*/
/*
@param mixed $villearrivee
@return self
*/
    public function setVillearrivee($villearrivee) {
        $this->villearrivee = $villearrivee;

        return $this;
    }

/**
@return mixed
*/
    public function getVillearrivee() {
        return $this->villearrivee;
    }



/*------------------ METHODES FONCTIONS ----------------*/

    public function __construct( $datas=null) {
        if( !is_null($datas) ) {
            $this->hydrate( $datas );
        }
    }


    public function hydrate( $datas ) { //On hydrate pour récupérer les infos.
        foreach ($datas as $key => $value) {
            // $key = 't_id'
            $methodName = str_replace(`t_`, ``, $key ); //methodName = 'id'=> ça enlève le t_ .
            $methodName = str_replace(`_fk`, ``, $methodName ); //=> ça enlève les fk ou il y en a .
            $methodName = ucfirst($methodName); //methodName = 'Tunnel'  => ça met la majuscule.
            $methodName = 'set' . ucfirst($methodName); //methodName = 'setId'  => ça rajoute le set !!!

            if( method_exists( $this, $methodName ) ) { //On verifie si la méthode existe.
            $this->$methodName( $value ); // $this->setId($value) SOIT $this->setId($datas['t_id']) ;
            }
        }
    }


}