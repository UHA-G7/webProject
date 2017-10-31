<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>UHA: Gestion dees vacataires</title>
        <?php include_once 'inc/top.php'; ?>  

    </head>

    <body>
        <div id="wrapper">

            <?php include_once 'inc/header.php'; ?> 
            <div id="page-wrapper">
                <div class="header"> 
                    <h1 class="page-header">
                        UHA <small>Gestion des vacataires</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?= URL_BASE ?>">Accueil</a></li>
                        <li><a href="<?= URL_BASE ?>/User/listUsers/">Utilisateurs</a></li>
                        <li class="active">Ajout d'un utilisateur</li>

                    </ol> 

                </div>
                <div id="page-inner">
                    <div class="panel-body">
                        <div class="col-lg-6">

                            <!--   Formulaire d'ajout d'un Utilisateur -->    
                            <form role="form" action="<?= URL_BASE ?>/User/ajoutUser" method="POST">
                                <div class="form-group">
                                    <label>Nom </label>
                                    <input class="form-control" type="text"  name="userNom">
                                </div>
                                <div class="form-group">
                                    <label>Prénom</label>
                                    <input class="form-control"  type="text" name="userPrenom">
                                </div>
                                <div class="form-group">
                                    <label>Profile</label>
                                    <input class="form-control" type="text" name="userProfile">
                                </div>
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input class="form-control"type="number" name="userPhone">
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input class="form-control"type="email" name="userEmail">
                                </div>
                                <div class="form-group">
                                    <label>Mot de passe</label>
                                    <input class="form-control" type="password"  name="userEmail">
                                </div>
                                <button type="submit" class="btn btn-default">Ajouter</button>

                            </form>

                        </div>                      
                    </div>
                    <?php include_once 'inc/footer.php'; ?>
                </div>
            </div>
        </div>
        <?php include_once 'inc/js.php'; ?> 

    </body>

</html>