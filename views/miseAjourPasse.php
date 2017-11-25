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
                        <li><a href="<?= URL_BASE ?>/Faculte/listFacultes">Profil</a></li>                   
                        <li class="active">Modification du Mot de passe</li>                                            
                    </ol> 

                </div>
                <div id="page-inner">
                    <div class="row message2" id="message">
                        
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-6">

                            <form role="form"  id="changePwd" action="<?= URL_BASE.'/Connexion/doUpdatePwd' ?>" method="POST">
                               
                                    <div class="form-group">
                                        
                                        <?php if(isset($usr)){ foreach ($usr as $u):?>
                                             <input class="form-control" type="hidden" name="userId"  value="<?= $u[0]; ?>">                                            
                                         <?php endforeach;} ?>
                                            <label>Nouveau Mot de passe</label>
                                            <input class="form-control"  name="userPwd" type="password" id="pass1">
                                                <label>Confirmer le Mot de passe</label>
                                                <input class="form-control"  name="userPwd2" type="password" id="pass2" >
                                    </div>
                               
                                <button onclick="checkPwd();" class="btn btn-default">Enregistrer</button>

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