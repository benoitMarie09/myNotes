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

    #endregion

    #region --- Constructeur ------------------------
    public function __construct()
    {
        $this->formElements   = [];
    }
    #endregion

    #region --- Methodes ---------------------------
    /**
     * Permet l'ajout d'un input au formulaire.
     * @param Input $input Le input à ajouter
     */
    public function addElement( FormElement $formElement )
    {
        array_push( $this->formElements, $formElement );
    }

    public function rendre( $nivIndent )
    {
        $html = self::indente( $nivIndent ).'<div class="container mt-3">';
        $html .= self::indente( $nivIndent + 1 ).'<form action="index.php" method="post">';
        foreach( $this->formElements as $formElement )
        {
            $html .= $formElement->rendre( $nivIndent + 2 );
        }    
        $html .= self::indente( $nivIndent + 2 ).'<button type="submit" class="btn btn-primary">Créer</button>';
        $html .= self::indente( $nivIndent + 1 ).'</form>';
        $html .= self::indente( $nivIndent ).'</div>';
        return $html;
    }

    public function getAllFromPost()
    {
        foreach ($this->formElements as $element) 
        {
            $requests[$element->name] = $element->getFromPost();
        }
        return $requests;
    }
    #endregion
}