<?php

namespace DAO;

class DAO
{
    #region --- Attributs ----------------------------
    /** @var \PDO Connexion à la base de donnée. */
    protected static ?\PDO $db = null;
    /** @var string Table de la base de donnée. */
    #endregion

    #region --- Constructeur -------------------------
    public function __construct()
    {
        if ( is_null( self::$db ) )
        {
            $this->getPDOConnection();
        }
    }
    #endregion

    #region --- Mehtodes ------------------------------
    private function getPDOConnection()
    {
        try 
        {
            $conx = 'mysql:host=' . Config::BDD_SERVEUR . '; dbname=' . Config::BDD_BASE . ';';
            self::$db = new \PDO( $conx, Config::BDD_USER, Config::BDD_PASS );
            self::$db->query("SET lc_time_names = 'fr_FR';");
        }
        catch ( \PDOException $e ) 
        {
            echo "Erreur à l'ouverture de la base de données <b>" . Config::BDD_BASE . "</b>:<br>"
                , $e->getMessage();
        }
    }
    #endregion
}