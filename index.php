<?php
ini_set('display_errors', 1);
error_reporting(~0);
?>
<!doctype html>
<html>
<head>
    <title>Factures</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
</head>
<body>
    <h1 class="text-center">Prise de note</h1>
<?php
#region === Intégration des classes ===========================================
spl_autoload_register( function ( $class ) {
    require_once( 'protected/classes/' . str_replace( '\\', '/', $class ). '.php' );
    });
#endregion

#region === Essais basiques ===================================================
$myListe = new Note\ListeNote();
echo $myListe->rendre( 1 );
#endregion
?>

</body>
</html>