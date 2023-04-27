<?php
session_start();
$username = $_SESSION["username"];
echo ("test");
echo $username;
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Accueil</title>
  </head>
  <body>
    <div class="container w-100 flex align-items-center justify-content-center">
      <h1 class="mt-5 text-center fw-bold text-primary fs-4">Accueil projet cloud</h1>
      <p class="mt-2 text-center"> Bienvenue chez nous, inscrivez-vous ou rejoignez votre compte:</p>
      <nav class="shadow border border-1 border-success flex flex-column gap-2 align-items-center justify-content-center">
      <a class="my-2 btn btn-primary w-25" href="/">Accueil</a>

      <?php

      if(!$_SESSION["username"]){
          echo '<a class="my-2 btn btn-primary w-25" href="src/sign-in.php">Inscription</a>
      <a class="my-2 btn btn-primary w-25" href="src/connexion.php">Connexion</a>';

      }else{
          echo ' <a class="my-2 btn btn-primary w-25" href="src/change_pass.php">Changer mon mot de passe</a>';
          echo ' <a class="my-2 btn btn-primary w-25" href="src/logout.php">se déconnecter</a>';
      }
      ?>



<?php var_dump($_GET['error_data']) ?>
    <?php
          if($_SESSION["username"]){ ?>
          <a class="my-2 btn btn-primary w-25" href="src/sign-in.php">Mes informations</a>
              <div class="p-5 my-5 d-flex flex-column justify-content-center align-items-center">
                  <div class="p-2 d-flex flex-column justify-content-center align-items-center gap-1">
                      <h2>Ma consommation d'espace disque</h2>
                      <a class="my-2 btn btn-success w-50 fw-bold text-white" href="script/infoConsoSite.php"> Générer mes données</a>
                  </div>
                  <?php if(!isset($_GET['user_site_size']) || !isset($_GET['user_bdd_size'])) { ?>
                      <p class="warning-statement fw-bold text-lg"> Aucune données n'est disponible </p>
                  <?php } elseif(isset($_GET['error_data']) && $_GET['error_data'] === 'invalid_values')  { ?>
                      <p class="warning-statement fw-bold text-lg text-danger">Une erreur s'est produite lors de la génération des données.</p>
                      <p class="warning-statement fw-bold">Contacter le service client pour avoir plus d'information</p>
                  <?php } else { ?>
                      <div>
                          <table class="table table-striped">
                              <thead>
                              <tr>
                                  <th scope="col">Site web</th>
                                  <th scope="col">Taille dossier sur disque</th>
                                  <th scope="col">Taille base de donnée</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>Mon premier site</td>
                                  <td><?php echo $_GET['user_site_size'] ?></td>
                                  <td><?php echo $_GET['user_bdd_size'] ?></td>
                              </tr>
                              <tr>
                                  <td>Mon second site</td>
                                  <td>200ko</td>
                                  <td>300ko</td>
                              </tr>
                              </tbody>
                          </table>
                      </div>
                  <?php } ?>

              </div>
         <?php } ?>
  </nav>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
