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
    /** @var mixed $value Valeur de l'élément*/
    protected mixed $value;

    /** @var string $label Label de l'élément */
    protected string $label;

    /** @var $attributs Liste des attributs HTML optionnels */
    protected $attributs;
    #endregion

    #region --- Constructeur --------------------------
    public function __construct( string $name, ?string $label )
    {
        $this->name = $name;
        $this->value = null;
        $this->label = $label; 
        $this->attributs = [];
    }
    #endregion

    #region --- Accesseurs ---------------------------
    /** Retourne le nom du champ */
    public function getName() : string { return $this->name; }

    /** Retourne la valeur du champ */
    public function getValue() : string { return $this->value; }

    /** Ajoute une valeur au champ. */
    public function setValue( $value )
    {
        $this->value = $value;
    }

    /** Ajoute un attribut HTML au champ 
     * @param $key La clé de l'attribut.
     * @param $value La valeur de l'aatribut.
    */
    public function setAttribut( string $key, ?string $value = null ) 
    {
        $this->attributs[ $key ] = $value;
    }
    #endregion

    #region --- Methodes ------------------------------
    /**
     * Retourne les attributs du champ sous le format key = "value".
     * @return string les attributs du champ.
     */
    protected function rendreAttributs() : string
    {
        $html = '';
        foreach( $this->attributs as $key => $value )  
        {
            isset($value)   ? $html .= $key . '="' . $value . '"'
                            : $html .= $key;
        }  
        return $html;
    }

    public function getFromPost()
    {
        if ( isset( $_REQUEST[ $this->name ] ) )
        {
            $value = $_REQUEST[ $this->name ];
        }
        return $value;
    }
    abstract function rendre( $nivIndent );
    #endregion

}