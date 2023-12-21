<?php 
function ajouter($image, $nom, $prix, $desc, $qts)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("INSERT INTO produit (image, nom, prix, description,Quantites) VALUES (?, ?, ?, ?,?)");

    $req->execute(array($image, $nom, $prix, $desc, $qts));

    $req->closeCursor();
  }
}


function afficher()
{
    if(require("connexion.php"))
    {
        $req=$access->prepare("SELECT * FROM produit ORDER BY id DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
        
    }
}


function afficherUser()
{
    if(require("connexion.php"))
    {
        $req=$access->prepare("SELECT * FROM utilisateur ORDER BY id DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
        
    }
}

function afficherUnProduit($id)
{
  if(require("connexion.php"))
  {
    $req=$access->prepare("SELECT * FROM produit WHERE id = ?");

    $req->execute(array($id));

    $data = $req->fetchAll(PDO::FETCH_OBJ);

    return $data;

    $req->closeCursor();
    
}}

function getProduitById($id)
{
  if(require("connexion.php"))
  {
    $req=$access->prepare("SELECT * FROM produit WHERE id = ?");

    $req->execute(array($id));
    $Produit = $req->fetch(PDO::FETCH_ASSOC);
    return $Produit;

    $req->closeCursor();
    
}

}


function supprimer($id)
{
    if(require("connexion.php")){
        $req=$access->prepare("DELETE FROM produit WHERE id=?");

        $req->execute(array($id));

        $req->closeCursor();

    }else{
      return false;
    }

}

function modifier($id,$image, $nom, $prix, $desc, $qts)
{
    if(require("connexion.php")){
        $req=$access->prepare("UPDATE produit SET image=$image , nom=$nom , prix=$prix , description=$desc , Quantites = $qtcWHERE  id=?");

        $req->execute(array($id));

        $req->closeCursor();

    }else{
      return false;
    }

}

function verifierAdmin($email,$motdepasse)
{
  if(require("connexion.php"))
  {
    $req=$access->prepare("SELECT * FROM admin WHERE email = ? AND motdepasse = ?;");
    
    $req->execute(array($email ,$motdepasse));

    if($req->rowCount() == 1){

      $data = $req->fetch();

      return $data;
    }
    if($req->rowCount() == 0){
      return false;
    }
    
    $req->closeCursor();
  }
}

function verifierUtilisateur($email,$motdepasse)
{
  if(require("connexion.php"))
  {
    $req=$access->prepare("SELECT email,motdepasse FROM utilisateur WHERE email = ? AND motdepasse = ?;");
    
    $req->execute(array($email ,$motdepasse));

    if($req->rowCount() == 1){

      $data = $req->fetch();

      return $data;
    }else{
      return false;
    }

    $req->closeCursor();
  }
}

function ajouterUtilisateur($pseudo ,$email ,$motdepasse){

  if(require("connexion.php"))
  {
    $req = $access->prepare("INSERT INTO utilisateur (pseudo, email, motdepasse) VALUES (?, ?, ?)");

    $req->execute(array($pseudo, $email, $motdepasse));

    $req->closeCursor();
  }
}

function supprimerUser($id){
  if(require("connexion.php"))
  {
    $req = $access->prepare("DELETE FROM utilisateur WHERE id = ?;");

    $req->execute(array($id));

    $req->closeCursor();
  }
}

// session_start();
function quantiterPanier(){
   if(isset($_SESSION['panier'])){
     $compteElement = count($_SESSION['panier']);
   }else{
    $compteElement = 0;
  }

    
  return $compteElement;
}
function ajoutPanier($id,$quantite){
  $_SESSION['panier'][$id]= $quantite;
 header('Location: ./boutique.php');
}


function getAllPanier(){
  return $_SESSION['produitPanier'];  
}
?>
