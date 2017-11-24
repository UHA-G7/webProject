<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>UHA: Gestion des Vacataires</title>
        <?php include_once 'inc/top.php'; ?>  

    </head>

    <body>
        <div id="wrapper">

            <?php include_once 'inc/header.php'; ?> 
            <div id="page-wrapper">
                <div class="header"> 
                    <h1 class="page-header">
                        UHA <small>Gestion des Vacataires</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?= URL_BASE ?>">Accueil</a></li>
                        <li><a href="<?= URL_BASE ?>/ContGestion/lists/">Controleurs Gestion</a></li>
                        <li class="active"><?php if (isset($sub_title)) echo $sub_title; ?></li>   

                    </ol> 

                </div>
                <div id="page-inner">
                    <div class="panel-body">
                        <div class="col-lg-6">

                            <!--   Formulaire d'ajout d'un Utilisateur -->    
                            <form role="form" action="<?= URL_BASE.'/ContGestion/'.$functionUrl?>" method="POST">
                               
                                <?php if(isset($ctrl)){ foreach ($ctrl as $c):?>
                                             <input class="form-control" type="hidden" name="userId"  value="<?= $c['controleurId']; ?>">                                            
                                         <?php endforeach;} ?>
                                <div class="form-group">
                                    <label>Nom </label>
                                    <input class="form-control" type="text" value="<?php if(isset($ctrl)){ foreach ($ctrl as $c): echo $c['controleurNom']; endforeach;} ?>"  name="userNom" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Prénom</label>
                                    <input class="form-control" value="<?php if(isset($ctrl)){ foreach ($ctrl as $c): echo $c['controleurPrenom']; endforeach;} ?>"  type="text" name="userPrenom" required="required">
                                </div>
                               
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <input class="form-control" value="<?php if(isset($ctrl)){ foreach ($ctrl as $c): echo $c['controleurAdresse']; endforeach;} ?>"   type="text" name="userAddr" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input class="form-control" value="<?php if(isset($ctrl)){ foreach ($ctrl as $c): echo $c['controleurPhone']; endforeach;} ?>"  type="number" name="userPhone" required="required">
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" value="<?php if(isset($ctrl)){ foreach ($ctrl as $c): echo $c['controleurEmail']; endforeach;} ?>"  type="email" name="userEmail" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Mot de passe</label>
                                    <input class="form-control" value="<?php if(isset($ctrl)){ foreach ($ctrl as $c): echo $c['controleurPasse']; endforeach;} ?>"  type="password"  name="userPwd" required="required">
                                </div>
                                <button type="submit" class="btn btn-default">Enregistrer</button>

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