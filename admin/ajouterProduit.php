<?php
ob_start();
require("../config/commandes.php");
if(!isset($_SESSION['wkdj'])){
    header("Location: ../login.php");
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
<?php require ("../public/headerAdmin.php") ?>
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
</body>
</html>

<?php 
if(isset($_POST['valider'])){
    $image = htmlspecialchars(strip_tags($_POST['image']));
    $nom = htmlspecialchars(strip_tags($_POST['nom']));
    $qts = htmlspecialchars(strip_tags($_POST['quantites']));
    $prix = htmlspecialchars(strip_tags($_POST['prix']));
    $desc = htmlspecialchars(strip_tags($_POST['decsription']));
    ajouter($image, $nom, $prix, $desc, $qts);

}

?>