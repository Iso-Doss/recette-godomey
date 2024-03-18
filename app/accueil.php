<?php
if (!empty($_GET['message'])) {
?>
    <div class="alert alert-info" role="alert">
        <?= $_GET['message']; ?>
    </div>
<?php

}

if (!empty($_GET['erreur'])) {
?>
    <div class="alert alert-danger" role="alert">
        <?= $_GET['erreur']; ?>
    </div>
<?php
}

$recettes = recettes();
?>

<h3>
    Liste des recettes
</h3>

<div class="row g-4">
    <?php if (empty($recettes)) { ?>
        <p>
            Aucune recette n'est disponible pour le moment.
        </p>
        <?php } else {
        foreach ($recettes as $recette) { ?>
            <div class="col-md-3">
                <div class="card">
                    <img style="height: 200px;width: 100%;object-fit: cover;" src="/app/uploads/<?= $recette['image']; ?>" class="card-img-top" alt="Image de la recette">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $recette['nom']; ?>
                        </h5>
                        <a href="#" class="btn btn-primary">Voir les détails</a>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>

<div class="mt-3 d-flex justify-content-end">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>