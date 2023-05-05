<?php
use Form\InputNoteId;
use Form\TextArea;

$form = new Form\Form();
$form->addElement( new Form\InputNoteId() );
$form->addElement( new Form\Input( 
    name : 'titre',
    label : 'Titre',
    type : 'text'
) );
$form->addElement(new Form\SelectNote('id_note', 'Note de référence'));
$form->addElement( new Form\TextArea(
    name :'descriptif',
    label : 'Déscriptif',
) );

echo $form->rendre( 1 );
