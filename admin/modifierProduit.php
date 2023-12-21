<?php 
session_start();
if(!isset($_SESSION['wkdj'])){
    header("Location: ../login.php");
}
require("../config/commandes.php");
if(isset($_SESSION['idProduit'])){
    $idProd = $_SESSION['idProduit'];
    $Produits = afficherUnProduit($idProd);
}else{
  $Produits = afficher();
}



?>
<!DOCTYPE html>
<html >
<head>
    <title>Suprimer des produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
<?php include("../public/headerAdmin.php");?>
  <div class="album py-5 bg-body-tertiary">
    <table>
      <tr>
        <td style="width:1000px">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <form id="frm" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">titre de l'image</label>
                    <input type="name" class="form-control" name="image" value="" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
                    <input type="text" class="form-control" name="nom"  required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Quantites du produit</label>
                    <input type="number" class="form-control" name="quantites"  required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Prix</label>
                    <input type="number" class="form-control" name="prix"  required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Decsription</label>
                    <textarea class="form-control" name="decsription" required ></textarea>
                </div>

                <button type="submit" name="valider" id="btn" class="btn btn-danger">Ajouter un nouveau produit</button>
            </form>
</td>
<td style="width:1000px;padding=0;">
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php if(!isset($idProd)) {
        foreach($Produits as $produit): ?>
        <div class="col">
          <div class="card shadow-sm">
            <title>
            </title>
            <img src="<?=  $produit->image ?>" style="width: 100px;height:150px;margin:auto;" >
            <div class="card-body">
              <p class="card-text"><?= $produit->id  ?></p>
              <p class="card-text"><?= $produit->nom  ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-body-secondary"><?= $produit->prix ?>$</small>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach;}else{
            foreach($Produits as $produit):?>
            <div class="col">
            <div class="card shadow-sm">
              <title>
              </title>
              <img src="<?=  $produit->image ?>" style="width: 100px;height:150px;margin:auto;" >
              <div class="card-body">
                <p class="card-text"><?= $produit->id  ?></p>
                <p class="card-text"><?= $produit->nom  ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-body-secondary"><?= $produit->prix ?>$</small>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach;}?>
      </div>
    </div>
            </td>
            </tr>
            </table>
</div>

</body>
</html>
<?php

if(isset($_POST['valider']))
{
  if(isset($_POST['idProduit']))
  {
  if(!empty($_POST['idProduit'] AND is_numeric($_POST['idProduit'])) )
      {
          $idProd = htmlspecialchars(strip_tags($_POST['idProduit']));
          $image = htmlspecialchars(strip_tags($_POST['image']));
          $nom = htmlspecialchars(strip_tags($_POST['nom']));
          $qts = htmlspecialchars(strip_tags($_POST['quantites']));
          $prix = htmlspecialchars(strip_tags($_POST['prix']));
          $desc = htmlspecialchars(strip_tags($_POST['decsription']));
        try 
        {
            modifier($idProd,$image, $nom, $prix, $desc, $qts);
        } 
        catch (Exception $e) 
        {
            $e->getMessage();
        }

      }
  }
}

?>