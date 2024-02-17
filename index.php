<?php
require_once(__DIR__ . '/app/fonction.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <!-- inclusion de l'entête du site -->
        <?php require_once(__DIR__ . '/app/commun/header.php'); ?>

        <div class="row g-3 mt-3">
            <?php
            if (isset($_GET['page']) && !empty($_GET['page'])) {
                switch ($_GET['page']) {
                    case 'accueil':
                        include_once(__DIR__ . '/app/accueil.php');
                        break;
                    case 'contact':
                        include_once(__DIR__ . '/app/contact.php');
                        break;
                    case 'connexion':
                        include_once(__DIR__ . '/app/connexion.php');
                        break;
                    case 'traitement-connexion':
                        include_once(__DIR__ . '/app/traitement-connexion.php');
                        break;
                    case 'inscription':
                        include_once(__DIR__ . '/app/inscription.php');
                        break;
                    case 'traitement-inscription':
                        include_once(__DIR__ . '/app/traitement-inscription.php');
                        break;
                    default:
                        include_once(__DIR__ . '/app/accueil.php');
                        break;
                }
            } else {
                include_once(__DIR__ . '/app/accueil.php');
            }
            ?>
        </div>
    </div>
    <!-- inclusion du bas de page du site -->
    <?php require_once(__DIR__ . '/app/commun/footer.php'); ?>
</body>


</html>