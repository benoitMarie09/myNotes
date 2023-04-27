<?php
use Form\TextArea;

$form = new Form\Form();
$form->addElement( new Form\Input( 
    name : 'titre',
    label : 'Titre',
    value : '',
    type : 'text'
) );
$form->addElement( new Form\TextArea(
    name :'descriptif',
    label : 'Déscriptif',
    value : ''
) );

echo $form->rendre( 1 );
