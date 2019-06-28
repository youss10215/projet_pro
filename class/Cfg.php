<?php

Cfg::init();

class Cfg {

    private static $initDone = false;

    // Appli
    const APP_TITRE = "Meuble";
    // Images
    const IMG_TAB_MIME = ['image/jpeg'];
    const IMG_V_LARGEUR = 300; //px
    const IMG_V_HAUTEUR = 300; //px
    const IMG_P_LARGEUR = 450; //px
    const IMG_P_HAUTEUR = 450; //px
    // DB
    const DB_NAME = 'meuble';
    const DB_LOG = 'root';
    const DB_MDP = '';
    // Session
    const SESSION_TIMEOUT = 1000; // s

    private function __construct() {
        // Classe 100% statique.
    }

    public static function init() {
        if(self::$initDone)
            return false;
        // Autoload
        spl_autoload_register(function($class) {
            @include "class/{$class}.php";
            @include "../framework/{$class}.php";
        });

        // Connexion DB
        DBMySQL::setDSN(self::DB_NAME, self::DB_LOG, self::DB_MDP);
        // Session
        Session::getInstance(self::SESSION_TIMEOUT);
        // Init Done
        return self::$initDone = true;
    }

}
