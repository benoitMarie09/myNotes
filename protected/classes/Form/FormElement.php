<?php

namespace Form;

/**
 * Classe qui modélise un élément de formulaire
 */
abstract class FormElement extends \HtmlElement
{
    #region --- Attributs -----------------------------
    /** @var string $name nom de l'élément */
    protected string $name;

    // TODO créer une class value
    /** @var mixed value Valeur de l'élément*/
    protected mixed $value;

    /** @var string label Label de l'élément */
    protected string $label;
    #endregion

    #region --- Constructeur --------------------------
    public function __construct( string $name, ?string $label, ?string $value = null )
    {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
    }
    #endregion

    #region --- Methodes ------------------------------
    abstract function rendre( $nivIndent );
    #endregion

}