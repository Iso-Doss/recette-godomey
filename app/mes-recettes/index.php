<?php

if (!est_connecter()) {
    $message = "Vous n'êtes pas connecté.";
    header('location:index.php?page=connexion&erreur=' . $message);
}

?>

<div class="row d-flex align-items-center">
    <div class="col-md-6">
        <h3>
            Mes recettes
        </h3>
    </div>

    <div class="col-md-6 d-flex justify-content-end">
        <a href="index.php?page=ajout-recette" class="btn btn-primary">
            Ajouter une recette
        </a>
    </div>
</div>

<div class="row d-flex align-items-center">
    <div class="col-md-12">
        <p>
            Aucune recette n'est disponible pour le moment.
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Recette</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>
                        <p>
                            <span>
                                Mark
                            </span>
                            <br>
                            <span class="badge bg-success">
                                Est actif
                            </span>
                        </p>
                    </td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>
                        <a href="#" class="btn btn-info">
                            Détails
                        </a>

                        <a href="#" class="btn btn-warning">
                            Modifier
                        </a>

                        <a href="#" class="btn btn-danger">
                            Supprimer
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>