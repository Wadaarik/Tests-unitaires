<?php
if (isset($_POST['submit'])) {
    $nickname = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $team = htmlspecialchars($_POST['team']);
    $object = htmlspecialchars($_POST['object']);
    $msg = htmlspecialchars($_POST['message']);

    if (empty($nickname) || empty($email) || empty($phone) || empty($team) || empty($object) || empty($msg)) {
        header('location: ?error=2');
    } else if (!isset($_POST['contact_check'])) {
        header('location: ?error=1');
    } else {
        foreach ($_POST['contact_check'] as $value) {
            $to = 'johndoe@mail.com';
            $subject = 'DAT PROJECT | Nouvelle demande de contact';
            $from = $email;

            // Compose a simple HTML email message
            $message = '<html lang="fr"><body>';
            $message .= '<h1 style="color:#D90479;">Nouvelle demande de contact !</h1>';
            $message .= '<p style="color:#0d0d0d;font-size:18px;">Nom : <strong>' . $nickname . '</strong></p>';
            $message .= '<p style="color:#0d0d0d;font-size:18px;">Mail : <strong>' . $email . '</strong></p>';
            $message .= '<p style="color:#0d0d0d;font-size:18px;">Téléphone : <strong>' . $phone . '</strong></p>';
            $message .= '<p style="color:#0d0d0d;font-size:18px;">Equipe : <strong>' . $team . '</strong></p>';
            $message .= '<p style="color:#0d0d0d;font-size:18px;">Demande : <strong>' . $object . '</strong></p>';
            $message .= '<p style="color:#0d0d0d;font-size:18px;">Description : <strong>' . $msg . '</strong></p>';
            $message .= '</body></html>';


            $headers = "From : '" . $from . "'\r\n";
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
    <title>Dat project</title>
</head>
<body>

    <header>
        <div id="navbar">
            <div id="logo">
                <img src="./src/local_img/dat_project_logo.png" width="50" alt="logo dat project">
            </div>
            <ul>
                <li><a href="#main-content">Dat project</a></li>
                <li><a href="#teams">Les Equipes</a></li>
                <li><a href="#contact-container">Contact</a></li>
            </ul>
            <div id="search">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 512.005 512.005" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                        <g>
                            <g xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path d="M505.749,475.587l-145.6-145.6c28.203-34.837,45.184-79.104,45.184-127.317c0-111.744-90.923-202.667-202.667-202.667    S0,90.925,0,202.669s90.923,202.667,202.667,202.667c48.213,0,92.48-16.981,127.317-45.184l145.6,145.6    c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251C514.091,497.411,514.091,483.928,505.749,475.587z     M202.667,362.669c-88.235,0-160-71.765-160-160s71.765-160,160-160s160,71.765,160,160S290.901,362.669,202.667,362.669z" fill="#f2f2f2" data-original="#000000" class="" />
                                </g>
                            </g>
                            <g xmlns="http://www.w3.org/2000/svg">
                            </g>
                            <g xmlns="http://www.w3.org/2000/svg">
                            </g>
                            <g xmlns="http://www.w3.org/2000/svg">
                            </g>
                            <g xmlns="http://www.w3.org/2000/svg">
                            </g>
                            <g xmlns="http://www.w3.org/2000/svg">
                            </g>
                            <g xmlns="http://www.w3.org/2000/svg">
                            </g>
                            <g xmlns="http://www.w3.org/2000/svg">
                            </g>
                            <g xmlns="http://www.w3.org/2000/svg">
                            </g>
                            <g xmlns="http://www.w3.org/2000/svg">
                            </g>
                            <g xmlns="http://www.w3.org/2000/svg">
                            </g>
                            <g xmlns="http://www.w3.org/2000/svg">
                            </g>
                            <g xmlns="http://www.w3.org/2000/svg">
                            </g>
                            <g xmlns="http://www.w3.org/2000/svg">
                            </g>
                            <g xmlns="http://www.w3.org/2000/svg">
                            </g>
                            <g xmlns="http://www.w3.org/2000/svg">
                            </g>
                        </g>
                    </svg>
                </a>
            </div>
        </div>
    </header>
    <div class="first-v">
        <div id="main-content">
            <h1>Le top des meilleures <br />équipes <span>E-sport</span></h1>
            <h2>Les meilleures équipes E-sport en un seul clic...</h2>
            <a class="cta" href="#teams">Découvrir les équipes</a>
        </div>
    </div>

    <section id="teams">
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

    <div class="second-content">
        <div class="container-stream">
            <div class="title">
                <h2>Retrouvez les Lives de notre Equipe<h2>
            </div>
            <h4>Si vous le souhaitez vous pouvez suivre nos joueurs directement depuis notre site internet. <br>C'est la meilleure manière de soutenir l'équipe...</h4>
            <a href="#">
                <img class="video-class" src="./src/local_img/video.png" alt="">
            </a>
        </div>
    </div>
    <div id="contact-container" class="contact-container">
        <div class="contact-us">
            <div class="title">
                <h2>Contactez-nous</h2>
                <span class="underline"></span>
            </div>
            <p>Avoir une communication ouverte est l’une des valeurs principales de notre marque. <br>
                Vous pouvez également nous contacter par email en remplissant le formulaire ci-dessous.
            </p>

            <?php
            if (isset($_GET['error'])) {
                $err_check = $_GET['error'];
                if ($err_check == 1) {
                    echo '<span class="alert alert-danger" role="alert">Merci d\'accepter la politique de confidentialité pour envoyer votre message.</span>';
                } elseif ($err_check == 2) {
                    echo '<span class="alert alert-danger" role="alert">Merci de compléter tous les champs.</span>';
                }
            } elseif (isset($_GET['success'])) {
                echo '<span class="alert alert-success" role="alert">Votre message a été envoyé, nous vous répondrons dans les plus brefs délais.</span>';
            }
            ?>
            <form method="post" action="index.php" class="form-style-9">
                <ul>
                    <li>
                        <input type="text" name="pseudo" class="field-style field-split align-left" placeholder="Pseudo" required>
                        <input type="email" name="email" class="field-style field-split align-right" placeholder="Email" required>

                    </li>
                    <li>
                        <input type="tel" name="phone" class="field-style field-split align-left" placeholder="Téléphone" required>
                        <input type="text" name="team" class="field-style field-split align-right" placeholder="Equipe">
                    </li>
                    <li>
                        <input type="text" name="object" class="field-style field-full align-none" placeholder="Objet" required>
                    </li>
                    <li>
                        <textarea name="message" class="field-style" placeholder="Message" required></textarea>
                    </li>
                    <li style="margin-bottom: 20px;">
                        <input type="checkbox" name="contact_check[]" id="contact_check" required>
                        <small>Merci d'accepter la politique de confidentialité.</small>
                    </li>
                    <li>
                        <input type="submit" class="submit" name="submit" value="Envoyer">
                    </li>
                </ul>
            </form>
        </div>
    </div>
</body>
<script src="./src/script/formFunctions.js"></script>
</html>