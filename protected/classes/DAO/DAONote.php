<?php

namespace DAO;

/**
 * Modélisation d'une entité de la base de donnée
 */
class DAONote extends DAO
{
    #region --- Methodes -----------------------------
    /**
     * Création d'une note dans la base de donnée.
     * @param string $titre Titre de la note.
     * @param ?string $desc Descriptif de la note.
     * @param ?int $id_note Id de la note de référence.
    */
    public static function create( \Note\Note $note )
    {
        if ( ! is_null( $note->id ) )
        {
            throw new \Exception( 'Impossible de créer la note car elle possède un id non null'  );
        }
        try
        {
            $sql = 'INSERT INTO note ( titre, descriptif, id_note )
                            VALUES (:titre, :descriptif, :id_note)';
            $stmt = self::$db->prepare($sql);
            $stmt->bindValue( 'titre', $note->titre, \PDO::PARAM_STR );
            $stmt->bindValue( 'descriptif', $note->descriptif, \PDO::PARAM_STR );
            $stmt->bindValue( 'id_note', $note->idRef, \PDO::PARAM_INT );
            $stmt->execute();
        }
        catch (\PDOException $e) 
        {
            throw new \Exception('Erreur de la requête SQL : <b>' . $sql . '</b>' .$e->getMessage());
        }
    }
    /**
     * Permet de recupérer une note avec son id
     * @param int $id L'id de la note à récupérer.
     * @return \Note\Note La note. 
     */
    public static function get( int $id )
    {
        try
        {
            $sql = "SELECT id, titre, descriptif, id_note
                        FROM note
                        WHERE id = $id";
            $stmt = self::$db->query($sql);
            $result = $stmt->fetch( \PDO::FETCH_OBJ );
            $note = new \Note\Note( $result->titre, $result->descriptif, $result->id, $result->id_note );
        }
        catch (\PDOException $e) 
        {
            throw new \Exception('Erreur de la requête SQL : <b>' . $sql . '</b>' .$e->getMessage());
        }
        return $note;
    }

    /**
     * Permet de récupérer toutes les notes de la base de données.
     * @return \Note\Note[] Une array de note.
     */
    public static function getAll()
    {
        try
        {
            $sql = "SELECT id, titre, descriptif, id_note
                        FROM note";
            $stmt = self::$db->query( $sql) ;
            $notes = [];
            while( $result = $stmt->fetch( \PDO::FETCH_OBJ ) )
            {
                $note = new \Note\Note( $result->titre, $result->descriptif, $result->id, $result->id_note );
                array_push( $notes, $note );
            }
        }
        catch (\PDOException $e) 
        {
            throw new \Exception('Erreur de la requête SQL : <b>' . $sql . '</b>' .$e->getMessage());
        }
        return $notes;
    }

    /**
     * Compte le nombre d'élément de la table note.
     * @return int nombre délément de la table.
     */
    public function count() : int
    {
        $sql = "SELECT COUNT(id) as nb
                FROM note";
        $stmt = self::$db->query( $sql );
        $result = $stmt->fetch( \PDO::FETCH_OBJ );
        return $result->nb;
    }

    /**
     * TODO : update() et delete() qui permettent respectivement de modifier et supprimer une note de la base de donnée
     */
    #endregion
}