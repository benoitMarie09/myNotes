<?php

namespace Form;

/**
 * Classe qui modélise un Select Html
 */
class Select extends FormElement
{

    #region --- Attibuts ---------------------
    /** @var array $options Les options du selects */
    private array $options;
    #endregion


    #region --- Constructeur ---------------------
    public function __construct( string $name, mixed $value, string $label, array $options )
    {
        parent::__construct(  $name, $value, $label );
        $this->options = $options;

    }
    #endregion


    #region --- Methodes ---------------------
    public function rendre( $nivIndent )
    {
        $html = self::indente( $nivIndent )."<select name=\"$this->name\" id=\"$this->name\">";
        foreach( $this->options as $option )
        {
            $html .= self::indente( $nivIndent + 1 )."<option value=\"$option\">$option</option>";
        }
        $html .= self::indente( $nivIndent )."</select>";

        return $html;
    }
    #endregion
}