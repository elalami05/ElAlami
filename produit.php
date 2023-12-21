<?php
ob_start();
session_start();
require("public/header.php") ;
// require("config/commandes.php");
$idProduit = $_SESSION['idProduit'];
if(isset($_POST['ajouter'])){
   
    $quantite = $_POST['QTS'];
   
    if($quantite > 0){
        ajoutPanier($idProduit,$quantite);
    }
}
if(!isset($idProduit)){
        header("Location: ./index.php");
}
$Produits = afficherUnProduit($idProduit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamer Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>


<form method="post">
    <main>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div style="border-radius:20px;" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="container-fluid">
                <?php foreach ($Produits as $produit): ?>

        <div class="row"  style="width: 1000px;margin-left:-200px;">
            <div class="col-5"  >
                <div class="card shadow-sm">
                <img src="<?= $produit->image ?>" style="height: 100%;width: 100%;" >
            </div>
            </div>
            <div class="col-7"  >
                <h1><?= $produit->nom ?></h1>
                <p>description: <?= $produit->description ?></p>
                <label>Quantitier:</label>
                <input type="number" name="QTS" value="1" min="1" max="<?=$produit->Quantites?>">
                <br/>
                <label>Prix : <?=$produit->prix?>$</label>
                <div>
                    <input type="submit" name="ajouter" value="Ajouter Au Panier">
                    <input type="button" value="Acheter">
                </div>
            </div>
        </div>

                <?php endforeach; ?> 
                </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
<?php
if(isset($_POST['ajouter'])){
    $qtc = htmlspecialchars(strip_tags($_POST['QTS']));
        if(isset($_SESSION['produitPanier'][$idProduit])){
            $_SESSION['produitPanier'][$idProduit] += $qtc;
        }else{
            $_SESSION['produitPanier'][$idProduit] = $qtc;
        }
        header("Location: ./");

}
ob_end_flush();

?>