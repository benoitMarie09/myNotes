<?php

namespace Form;

/**
 * Classe qui modélise un Select html des note de la base de données
 */
class SelectNote extends Select
{
    # region --- Attributs -------------------------
    /** @var \DAO\DAONote $TableNote Connexion à la table note de la base de données*/
    private static \DAO\DAONote $tableNote;
    #endregion

    # region --- Constructeur -------------------------
    public function __construct( string $name, string $label)
    {
        self::$tableNote = new \DAO\DAONote();
        $options = [];
        foreach( self::$tableNote->getAll() as $note )
        {
            $option = new SelectOption( $note->titre, $note->id );
            array_push( $options, $option );
        };
        parent::__construct( $name, $label, $options );
    }
    #endregion

    # region --- Methodes -------------------------

    #endregion
}