<?php
class SPDO {
    private $db;
    private static $instance;

    public function getDb() {
        return $this->db;
    }

    public static function getInstance() {
        if( is_null( self::$instance ) ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    protected function __construct() {
        try {
            $this->db = new PDO( 'mysql:host=localhost;dbname=exotunnel;charset=utf8', 'root', '' );
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }


}

