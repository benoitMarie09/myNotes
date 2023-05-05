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

        $html = self::indente( $nivIndent ).'<div class="container mt-3">'
            .  self::indente( $nivIndent + 1 ).'<div class="card">';
            // Ajout de l'entête
            $html .= 
            self::indente( $nivIndent ) . '<header class="card-header">'
            .     self::indente( $nivIndent + 3 ) . "<h3 class=\"text-left\">Notes</h3>"
            .self::indente( $nivIndent ) . '</header>';
            // Ajout des table header
            $html .= 
            self::indente( $nivIndent + 2).'<main class="card-body">'
            .   self::indente( $nivIndent + 3).'<table id="tableNote" class="table">'
            .      self::indente( $nivIndent + 4 ).'<thead class="thead-dark">'
            .        self::indente( $nivIndent + 5 ).'<tr>'
            .          self::indente( $nivIndent + 6 ).'<th scope="col" class="text-center th-sm ">'
            .              self::indente( $nivIndent + 7 ).'#'
            .          self::indente( $nivIndent + 6 ).'</th>'
            .          self::indente( $nivIndent + 6 ).'<th scope="col" class="text-center">'
            .              self::indente( $nivIndent + 7 ).'Titre'
            .          self::indente( $nivIndent + 6 ).'</th>'
            .        self::indente( $nivIndent + 5 ).'</tr>'
            .      self::indente( $nivIndent + 4 ).'</thead>'
            .      self::indente( $nivIndent + 4 ).'<tbody>';

            // Ajout des notes à la liste
            foreach( self::$dbNotes::getAll() as $key=>$note )
            {   
                $index = $key + 1;
                $html .= 
                self::indente( $nivIndent + 5 ).'<tr class="tableRow">'
                .   self::indente( $nivIndent + 6 )."<th scope=\"row\" class = \"th-sm text-center\">$index</th>"
                .   self::indente( $nivIndent + 6 ).$note->rendre( $nivIndent + 5 )
                .self::indente( $nivIndent + 5 ).'</tr>';
            }
            $html .= 
                        self::indente( $nivIndent + 4 ).'</tbody>'
                    .self::indente( $nivIndent + 3 ).'</table>'
                .self::indente( $nivIndent + 2).'</main>'
            .self::indente( $nivIndent + 1 ).'</div>'
        .self::indente( $nivIndent ).'</div>';
        return $html;
    }
    #endregion
}