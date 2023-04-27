<?php

namespace Form;

/**
 * Classe qui modélise un texteArea html AVEC CKEDITOR
*/
class TextArea extends FormElement
{
    #region --- Attributs ------------------------

    #endregion

    #region --- Constructeur ---------------------
    public function __construct( $name, $label, $value )
    {
        parent::__construct( $name, $label, $value );
    }
    #endregion

    #region --- Methodes -------------------------
    public function rendre( $nivIndent )
    {
        $html = self::indente( $nivIndent )."<label for=\"$this->label\"></label>"
                ."self::indente( $nivIndent ).<textarea name=\"$this->name\"></textarea>"
                .self::indente( $nivIndent )."<script>"
                    .self::indente( $nivIndent + 1 )."CKEDITOR.replace( '$this->name' )"
                .self::indente( $nivIndent )."</script>";

        return $html;
    }
    #endregion
}