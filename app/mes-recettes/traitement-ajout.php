<?php
$erreurs = [];
$donnees = [];
$success = '';
$erreur = '';

connexion_db();

foreach ($_POST as $cle => $valeur) {
    $donnees[$cle] = strip_tags($valeur);
}

if (empty($_POST['nom'])) {
    $erreurs['nom'] = 'Le champ nom est obligatoire.';
}

if (empty($_POST['description'])) {
    $erreurs['description'] = 'Le champ description est obligatoire.';
}

if (empty($_POST['recette'])) {
    $erreurs['recette'] = 'Le champ recette est obligatoire.';
}

if (!isset($_FILES['image']) || $_FILES['image']['error'] != 0) {
    $erreurs['image'] = 'Le champ image est obligatoire.';
} else {
    $enregistrer_une_image = enregistrer_une_image('image');
    if (is_string($enregistrer_une_image)) {
        $erreurs['image'] = $enregistrer_une_image;
    } elseif (!$enregistrer_une_image) {
        $erreurs['image'] = "Oups!!! une erreur s'est produite lors de l'enregistrement de l'image.";
    } elseif ($enregistrer_une_image) {
        $donnees['image'] = basename($_FILES['image']['name']);
    }
}

if (empty($_POST) || !empty($erreurs)) {
    $erreur = "Oups!!! Un ou plusieur champs sont vide(s) ou mal(s) renseigné(s).";
} else {
    $donnees['id_utilisateur'] = $_SESSION['utilisateur_connecter']['id'];
    $ajout_recette = ajout_recette($donnees);
    if ($ajout_recette) {
        $success = "Ajout de recette effectuée avec succès.";
    } else {
        $erreur = "Oups!!! Une erreur est survenue lors de l'ajout de la recette.Veuille réessayer.";
    }
}

header('location: index.php?page=ajout-recette&erreur=' . $erreur . '&erreurs=' . json_encode($erreurs)   . '&donnees=' . json_encode($donnees) . '&success=' . $success);
