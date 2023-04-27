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
    public function __construct( $name, $value, $label )
    {
        parent::__construct(  $name, $value, $label  );

    }
    #endregion


    #region --- Methodes ---------------------

    #endregion
}