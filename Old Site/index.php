<?php
    //~ URL appelée nous retournant des données au format JSON
    $data_url = 'http://api.randomuser.me/?results=3';

    //~ On appelle l'URL et on stocke le contenu retourné dans une variable
    $data_contenu = file_get_contents($data_url);

    //~ Les données étant au format JSON, on les décode pour les stocker sous la forme d'un tableau associatif
    $data_array = json_decode($data_contenu, true);

    //~ On pointe directement sur les données du/des utilisateur(s) retourné(s)
    $utilisateurs = $data_array['results'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ALIPTIC - Exercice TWIG</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="assets/icon.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
    <link href="assets/style.css" rel="stylesheet">
    <style>.bg-img1{border-left:50px solid #1FC4F4;}</style>
</head>
<body>
	<div class="bg-img1 size1 flex-w flex-c-m p-t-20 p-b-55 p-l-15 p-r-15">
		<div class="wsize1 bor1 bg1 p-b-45 p-l-15 p-r-15 p-t-20 respon1">
			<div class="wrappic1">
				<img src="assets/logo.png" alt="Logo ALIPTIC">
			</div>
			<p class="txt-center m1-txt1 p-t-33 p-b-68">
				Exercice TWIG
			</p>

            <div class="container row">
            <?php 
                foreach($utilisateurs as $utilisateur){
                    ?>
                    <div class="card col-4">
                        <img class="card-img-top" src="<?php echo $utilisateur['picture']['medium'];?>" alt="Image de <?php echo $utilisateur['name']['first'];?>" />

                        <div class="card-body">
                            <h5 class="card-title">
                                Bonjour, mon nom est <?php echo ucfirst($utilisateur['name']['first'])." ".strtoupper($utilisateur['name']['last']);?>
                            </h5>
                            <p class="card-text">
                                J'habite "<?php echo strtoupper($utilisateur['location']['state']);?>", dans une ville qui s'appelle "<?php echo strtoupper($utilisateur['location']['city']); ?>""<br><br>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">
                                    Mon adresse e-mail est 
                                    <a href="mailto:<?php echo $utilisateur['email'];?>" title="Envoyer un email à <?php echo ucfirst($utilisateur['name']['first']);?>"><?php echo $utilisateur['email'];?></a>, dont le mot de passe est "<?php echo $utilisateur['login']['password'];?>"
                                </small>
                            </p>
                        </div>
                    </div>
                    <?php
                }
            ?>
            </div>

		</div>
	</div>
</body>
</html>

