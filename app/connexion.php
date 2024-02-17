<div class="row g-3 d-flex justify-content-center">
    <form class="col-md-6" action="index.php?page=traitement-connexion" method="POST">
        <h3 class="text-center">
            Se connecter
        </h3>
        <p class="text-center">
            Veuillez fournir vos informations afin de vous connectez au site des recettes.
        </p>
        <div class="mb-3">
            <label for="connexion-email" class="form-label">
                Adresse email :
                <span class="text-danger">(*)</span>
            </label>
            <input type="email" name="email" class="form-control connexion-email" id="connexion-email" placeholder="Veuillez entrer votre adresse email." required>
        </div>
        <div class="mb-3">
            <label for="connexion-mot-de-passe" class="form-label">
                Mot de passe :
                <span class="text-danger">(*)</span>
            </label>
            <input type="password" name="mot-de-passe" class="form-control connexion-mot-de-passe" id="connexion-mot-de-passe" placeholder="Veuillez entrer votre mot de passe." required>
        </div>
        <div class="d-flex justify-content-between">
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="connexion-se-souvenir-de-moi">
                <label class="form-check-label" for="connexion-se-souvenir-de-moi">
                    Se souvenir de moi
                </label>
            </div>
            <div class="mb-3 form-check">
                <a href="" class="text-right">
                    Mot de passe oublié
                </a>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>

    <a href="index.php?page=inscription" class="text-center">Je souhaite m'inscrire</a>
</div>