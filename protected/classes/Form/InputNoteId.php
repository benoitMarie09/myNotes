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
            type : 'number',
        );
        $this->setAttribut( 'readonly' );
        $this->setValue( $this->note->count() + 1 );
    }
    #endregion
}