<?php

namespace Note;

/** Classe modélisant une Note */
class Note extends \HtmlElement
{

    #region --- Attributs -------------------------------
    /** @var int primary key de la note. */ 
    private int $id;
    /** @var string Titre de la note. */
    public string $titre;
    /** @var string Descriptif de la note. */
    private string $descriptif;
    /** @var ?int $idNote foreign key de la note de référence. */
    private ?int $idNote;
    #endregion

    #region --- Constructeur ----------------------------
    public function __construct( $id, $titre, $descriptif, $idNote = null )
    {
        $this->id           = $id;
        $this->titre        = $titre;
        $this->descriptif   = $descriptif;
        $this->idNote      = $idNote;
    }
    #endregion

    #region --- Methodes --------------------------------
    /**
     * Récupère la note de référence
     * @return ?Note note de référence
     */
    private function getRef()
    {
        if( isset( $this->idNote ) )
        {
            $dao = new \DAO\DAONote();
            return $dao->get( $this->idNote );
        }
        return null;

    }

    public function rendre( $nivIndent )
    {
        $html = self::indente( $nivIndent )."<td id=\"note_$this->id\" class=\"text-center\"  data-toggle=\"collapse\" data-target=\"#$this->id\">"
                ."$this->titre <br>" 
                .(isset( $this->idNote ) ? '<span class="blockquote-footer">'."Ref $this->idNote : "."<a href=\"#note_$this->idNote \">".$this->getRef()->titre.'</a>' .'</span>': '')
                ."</td>";
        $html .= self::indente( $nivIndent )."<div id=\"$this->id\" class=\"collapse\">"
                .   self::indente( $nivIndent +1 ).$this->descriptif
                .self::indente( $nivIndent )."</div>";
        return $html;
    }
    #endregion



}
