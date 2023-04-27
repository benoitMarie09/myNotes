<?php

namespace Form;

/**
 * Classe qui modélise un Select html des note de la base de données
 */
class SelectNote extends Select
{
    # region --- Attributs -------------------------
    /** @var \TableNote $TableNote Connexion à la table note de la base de données*/
    private static \TableNote $tableNote;
    #endregion

    # region --- Constructeur -------------------------
    public function __construct( string $name, mixed $value, string $label )
    {
        self::$tableNote = new \TableNote();
        $options = [];
        foreach( self::$tableNote as $note )
        {
            array_push( $options, $note->titre );
        };
        parent::__construct( $name, $value, $label, $options );
    }
    #endregion

    # region --- Methodes -------------------------

    #endregion
}