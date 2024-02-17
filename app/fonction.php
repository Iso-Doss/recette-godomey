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
