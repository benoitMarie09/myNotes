<?php

/* Ce fichier exécute le traitement des donnée postées
* par le formulaire de création d'un article.
*
* Les champs attendus sont :
*  • titre         Titre de la note                  Texte sant saut de ligne.
*  • id_note       id de la note de référence        Entier.
*  • descriptif    Email de l'auteur                 Texte .
*/

// Réception des données
$titre      = $_REQUEST['titre'];
$id_note    = $_REQUEST['id_note'] ?? null;
$descriptif = $_REQUEST['descriptif'] ?? null;

$daoNote = new DAO\DAONote();
$daoNote->create( $titre, $descriptif, $id_note );
