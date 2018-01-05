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
                        <li><a href="<?= URL_BASE ?>/Remuneration/listRemunerations">Remuneration</a></li>
                        <li class="active"><?php if (isset($sub_title)) echo $sub_title; ?></li>    
                    </ol> 

                </div>
                <div id="page-inner">
                    <div class="panel-body">
                        <div class="col-lg-6">
                            
                                  <!--   Formulaire de modification d'une Remuneration -->    
                                <form role="form" action="<?= URL_BASE.'/Remuneration/'.$functionUrl?>" method="POST">
                                    
                                        <div class="form-group">
                                            <label>Date de debut du cours</label>
                                            <?php if(isset($mat)){ foreach ($mat as $m):?>
                                             <input class="form-control" type="hidden" name="remunerationId" value="<?= $m['remunerationId'] ?>">
                                            <?php endforeach;} ?>
                                                 <input class="form-control" type="time" name="dateD" value="<?php if(isset($mat)){ foreach ($mat as $m): echo $m['dateD']; endforeach;} ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Date de fin du cours</label>
                                            <?php if(isset($mat)){ foreach ($mat as $m):?>
                                             <input class="form-control" type="hidden" name="remunerationId" value="<?= $m['remunerationId'] ?>">
                                            <?php endforeach;} ?>
                                                 <input class="form-control" type="time" name="dateF" value="<?php if(isset($mat)){ foreach ($mat as $m): echo $m['dateF']; endforeach;} ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Responsable financier</label>
                                            <select name="respFinId">
                                               <?php foreach ($forms as $f) : ?>
                                                <option value="<?= $f['respFinId']?>"
                                                 <?php if(isset($mat)){ 
                                                     foreach ($mat as $m):
                                                        if($f['respFinId']==$m['respFinId']):
                                                             echo 'selected';
                                                        endif;
                                                 endforeach;}?>>
                                                 <?= $f['respFinNom']?>
                                                </option>
                                               <?php endforeach; ?>  
                                           </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Controller de Gestion</label>
                                            <select name="controleurId">
                                               <?php foreach ($form as $f) : ?>
                                                <option value="<?= $f['controleurId']?>"
                                                 <?php if(isset($mat)){ 
                                                     foreach ($mat as $m):
                                                        if($f['controleurId']==$m['controleurId']):
                                                             echo 'controleurId';
                                                        endif;
                                                 endforeach;}?>>
                                                 <?= $f['controleurNom']?>
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