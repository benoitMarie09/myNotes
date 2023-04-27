<?php

namespace Form;

/**
 * Classe qui modélise un élément de formulaire
 */
abstract class FormElement extends \HtmlElement
{
    #region --- Attributs -----------------------------
    /** @var string $name nom de l'élément */
    private string $name;

    // TODO créer une class value
    /** @var mixed value Valeur de l'élément*/
    private mixed $value;

    /** @var string label Label de l'élément */
    private string $label;
    #endregion

    #region --- Constructeur --------------------------
    public function __construct( string $name, ?string $value, ?string $label )
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