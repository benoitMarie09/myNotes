<?php
ini_set('display_errors', 1);
error_reporting(~0);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>