<?php

namespace Note;

/** Classe modélisant une Note */
class Note extends \HtmlElement
{

    #region --- Attributs -------------------------------
    /** @var int primary key de la note. */ 
    private ?int $id;
    /** @var string Titre de la note. */
    private string $titre;
    /** @var string Descriptif de la note. */
    private string $descriptif;
    /** @var ?int $idNote foreign key de la note de référence. */
    private ?int $idRef;
    #endregion

    #region --- Constructeur ----------------------------
    public function __construct( $titre, $descriptif, $id=null,  $idNote = null )
    {
        $this->id           = $id;
        $this->titre        = $titre;
        $this->descriptif   = $descriptif;
        $this->idRef        = $idNote;
    }
    #endregion

    #region --- Methodes --------------------------------

    public function __get( $name )
    {
        switch( $name )
        {
            case 'id' :
                return $this->id;
            case 'titre' :
                return $this->titre;
            case 'descriptif' :
                return $this->descriptif;
            case 'idRef' :
                return $this->idRef;
            default :
                throw new \Exception( "L'attribut $name n'existe pas." );
        }
    }

    public function hasRef() : bool 
    {
        return ! is_null( $this->idRef );
    }

    /**
     * Récupère la note de référence
     * @return ?Note note de référence
     */
    private function getRef()
    {
        if( $this->hasRef() )
        {
            $dao = new \DAO\DAONote();
            return $dao->get( $this->idRef );
        }
        return null;
    }

    public function rendre( $nivIndent )
    {
        $html = self::indente( $nivIndent )."<td id=\"note_$this->id\">"
                .self::indente( $nivIndent + 1 ).'<div class="d-flex justify-content-between">'
                .self::indente( $nivIndent + 2 ).'<div>'
                ."$this->titre" 
                // Ajout de la déférence si il y en a une
                .(  $this->hasRef() ? 
                self::indente( $nivIndent + 2 ).' <br><span class="blockquote-footer">'
                .   self::indente( $nivIndent + 3 )."Ref $this->idRef : "
                .   self::indente( $nivIndent + 3 )."<span>".$this->getRef()->titre.'</span>' 
                .self::indente( $nivIndent + 2 ).'</span>': '')
                .self::indente( $nivIndent + 2 )."<div id=\"collapse-$this->id\" class=\"descriptif collapse\">"

                .   self::indente( $nivIndent + 3 ).$this->descriptif
                .self::indente( $nivIndent + 2 )."</div>"
                ."</td>";
        return $html;
    }
    #endregion



}
