<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/style/style.css">
    <title>Dat project</title>
</head>
<body>
<?php
//echo 'hello';
?>
<form action="action.php" method="post">
 <p>Nom de la team : <input type="text" name="nom" /></p>
 <p>Votre âge : <input type="text" name="age" /></p>
 <p><input type="submit" value="OK"></p>
 </form>
 <div id="metros">
        <button onClick={formFunctions.test()}>
        createTeam
        </button>
    </div> 
    <div id="stations">
    </div>
    <div id="horaires">
    </div>

</body>
<script src="./src/script/createTeam.js"></script>
</html>
