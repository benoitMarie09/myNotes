<?php

namespace Note;

/** Classe modélisant une Note */
class Note extends \HtmlElement
{

    #region --- Attributs -------------------------------
    /** @var int primary key de la note. */ 
    private int $id;
    /** @var string Titre de la note. */
    private string $titre;
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
    public function rendre( $nivIndent )
    {
        $html = self::indente( $nivIndent )."<td class=\"text-center\">$this->titre</td>";
        return $html;
    }
    #endregion



}
