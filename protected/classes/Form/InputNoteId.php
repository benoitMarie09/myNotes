<?php

namespace Form;

class InputNoteId extends Input
{
    #region --- Attributs --------------------
    /** @var \DAO\DAONote connexion à la table note de la base de données*/
    private \DAO\DAONote $note;
    #endregion

    #region --- Constructeur ----------------
    public function __construct( )
    {
        $this->note = new \DAO\DAONote();
        parent::__construct( 
            name : 'id', 
            label : 'Note n°',
            value : $this->note->count() + 1,
            type : 'number',
            readonly : true,
        );
    }
    #endregion
}