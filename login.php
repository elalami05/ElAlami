<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>login - myshop </title>
    <link rel="stylesheet" href="./CSS/styleLogin.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
<h1>Connexion</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
                <div class="col-md-6">
                 <br>
                <form id="frm" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email </label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="motdepass" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="motdepasse" required>
                    </div>

                    <input type="submit" name="envoyer" id="btn" class="btn btn-danger" value="Se connecter" />
                </form>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>

</body>
</html>

<?php
if(isset($_POST['envoyer']))
{
    include "config/commandes.php";
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $motdepasse = htmlspecialchars(strip_tags($_POST['motdepasse']));
        
    $admin = verifierAdmin($email,$motdepasse);
    $user = verifierUtilisateur($email,$motdepasse);
     
    if($admin){
        $_SESSION['wkdj'] = $admin['id'];
        header("Location: admin/index.php");         
    }else if($user){
        $_SESSION['utilisateurActuel'] = $user;
        header("Location: index.php");    
    } 
    else{
        echo "IL y a un probleme !";
    }
}
?>