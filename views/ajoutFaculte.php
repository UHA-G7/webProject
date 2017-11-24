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
                        <li><a href="<?= URL_BASE ?>/Faculte/listFacultes">Facultés</a></li>                   
                        <li class="active"><?php if (isset($sub_title)) echo $sub_title; ?></li>                                            
                    </ol> 

                </div>
                <div id="page-inner">
                    <div class="panel-body">
                        <div class="col-lg-6">

                            <form role="form" action="<?= URL_BASE.'/Faculte/'.$functionUrl ?>" method="POST">
                               
                                    <div class="form-group">
                                        <label>Nom de la faculté</label>
                                        <?php if(isset($fac)){ foreach ($fac as $f):?>
                                             <input class="form-control" type="hidden" name="facId"  value="<?= $f['faculteId']; ?>">                                            
                                         <?php endforeach;} ?>
                                            <input class="form-control"  name="facNom" 
                                                   value="<?php if(isset($fac)){ foreach ($fac as $f): echo $f['faculteNom'];endforeach;} ?>">
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