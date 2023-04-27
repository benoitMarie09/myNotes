<?php

/**
 * Modélisation d'une entité de la base de donnée
 */
class TableNote
{
    #region --- Attributs ----------------------------
    // config de la base de donnée
    const BDD_SERVEUR = '127.0.0.1';
    const BDD_USER = 'ben';
    const BDD_PASS = 'ben';
    const BDD_BASE = 'prise_note';
    /** @var PDO Connexion à la base de donnée. */
    private static PDO $db;
    /** @var string Table de la base de donnée. */
    #endregion

    #region --- Constructeur -------------------------
    public function __construct()
    {
        try 
        {
            $conx = 'mysql:host=' . self::BDD_SERVEUR . '; dbname=' . self::BDD_BASE . ';';
            self::$db = new PDO( $conx, self::BDD_USER, self::BDD_PASS );
            self::$db->query("SET lc_time_names = 'fr_FR';");
        }
        catch ( PDOException $e ) 
        {
            echo "Erreur à l'ouverture de la base de données <b>" . self::BDD_BASE . "</b>:<br>"
                , $e->getMessage();
        }
    }
    #endregion

    #region --- Methodes -----------------------------
    /**
     * Création d'une note dans la base de donnée.
     * @param string $titre Titre de la note.
     * @param string $desc Descriptif de la note.
     * @param int $id_note Id de la note de référence.
    */
    public static function create( string $titre, string $descriptif, int $id_note=null )
    {
        try
        {
            $sql = 'INSERT INTO note ( titre, descriptif, id_note )
                            VALUES (:titre, :descriptif, :id_note)';
            $stmt = self::$db->prepare($sql);
            $stmt->bindValue( 'titre', $titre, PDO::PARAM_STR );
            $stmt->bindValue( 'descriptif', $descriptif, PDO::PARAM_STR );
            $stmt->bindValue( 'id_note', $id_note, PDO::PARAM_INT );
            $stmt->execute();

        }
        catch (PDOException $e) 
        {
            throw new Exception('Erreur de la requête SQL : <b>' . $sql . '</b>' .$e->getMessage());
        }
    }
    /**
     * Permet de recupérer une note avec son id
     * @param int $id L'id de la note à récupérer.
     * @return Note\Note La note. 
     */
    public static function get( int $id )
    {
        try
        {
            $sql = "SELECT id, titre, descriptif, id_note
                        FROM note
                        WHERE id = $id";
            $stmt = self::$db->query($sql);
            $result = $stmt->fetch( PDO::FETCH_OBJ );
            $note = new Note\Note( $result[ 'id' ], $result[ 'titre' ], $result[ 'descriptif' ], $result[ 'id_note' ] );
        }
        catch (PDOException $e) 
        {
            throw new Exception('Erreur de la requête SQL : <b>' . $sql . '</b>' .$e->getMessage());
        }
        return $note;
    }

    /**
     * Permet de récupérer toutes les notes de la base de données.
     * @return Note\Note[] Une array de note.
     */
    public static function getAll()
    {
        try
        {
            $sql = "SELECT id, titre, descriptif, id_note
                        FROM note";
            $stmt = self::$db->query($sql);
            $notes = [];
            while( $result = $stmt->fetch( PDO::FETCH_OBJ ) )
            {
                $note = new Note\Note( $result->id, $result->titre, $result->descriptif, $result->id_note );
                array_push( $notes, $note );
            }
        }
        catch (PDOException $e) 
        {
            throw new Exception('Erreur de la requête SQL : <b>' . $sql . '</b>' .$e->getMessage());
        }
        return $notes;
    }

    /**
     * TODO : update() et delete() qui permettent respectivement de modifier et supprimer une note de la base de donnée
     */
    #endregion
}