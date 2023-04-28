<?php

namespace Form;

/**
 * classe qui modélise les options d'un select html
 */
class SelectOption
{
    #region --- Attributs -----------------------
    /** @var string $name Nom de l'option */
    public string $name;

    /** @var mixed $value */
    public mixed $value;
    #endregion

    #region --- Attributs -----------------------
    public function __construct( $name, $value )
    {
        $this->name = $name;
        $this->value = $value;
    }
    #endregion
}