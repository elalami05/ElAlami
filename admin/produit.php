<?php
ob_start();
session_start();
if(!isset($_SESSION['wkdj'])){
    header("Location: ../login.php");
}
require("../config/commandes.php");

$Produits = afficher();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.115.4">
    <title>Album example · Bootstrap v5.3</title>
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="css/style.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /* ... autres styles ... */
    </style>

</head>
<body>
<main>
<?php include("../public/headerAdmin.php");?>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div style="border-radius:20px;" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($Produits as $produit): ?>
                    <form method="post">
                        <div class="col">
                            <div style="background-color:black;color:white;border-radius:15px;height:500px;align-items:center;" class="card shadow-sm" style="height:500px;text-align:center">
                                <img src="<?= $produit->image ?>" style="width: 200px;height:300px;margin:auto;">
                                <div class="card-body">
                                    <p class="card-text" style="font-weight:bold;"><?= $produit->nom ?></p>
                                    <p class="card-text"><?= substr($produit->description, 0, 200) ?></p>
                                    <div class="d-flex justify-content-between ">
                                        <div class="btn-group">
                                            <input type="submit" name="supp<?= $produit->id ?>" class="btn btn-sm btn-outline-secondary" value="Supprimer">
                                            <input type="submit"  name="modif<?= $produit->id ?>" class="btn btn-sm btn-outline-secondary" value="Modifier">
                                        </div>
                                        <h4 style="color:white;" class="text-body-dark"><?=number_format( $produit->prix,2,',',' ') ?>$</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
<?php
foreach ($Produits as $produit){
  if (isset($_POST["modif$produit->id"])) {
    $_SESSION['idProduit'] = $produit->id;
    header("Location: modifierProduit.php");
}
if (isset($_POST["supp$produit->id"])) {
    $_SESSION['idProduit'] = $produit->id;
    header("Location: supprimerProduit.php");
}

}


ob_end_flush();
?>

