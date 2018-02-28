<?php
class Taverne {
    private $id;
    private $nom;
    private $chambres;
    private $blonde;
    private $brune;
    private $rousse;
    private $ville;


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


/*------------------ CHAMBRES -----------------*/
/*
@param mixed $chambres
@return self
*/
    public function setChambres($chambres) {
        $this->chambres = $chambres;

        return $this;
    }

/**
@return mixed
*/
    public function getChambres() {
        return $this->chambres;
    }

/*------------------ BLONDE -----------------*/
/*
@param mixed $blonde
@return self
*/
    public function setBlonde($blonde) {
        $this->blonde = $blonde;

        return $this;
    }

    public function getBlonde() {
       if($this->blonde) {
            return "Evidemment !" ;

        } else return "Et non, désolé." ;
    }


/*------------------ BRUNE -----------------*/
/*
@param mixed $brune
@return self
*/
    public function setBrune($brune) {
        $this->brune = $brune;

        return $this;
    }

    public function getBrune() {
        if($this->brune) {
            return "Oui !" ;

        } else return "Non malheuresement." ;
    }


/*------------------ ROUSSE -----------------*/
/*
@param mixed $rousse
@return self
*/
    public function setRousse($rousse) {
        $this->rousse = $rousse;

        return $this;
    }

    public function getRousse() {
        if($this->rousse) {
            return "Bien sur !" ;

        } else return "Non, on n'aime pas les roux." ;
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
            $methodName = ucfirst($methodName); //methodName = 'Taverne'  => ça met la majuscule.
            $methodName = 'set' . ucfirst($methodName); //methodName = 'setId'  => ça rajoute le set !!!

            if( method_exists( $this, $methodName ) ) { //On verifie si la méthode existe.
            $this->$methodName( $value ); // $this->setId($value) SOIT $this->setId($datas['t_id']) ;
            }
        }
    }


}