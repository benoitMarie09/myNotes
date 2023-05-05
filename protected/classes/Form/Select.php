<?php

namespace Form;

/**
 * Classe qui modélise un Select Html
 */
class Select extends FormElement
{

    #region --- Attibuts ---------------------
    /** @var SelectOption[] $options Les options du selects */
    private $options;
    #endregion


    #region --- Constructeur ---------------------
    public function __construct( string $name, string $label, array $options )
    {
        parent::__construct(  $name, $label );
        $this->options = $options;

    }
    #endregion


    #region --- Methodes ---------------------
    public function rendre( $nivIndent )
    {
        $html = self::indente( $nivIndent )."<select class=\"form-control\" name=\"$this->name\" id=\"$this->name\">";
        foreach( $this->options as $option )
        {
            $html .= self::indente( $nivIndent + 1 )."<option value=\"$option->value\">$option->name</option>";
        }
        $html .= self::indente( $nivIndent )."</select>";

        return $html;
    }
    #endregion
}