<?php

namespace Form;

/**
 * Classe de modélisation d'un formulaire HTML.
 */
class Form extends \HtmlElement
{
    #region --- Attributs --------------------------
    /** @var FormElement[] $formElements Array des inputs du formumlaire. */
    private Array $formElements;

    /** @var string $titre Titre du formulaire. */
    private string $titre;
    #endregion

    #region --- Constructeur ------------------------
    public function __construct( string $titre )
    {
        $this->titre    = $titre;
        $this->formElements   = [];
    }
    #endregion

    #region --- Methodes ---------------------------
    /**
     * Permet l'ajout d'un input au formulaire.
     * @param Input $input Le input à ajouter
     */
    public function addInput( Input $formElement )
    {
        array_push( $this->formElements, $formElement );
    }

    public function rendre( $nivIndent )
    {
        $html = self::indente( $nivIndent ).'<form action="index.php" method="post">';
        foreach( $this->formElements as $formElement )
        {
            $html .= $formElement->rendre( $nivIndent + 1 );
        }    
        $html .= self::indente( $nivIndent ).'</form>';

        return $html;
    }
    #endregion
}