<?php
if (isset($_POST['submit'])){
    $nickname = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $team = htmlspecialchars($_POST['team']);
    $object = htmlspecialchars($_POST['object']);
    $msg = htmlspecialchars($_POST['message']);

    if (empty($nickname) || empty($email) || empty($phone) || empty($team) || empty($object) || empty($msg)){
        header('location: ?error=2');
    }else if (!isset($_POST['contact_check'])){
        header('location: ?error=1');
    }else{
        foreach ($_POST['contact_check'] as $value){
            $to = 'johndoe@mail.com';
            $subject = 'DAT PROJECT | Nouvelle demande de contact';
            $from = $email;

            // Compose a simple HTML email message
            $message = '<html lang="fr"><body>';
            $message .= '<h1 style="color:#D90479;">Nouvelle demande de contact !</h1>';
            $message .= '<p style="color:#0d0d0d;font-size:18px;">Nom : <strong>'.$nickname.'</strong></p>';
            $message .= '<p style="color:#0d0d0d;font-size:18px;">Mail : <strong>'.$email.'</strong></p>';
            $message .= '<p style="color:#0d0d0d;font-size:18px;">Téléphone : <strong>'.$phone.'</strong></p>';
            $message .= '<p style="color:#0d0d0d;font-size:18px;">Equipe : <strong>'.$team.'</strong></p>';
            $message .= '<p style="color:#0d0d0d;font-size:18px;">Demande : <strong>'.$object.'</strong></p>';
            $message .= '<p style="color:#0d0d0d;font-size:18px;">Description : <strong>'.$msg.'</strong></p>';
            $message .= '</body></html>';


            $headers = "From : '".$from."'\r\n";
            $headers .= "Reply-To : mail.com\r\n";
            $headers .= "Content-type : text/html\r\n";

//            var_dump(mail($to, $subject, $message, $headers));

            mail($to, $subject, $message, $headers);

            header('location: ?success=1');
        }
    }

}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/style/style.css">
    <link rel="stylesheet" href="https://code.jquery.com/qunit/qunit-2.15.0.css">
    <title>Dat project</title>
</head>
<body>

<div id="qunit"></div>
<div id="qunit-fixture"></div>

<section id="teams" style="display:none;">
    <div class="title">
        <h2>Les équipes actuelles</h2>
        <span class="underline"></span>
    </div>
    <div id="teamsContainer">
    </div>
    <div id="createTeamContainer">
    </div>
    <div id="createTeamForm" class="pt-4">
        <button onClick={formFunctions.createForm()}>
            Créer une nouvelle équipe
        </button>
    </div>
    <div id="createTestTeam" class="pt-4">
        <button onClick={formFunctions.test()}>
            Ajouter une équipe test
        </button>
    </div>
</section>
</body>

<script src="https://code.jquery.com/qunit/qunit-2.15.0.js"></script>
<script src="./src/script/formFunctions.js"></script>
<script>
    QUnit.test( "async getTeams", assert => {
        const done = assert.async();
        formFunctions.getTeams().then(function(result) {
            assert.strictEqual(result, 'ok', "getTeams ok");
            done();
        })
    });

    QUnit.test( "async createTeams", assert => {
        const done = assert.async();
        formFunctions.createTeams('name', 'logo.png', 1, '2021').then(function(response) {
            assert.strictEqual(response.status, 201, "createTeams ok");
            done();
        })
    });
</script>
</html>
