<?php

/**
 * Cette fonction permet de se connecter la base de données.
 * @return PDO | string L'instance de la base de données ou le message d'erreur.
 */
function connexion_db()
{
    try {
        $dns = 'mysql:host=localhost:8889;dbname=recette;charset=utf8';
        $user_name = 'root';
        $password = 'root';
        return new PDO($dns, $user_name, $password);
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

/**
 * Cette fonction permet d'inscrire un utilisateur.
 * 
 * @param array $utilisateur Les informtion de l'utilisateur.
 * @return bool $inscrire_utilisateur Es ce que l'utilisateur a pu etre inscrit.
 */
function inscrire_utilisateur($utilisateur)
{
    $inscrire_utilisateur = false;

    $db = connexion_db();

    if (is_object($db)) {
        $requetteSql = 'INSERT INTO utilisateur(`nom`, `prenoms`, `sexe`, `email`, `mot-de-passe`) VALUES (:nom,:prenoms,:sexe,:email,:mot_de_passe)';
        $requette = $db->prepare($requetteSql);
        try {
            $inscrire_utilisateur = $requette->execute($utilisateur);
        } catch (Exception $e) {
            $inscrire_utilisateur = false;
        }
    }

    return $inscrire_utilisateur;
}

/**
 * Cette fonction permet de verifier si un utilisateur existe dans la base de données grace a son adresse email.
 * 
 * @param string $email L'adresse email de l'utilisateur.
 * @return bool
 */
function chercher_utilisateur_par_son_email(string $email): bool
{
    $utilisateur_est_trouver = false;

    $db = connexion_db();

    if (is_object($db)) {
        $requetteSql = 'SELECT * FROM `utilisateur` WHERE email =:email';
        $requette = $db->prepare($requetteSql);
        try {
            $requette->execute(['email' => $email]);
            if (is_array($requette->fetch(PDO::FETCH_ASSOC))) {
                $utilisateur_est_trouver = true;
            }
        } catch (Exception $e) {
            $utilisateur_est_trouver = false;
        }
    }

    return $utilisateur_est_trouver;
}



/**
 * Cette fonction permet de verifier si un utilisateur existe dans la base de données grace a son adresse email et son mot de passe.
 * 
 * @param string $email L'adresse email de l'utilisateur.
 * @param string $mot_de_passe Le mot de passe de l'utilisateur.
 * @return bool
 */
function chercher_utilisateur_par_son_email_et_son_mot_de_passe(string $email, string $mot_de_passe): array
{
    $utilisateur_est_trouver = [];

    $db = connexion_db();

    if (is_object($db)) {
        $requetteSql = 'SELECT * FROM `utilisateur` WHERE `email`=:email and `mot-de-passe`=:mot_de_passe';
        $requette = $db->prepare($requetteSql);
        try {

            $requette->execute(
                [
                    'email' => $email,
                    'mot_de_passe' => $mot_de_passe
                ]
            );
            $utilisateur = $requette->fetch(PDO::FETCH_ASSOC);
            if (is_array($utilisateur)) {
                $utilisateur_est_trouver =  $utilisateur;
            }
        } catch (Exception $e) {
            $utilisateur_est_trouver = [];
        }
    }

    return $utilisateur_est_trouver;
}

/**
 * Cette fonction me permet de verifier si un utilisateur est connecté.
 * 
 * @return bool
 */
function est_connecter(): bool
{
    return isset($_SESSION['utilisateur_connecter']) && !empty($_SESSION['utilisateur_connecter']);
}

/**
 * Cette fonction permet d'ajouter une recette dans la base de données.
 * 
 * @param array $donnees_recette Les données de la recette a créer.
 * @return bool
 */
function ajout_recette(array $donnees_recette): bool
{
    $est_ajouter = false;

    $db = connexion_db();

    if (is_object($db)) {
        $requetteSql = 'INSERT INTO recette(`nom`, `description`, `recette`, `image`, `id_utilisateur`) VALUES (:nom,:description,:recette,:image,:id_utilisateur)';
        $requette = $db->prepare($requetteSql);
        try {
            $est_ajouter = $requette->execute($donnees_recette);
        } catch (Exception $e) {
            $est_ajouter = false;
        }
    }

    return $est_ajouter;
}

function enregistrer_une_image($nom_du_champ): bool|string
{
    $est_enregistrer = false;
    // Testons si le fichier a bien été envoyé et s'il n'y a pas des erreurs
    if (isset($_FILES[$nom_du_champ]) && $_FILES[$nom_du_champ]['error'] === 0) {
        // Testons, si le fichier est trop volumineux
        if ($_FILES[$nom_du_champ]['size'] > 1000000) {
            return "L'envoi n'a pas pu être effectué, erreur ou image trop volumineuse";
        }
        // Testons, si l'extension n'est pas autorisée
        $fileInfo = pathinfo($_FILES[$nom_du_champ]['name']);
        $extension = $fileInfo['extension'];
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
        if (!in_array($extension, $allowedExtensions)) {
            return "L'envoi n'a pas pu être effectué, l'extension {$extension} n'est pas autorisée";
        }

        // Testons, si le dossier uploads est manquant
        $path = __DIR__ . '/uploads/';
        mkdir($path);
        if (!is_dir($path)) {
            return "L'envoi n'a pas pu être effectué, le dossier uploads est manquant";
        }

        // On peut valider le fichier et le stocker définitivement
        $est_enregistrer  =  move_uploaded_file($_FILES[$nom_du_champ]['tmp_name'], $path . basename($_FILES[$nom_du_champ]['name']));

        return $est_enregistrer;
    }
}

/**
 * 
 */
// function recettes($id_utilisateur){
    
//     $recettes = [];

//     $db = connexion_db();

//     if (is_object($db)) {
//         $requetteSql = 'SELECT * FROM `utilisateur` WHERE `email`=:email and `mot-de-passe`=:mot_de_passe';
//         $requette = $db->prepare($requetteSql);
//         try {

//             $requette->execute(
//                 [
//                     'email' => $email,
//                     'mot_de_passe' => $mot_de_passe
//                 ]
//             );
//             $utilisateur = $requette->fetch(PDO::FETCH_ASSOC);
//             if (is_array($utilisateur)) {
//                 $utilisateur_est_trouver =  $utilisateur;
//             }
//         } catch (Exception $e) {
//             $utilisateur_est_trouver = [];
//         }
//     }
// }