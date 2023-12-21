<?php
include("public/header.php");
$Produits =afficher();
$totals=0;

$paniers = getAllPanier();
if(isset($_POST['modifierProduit'])){
    $id = $_POST['id_produit'];
    $quantiteDemander = $_POST['quantiterDemander'];
    ajoutPanier($id,$quantiteDemander);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamer Shop</title>
</head>
<body>

    <?php if(isset($_POST['panier'])){?>
        <h1>Votre Panier est vide</h1>
        <?php }else{?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Votre Panier </h2>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>image</th>
                    <th>Nom</th>
                    <th>Prix Unitaire</th>
                    <th>Quantites :</th>
                    <th>Action </th>
                </tr>
                </thead>
                <tbody>
                <?php 

$total=0;
$totals=0;
foreach ($paniers as $idproduit => $quantiterDemander) {
        $produit = getProduitById($idproduit);
        $total = $quantiterDemander*$produit['prix'];
        $totals +=$total;
        $idProd=$produit["id"];
        ?>
        <form method="post">
                    <tr>
                        <td ><img style="width:20px;margin-left:45px;" src="<?= $produit["image"] ?>" ></td>
                        <td><?= $produit["nom"] ?></td>
                        <td><?= $produit["prix"] ?>$</td>
                        <td><?= $quantiterDemander ?></td>
                        <td><button class="btn " name="supprimer<?=$idProd?>" type="submit" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
</svg></button></td>
                      
                    </tr>
</form>
<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php };?>
        <br>
        <div class="text-success col-auto text-center">
            <h3>Total: <?php  echo $totals ?>$</h3>
        </div>
        <form method="post">
        
        <div style="display: flex; justify-content: center; align-items: center; ">
        <button class="btn btn-warning" name="payer" type="submit" >payer</button>
        </div>
<?php if (isset($_POST['payer'])){?>
        <div id="paypal-payment-button"></div>
        <script src="https://www.paypal.com/sdk/js?client-id=AWGSEJUMQgafy_eNVxzN22Yuh45Gr4MKGGCV6lDnNZ_FFAhVPsBfJ2sdPMlChn1GHEPUdQO98Vs6t9hV&currency=CAD"></script>
<script src="./public/paypal.js"></script>
<?php };?>
</body>
</html>
<?php 

foreach ($paniers as $idproduit => $quantiterDemander) {
    $produit = getProduitById($idproduit);
    $idProd=$produit["id"];
    if(isset($_POST["supprimer$idProd"])){
$index = array_search($quantiterDemander, $paniers);
if ($index !== false) {

    unset($paniers[$index]);
    $a =$paniers[$index];
    echo "$a";
    break;
}
       
    }
    }
?>