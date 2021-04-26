<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/style/style.css">
    <title>Dat project</title>
</head>
<body>
    <div id="teamsContainer">
    </div>
    <div id="createTeamContainer">
    </div>

    <div id="createTeamForm" class="pt-4">
        <button onClick={formFunctions.createForm()}>
        Create a new team
        </button>
    </div> 

    <div id="createTestTeam" class="pt-4">
        <button onClick={formFunctions.test()}>
        Add test team
        </button>
    </div> 
</body>
<script src="./src/script/formFunctions.js"></script>
</html>
