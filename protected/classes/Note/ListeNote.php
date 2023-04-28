<?php

namespace Note;


/**
 * Classe modelisant un tableau affichant la liste des notes
 */
class ListeNote extends \HtmlElement
{
    #region --- Attributs ------------------------------
    /** @var \DAO\DAONote DAO de la table note de la base de données. */
    private static \DAO\DAONote $dbNotes;
    #endregion

    #region --- Construct ------------------------------
    /** Initialisation de la liste de notes */
    public function __construct()
    {
        self::$dbNotes = new \DAO\DAONote();
    }
    #endregion

    #region --- Methodes -------------------------------

    public function rendre( $nivIndent )
    {
        $html = self::indente( $nivIndent ).'<div class="card">';
        // Ajout de l'entête
        $html .= 
         self::indente( $nivIndent ) . '<header class="card-header">'
        .     self::indente( $nivIndent + 1 ) . "<h3 class=\"text-left\">Notes</h3>"
        .self::indente( $nivIndent ) . '</header>';
        // Ajout des table header
        $html .= 
        self::indente( $nivIndent + 1).'<main class="card-body">'
        .   self::indente( $nivIndent + 2).'<table class="table table-bordered">'
        .      self::indente( $nivIndent + 3 ).'<thead class="thead-dark">'
        .        self::indente( $nivIndent + 4 ).'<tr>'
        .          self::indente( $nivIndent + 5 ).'<th scope="col">'
        .              self::indente( $nivIndent + 6 ).'#'
        .          self::indente( $nivIndent + 5 ).'</th>'
        .          self::indente( $nivIndent + 5 ).'<th scope="col" class="text-center">'
        .              self::indente( $nivIndent + 6 ).'Titre'
        .          self::indente( $nivIndent + 5 ).'</th>'
        .        self::indente( $nivIndent + 4 ).'</tr>'
        .      self::indente( $nivIndent + 3 ).'</thead>'
        .   self::indente( $nivIndent + 3 ).'<tbody>';

        // Ajout des notes à la liste
        foreach( self::$dbNotes::getAll() as $key=>$note )
        {   
            $index = $key + 1;
            $html .= 
            self::indente( $nivIndent + 4 ).'<tr>'
            .   self::indente( $nivIndent + 5 )."<th scope=\"row\">$index</th>"
            .   self::indente( $nivIndent + 5 ).$note->rendre( $nivIndent + 5 )
            .self::indente( $nivIndent + 4 ).'</tr>';
        }
        $html .= 
                    self::indente( $nivIndent + 3 ).'</tbody>'
                .self::indente( $nivIndent +2 ).'</table>'
            .self::indente( $nivIndent + 1).'</main>'
        .self::indente( $nivIndent ).'</div>';

        return $html;
    }
    #endregion
}