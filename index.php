<?php
ini_set('display_errors', 1);
error_reporting(~0);
?>
<!doctype html>
<html>
<head>
    <title>Factures</title>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" async></script>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
</head>
<body>
<?php
#region === Intégration des classes ===========================================
spl_autoload_register( function ( $class ) {
    require_once( 'protected/classes/' . str_replace( '\\', '/', $class ). '.php' );
    });
#endregion
#region === Traitement ===============================================
// Teste si le formulaire de création a été posté.
if ( isset( $_REQUEST['id'] )) {
    // Exécute le traitement des données postées.
    require( "protected/includes/traitement.php" );
}
#endregion
#region === Header ===================================================
require_once("protected/includes/header.php");
#endregion
?>
    <h1 class="text-center">Prise de note</h1>
<?php
#region === Router ===================================================
$page = $_REQUEST['page'] ?? 'accueil' ;
if (! file_exists(  "protected/pages/$page.php" )){
    echo "404 page non trouvée";
}
else{
    include( "protected/pages/$page.php");
};
#endregion
?>

</body>
</html>