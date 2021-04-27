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
            <li><a href="#">Dat project</a></li>
            <li><a href="#">Les Equipes</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div id="search">
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 512.005 512.005" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                    <g xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path d="M505.749,475.587l-145.6-145.6c28.203-34.837,45.184-79.104,45.184-127.317c0-111.744-90.923-202.667-202.667-202.667    S0,90.925,0,202.669s90.923,202.667,202.667,202.667c48.213,0,92.48-16.981,127.317-45.184l145.6,145.6    c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251C514.091,497.411,514.091,483.928,505.749,475.587z     M202.667,362.669c-88.235,0-160-71.765-160-160s71.765-160,160-160s160,71.765,160,160S290.901,362.669,202.667,362.669z" fill="#f2f2f2" data-original="#000000" style="" class=""/>
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
        <h1>Le top des meilleures <br/>équipes <span>E-sport</span></h1>
        <h2>Les meilleures équipes E-sport en un seul clic...</h2>
        <a class="cta" href="#">Découvrir les équipes</a>
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
            Create a new team
        </button>
    </div>
    <div id="createTestTeam" class="pt-4">
        <button onClick={formFunctions.test()}>
            Add test team
        </button>
    </div>
</section>


</body>
<script src="./src/script/formFunctions.js"></script>
</html>
