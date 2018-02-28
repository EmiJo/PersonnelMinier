<?php
class Nain {
    private $id;
    private $nom;
    private $barbe;
    private $groupe;
    private $ville;

/*------------------ ID ------------------*/
/*
@param mixed $id
@return self
*/
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

/*
@return mixed
*/
    public function getId() {
        return $this->id;
    }


/*------------------ NOM -----------------*/
/*
@param mixed $nom
@return self
*/
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    public function getNom() {
        return $this->nom;
    }


/*------------------ BARBE -----------------*/
/*
@param mixed $barbe
@return self
*/
    public function setBarbe($barbe) {
        $this->barbe = $barbe;

        return $this;
    }

/**
@return mixed
*/
    public function getBarbe() {
        return $this->barbe;
    }


/*------------------ GROUPE -----------------*/
/*
@param mixed $groupe
@return self
*/
    public function setGroupe($groupe) {
        $this->groupe = $groupe;

        return $this;
    }

/**
@return mixed
*/
    public function getGroupe() {
        return $this->groupe;
    }


/*------------------ VILLE -----------------*/
/*
@param mixed $ville
@return self
*/
    public function setVille($ville) {
        $this->ville = $ville;

        return $this;
    }

/**
@return mixed
*/
    public function getVille() {
            return $this->ville;
    }


/*------------------ METHODE ET FONCTION -----------------*/

    public function __construct($datas=null) {
        if( !is_null( $datas ) ) {
            $this->hydrate( $datas );
        }
    }

    public function hydrate($datas) {
        foreach( $datas as $key => $value ) {
            // $key = 'n_id'
            $methodName = str_replace( 'n_', '', $key ); // $methodName = 'id'
            $methodName = str_replace( '_fk', '', $methodName ); // $methodName = 'id'
            $methodName = ucfirst( $methodName ); // $methodName = 'Id'
            $methodName = 'set' . ucfirst( $methodName ); // $methodName = 'setId'

            if( method_exists( $this, $methodName ) ) {
                $this->$methodName( $value ); // $this->setId( $datas['n_id'] );
            }
        }
    }


   /* public function hydrate($datas) { //On hydrate pour récupérer les infos.
        foreach( $datas as $key => $value ) {
            // $key = 'n_id' et si $key = 'n_groupe_fk', on doit ausssi enlever les fk.
            $methodName = str_replace( 'n_', '', $key ); //methodName = 'id' ou 'groupe_fk' => ça enlève le n_ .
            $methodName = str_replace( '_fk', '', $methodName ); //methodName = 'groupe' => ça enlève les fk ou il y en a .
            $methodName = ucfirst( $methodName ); //methodName = 'Id' ou 'Groupe' => ça met la majuscule.
            $methodName = 'set' . ucfirst( $methodName ); //methodName = 'setId' ou 'sertGroupe' => ça rajoute le set !!!

            if( method_exists( $this, $methodName ) ) { //On verifie si la méthode existe.
             $this->$methodName( $value ); // $this->setId($value) SOIT $this->setId($datas['n_id']) ou $this->setGroupe($value) SOIT $this->setGroupe($datas['n_groupe_fk']) ;
            }
        }
    }*/


}