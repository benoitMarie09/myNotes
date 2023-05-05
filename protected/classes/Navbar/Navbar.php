<?php

namespace Navbar;

class Navbar extends \HtmlElement
{
    #region --- Attributs ---------------------------------------
    /** @var string Titre du Header. */
    private string $titre;
    /** @var ?string Lien vers le logo du header. */
    private ?string $logo;
    /** @var Link[] Array de Link. */
    private array $links = array();
    #endregion
    #region --- Constructeur ---------------------------------------
    public function __construct( string $titre, ?string $logo = null )
    {
        $this->titre = $titre;
        $this->logo  = $logo;
    }
    #endregion
    #region --- Methodes ---------------------------------------

    /** 
     * @param Link $link lien de la navbar.
     */
    public function addLink( Link $link )
    {
        array_push( $this->links, $link );
    }

    public function rendre( $nivIndent )
    {
        $html  = 
        self::indente( $nivIndent ).'<nav class="navbar navbar-dark navbar-expand-lg navbar-light bg-primary">'
        .   self::indente( $nivIndent + 1 ).'<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">'
        .       self::indente( $nivIndent + 2 ).'<span class="navbar-toggler-icon"></span>'
        .   self::indente( $nivIndent + 1 ).'</button>'
        .   self::indente( $nivIndent + 1 ).'<a class="navbar-brand" href="/myNotes/index.php?page=accueil">'.$this->titre.'</a>'
        .   self::indente( $nivIndent + 1 ).'<div class="collapse navbar-collapse d-flex justify-content-between" id="navbarTogglerDemo03">'
        .       self::indente( $nivIndent + 2 ).'<ul class="navbar-nav mr-auto mt-2 mt-lg-0">';
        foreach( $this->links as $link )
        {
            $html .= $link->rendre( 3 );
        }
        $html .=
               self::indente( $nivIndent + 2 ).'</ul>'
        .   self::indente( $nivIndent + 1 ).'</div>'
        .self::indente( $nivIndent ).'</nav>';

        return $html;
    }
    #endregion
}