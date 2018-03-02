<?php
class Ville {
    private $id;
    private $nom;
    private $superficie;


/*------------------ ID ------------------*/
    /**
    @param mixed $id
    @return self
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
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


/*------------------ SUPERFICIE -----------------*/
/*
@param mixed $superficie
@return self
*/
    public function setSuperficie($superficie) {
        $this->superficie = $superficie;

        return $this;
    }

/**
@return mixed
*/
    public function getSuperficie() {
        return $this->superficie;
    }



/*------------------ METHODES FONCTIONS ----------------*/

    public function __construct( $datas=null) {
        if( !is_null($datas) ) {
            $this->hydrate( $datas );
        }
    }


    public function hydrate( $datas ) { //On hydrate pour récupérer les infos.
        foreach ($datas as $key => $value) {
            // $key = 'v_id'


           /* $methodName = ucfirst( $key );*/ //methodName = 'id'=> ça enlève le v_ .
            /*$methodName = substr($methodName, 2);*/ //Pour supprimer les 2 premiers caractères : v_ .
            $methodName = str_replace('v_', '', $key );
            $methodName = str_replace('_fk', '', $methodName ); //=> ça enlève les fk ou il y en a.
            $methodName = ucfirst($methodName); //methodName = 'Ville'  => ça met la majuscule.
            $methodName = 'set' . ucfirst($methodName); //methodName = 'setId'  => ça rajoute le set !!!
/*var_dump($methodName);*/
            if( method_exists( $this, $methodName ) ) { //On verifie si la méthode existe.
            $this->$methodName( $value ); // $this->setId($value) SOIT $this->setId($datas['v_id']) ;
            }

            //var_dump($methodName);
        }
    }


}



