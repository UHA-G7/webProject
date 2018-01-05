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
                        <li><a href="<?= URL_BASE ?>/TypeCours/listTypeCours">Type de Cours</a></li>
                        <li class="active"><?php if (isset($sub_title)) echo $sub_title; ?></li>    
                    </ol> 

                </div>
                <div id="page-inner">
                    <div class="panel-body">
                        <div class="col-lg-6">
                            
                                  <!--   Formulaire de modification d'une matière -->    
                                <form role="form" action="<?= URL_BASE.'/TypeCours/'.$functionUrl?>" method="POST">
                                    
                                        <div class="form-group">
                                            <label>Libéllé du type de cours</label>
                                            <?php if(isset($mat)){ foreach ($mat as $m):?>
                                             <input class="form-control" type="hidden" name="typeCourId" value="<?= $m['typeCourId'] ?>">
                                            <?php endforeach;} ?>
                                                 <input class="form-control"  name="libelle" value="<?php if(isset($mat)){ foreach ($mat as $m): echo $m['libelle']; endforeach;} ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Prix par heure du type de cours</label>
                                            <?php if(isset($mat)){ foreach ($mat as $m):?>
                                             <input class="form-control" type="hidden" name="typeCourId" value="<?= $m['typeCourId'] ?>">
                                            <?php endforeach;} ?>
                                                 <input class="form-control"  name="prixHeure" value="<?php if(isset($mat)){ foreach ($mat as $m): echo $m['prixHeure']; endforeach;} ?>">
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