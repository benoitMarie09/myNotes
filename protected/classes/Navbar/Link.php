<?php

namespace Navbar;

/**
 * Classe qui modélise un lien dans une barre de navigation HTML.
 */
class Link extends \HtmlElement
{
    #region --- Attributs -----------------------------
    /** @var string Label du lien. */
    private string $label;

    /** @var string Url du lien. */
    private $href;
    #endregion

    #region --- Constructeur -----------------------------
    public function __construct( $label, $href )
    {
        $this->label    = $label; 
        $this->href     = $href;
    }
    #endregion

    #region --- Methodes -----------------------------
    public function rendre( $nivIndent )
    {
        $html = 
        self::indente( $nivIndent ).'<li class="nav-item active">'
        .   self::indente( $nivIndent + 1 ).'<a class="nav-link" href="'.$this->href.'">'.$this->label.'</a>'
        .self::indente( $nivIndent ).'</li>';

        return $html;
    }
    #endregion
}