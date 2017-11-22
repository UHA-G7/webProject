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
                        <li><a href="<?= URL_BASE ?>/Matiere/listMatieres">Matières</a></li>
                        <li class="active"><?php if (isset($sub_title)) echo $sub_title; ?></li>    
                    </ol> 

                </div>
                <div id="page-inner">
                    <div class="panel-body">
                        <div class="col-lg-6">
                            
                                  <!--   Formulaire de modification d'une matière -->    
                                <form role="form" action="<?= URL_BASE.'/Matiere/'.$functionUrl?>" method="POST">
                                    
                                        <div class="form-group">
                                            <label>Nom de la Matière</label>
                                            <?php if(isset($mat)){ foreach ($mat as $m):?>
                                             <input class="form-control" type="hidden" name="matId" value="<?= $m['matiereId'] ?>">
                                            <?php endforeach;} ?>
                                                 <input class="form-control"  name="matNom" value="<?php if(isset($mat)){ foreach ($mat as $m): echo $m['matiereNom']; endforeach;} ?>">
                                        </div>
                                        <div class="form-group">
                                            <select name="formaId">
                                               <?php foreach ($forms as $f) : ?>
                                                <option value="<?= $f['formationId']?>"
                                                 <?php if(isset($mat)){ 
                                                     foreach ($mat as $m):
                                                        if($f['formationId']==$m['formationId']):
                                                             echo 'selected';
                                                        endif;
                                                 endforeach;}?>>
                                                 <?= $f['formationNom']?>
                                                </option>
                                               <?php endforeach; ?>  
                                           </select>
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