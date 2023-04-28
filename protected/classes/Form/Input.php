<?php

namespace Form;

class Input extends FormElement
{
    #region --- Attributs --------------------------
    /** @var string $type type de l'input */
    private string $type;
    /** @var bool $readonly Determine si le input est en lecture seul */
    private bool $readonly;
    /** @var bool $hidden Determine si le input est caché */
    private bool $hidden;
    /** @var string $placeHolder valeur du placeholder de l'input */
    private string $placeHolder;
    #endregion

    #region --- Constructeur ------------------------
    public function __construct( $name, $label, $value, $type, $readonly = false, $placeholder = '' )
    {
        parent::__construct( $name, $label, $value );
        $this->type         = $type;
        $this->readonly     = $readonly;
        $this->placeHolder  = $placeholder;
    }
    #endregion

    #region --- Methodes ---------------------------
    public function rendre( $nivIndent )
    {
        $html =  self::indente( $nivIndent ).'<div class="form-floating mt-3 mb-3">'
                .self::indente( $nivIndent + 1 )."<input class=\"form-control\" "
                    ." type=\"$this->type\""
                    ." name=\"$this->name\"" 
                    ." id=\"$this->name\""
                    ." value=\"$this->value\"" 
                    ." placeholder=\"$this->placeHolder\""
                    . ($this->readonly ? ' readonly' : '');        
        $html .= ">";
        $html .= self::indente( $nivIndent + 1)."<label for=\"$this->label\">$this->label</label>";
        $html .= self::indente( $nivIndent ).'</div>';
        return $html;

    }

    #endregion
} 