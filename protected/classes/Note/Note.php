<?php

namespace Note;

/** Classe modélisant une Note */
class Note extends \HtmlElement
{

    #region --- Attributs -------------------------------
    /** @var int primary key de la note. */ 
    public int $id;
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
        $html = self::indente( $nivIndent )."<td id=\"note_$this->id\">"
                .self::indente( $nivIndent + 1 ).'<div class="d-flex justify-content-between">'
                .self::indente( $nivIndent + 2 ).'<div>'
                ."$this->titre" 
                // Ajout de la déférence si il y en a une
                .(isset( $this->idNote ) ? 
                self::indente( $nivIndent + 2 ).' <br><span class="blockquote-footer">'
                .   self::indente( $nivIndent + 3 )."Ref $this->idNote : "
                .   self::indente( $nivIndent + 3 )."<a href=\"#note_$this->idNote \">".$this->getRef()->titre.'</a>' 
                .self::indente( $nivIndent + 2 ).'</span>': '')
                .self::indente( $nivIndent + 2 ).'</div>'
                .self::indente( $nivIndent + 2 )."<button type =\"button\" class=\"btn btn-primary \" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-$this->id\"  aria-expanded=\"false\" aria-controls=\"collapse-$this->id\" >voir</button>"
                .self::indente( $nivIndent + 1 ).'</div>'
                .self::indente( $nivIndent + 2 )."<div id=\"collapse-$this->id\" class=\"collapse\">"
                .   self::indente( $nivIndent + 3 ).$this->descriptif
                .self::indente( $nivIndent + 2 )."</div>"
                ."</td>";
        return $html;
    }
    #endregion



}
