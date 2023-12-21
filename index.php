<?php
include ("public/header.php");
ob_start();

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
    <title>Gamer Shop</title>
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
                                            <a name="pan<?= $produit->id?>" href="" ><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-cart-plus" viewBox="0 0 16 16">
  <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg></a>
                                            <input type="submit" name="<?= $produit->id ?>" class="btn btn-sm btn-outline-secondary" value="Acheter">
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
session_start();
foreach ($Produits as $produit){
  if (isset($_POST[$produit->id]) ) {
    $_SESSION['idProduit'] = $produit->id;
    header("Location: produit.php");
}
}

ob_end_flush();
?>
