<?php

/**
 * Classe fondatrice pour les éléments HTML.
 * <br>Regroupe des mécanismes fondamentaux comme la génération
 * de l'indentation pour le rendu.
 */
abstract class HtmlElement
{
    #region --- ATTRIBUTS ------------------------------------------------------

    /** @var string Chaîne d'indentation pour un niveau. Par défaut 4 espaces.
     * <br>Statique, cette chaîne est donc commune à tous les éléments fondés sur cette classe.
     * Elle peut-être modifiée à tout moment.
     */
    public static $indentString = '    ';

    #endregion

    #region --- MÉTHODES -------------------------------------------------------

    /** Retourne une chaîne de début de ligne incluant un saut de ligne
     * et une indentation correspondant au niveau indiqué.
     * <br>À utiliser pour améliorer la structure du rendu HTML des éléments.
     * <br>Exemple : <code>return self::indente( 1 ) . '<p>Coucou</p>;'</code>
     * @param int $nb   Nombre de niveaux d'indentation. 0 = aucune indentation.
     * @return string
     */
    protected static function indente( $nb ) {
        $html = PHP_EOL;
        for ( ; $nb > 0; $nb-- ) {
            $html .= self::$indentString;
        }
        return $html;
    }


    /** Exécute le rendu du code HTML de l'élément, et le retourne dans une chaîne.
     * @param int $nivIndent    Niveau d'indentation de l'élément.
     * @return string
     */
    public abstract function rendre( int $nivIndent );

    #endregion
}
