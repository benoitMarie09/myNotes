class TableNote 
{
    constructor( $tableId )
    {
        this.table = document.getElementById( $tableId );
        this.tableRows = this.addRows();
        this.openIndex = null;
        this.addEvents();
    }

    /**
     * Ajoute les évenement à chaque lignes.
     */
    addEvents()
    {
        this.tableRows.forEach((item, index) =>{
            index !== this.openIndex ? item.row.addEventListener( 'click', () => this.showRow( index ) )
                                     : item.row.addEventListener( 'click', () => this.hideRow( index ) )
        })
    }

    /**
     * Récupère toutes les balises tr de la table
     * @return une array de toute les ligne de la table.
     */
    addRows()
    {
        var rows = this.table.querySelectorAll( '.tableRow' );
        rows = [...rows].map( row => new Note( this, row ) );
        return rows;
    }

    /**
     * Affiche la ligne en paramètre et cache les autres
     * @param {number} index l'index de la ligne à afficher 
     */
    showRow( index )
    {
        this.tableRows.forEach((item, i) =>{
            index == i  ? item.showDescription()
                        : item.hideDescription()
        })
        if ( this.openIndex != null) { this.tableRows[this.openIndex].hideDescription() }
        this.tableRows[index].showDescription();
        setTimeout(()=>{
            this.openIndex = index;
            this.addEvents()
        },100)
    }

        /**
     * Cache la ligne en paramètre.
     * @param {number} index l'index de la ligne à cacher 
     */
    hideRow( index )
        {
            this.tableRows[index].hideDescription();
            setTimeout(()=>{
                this.openIndex = null;
                this.addEvents()
            },100)
        }

}

class Note 
{
    /**
     * 
     * @param {TableNote} table 
     * @param {HTMLElement} row 
     */
    constructor( table, row )
    {
        this.table = table;
        this.row = row;
        this.desc = this.row.querySelector( '.descriptif' );
    }
    /**
     * Affiche la description de la note.
     */
    showDescription()
    {
        this.desc.classList.add('show')
    }
    /**
     * Cache la descripion de la note.
     */
    hideDescription()
    {
        this.desc.classList.remove( 'show' )
    }
}


window.onload = () => {
    let table = new TableNote( 'tableNote' )
}