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
                        <li><a href="<?= URL_BASE ?>/Cours/listCours">Cours</a></li>
                        <li class="active"><?php if (isset($sub_title)) echo $sub_title; ?></li>    
                    </ol> 

                </div>
                <div id="page-inner">
                    <div class="panel-body">
                        <div class="col-lg-6">
                            
                                  <!--   Formulaire de modification d'une matière -->    
                                <form role="form" action="<?= URL_BASE.'/Cours/'.$functionUrl?>" method="POST">
                                    
                                        <div class="form-group">
                                            <label>Date du cours</label>
                                            <?php if(isset($mat)){ foreach ($mat as $m):?>
                                             <input class="form-control" type="hidden" name="courId" value="<?= $m['courId'] ?>">
                                            <?php endforeach;} ?>
                                                 <input class="form-control" type="date" name="courDate" value="<?php if(isset($mat)){ foreach ($mat as $m): echo $m['courDate']; endforeach;} ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Heure de début du cours</label>
                                            <input class="form-control" type="time" name="courHD" value="<?php if(isset($mat)){ foreach ($mat as $m): echo $m['courHD']; endforeach;} ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Duree du cours</label>
                                            <input class="form-control"  name="courduree" value="<?php if(isset($mat)){ foreach ($mat as $m): echo $m['courduree']; endforeach;} ?>">
                                        </div>

                                        
                                        
                                        <div class="form-group">
                                            <label>Type de cours</label>
                                            <select name="typeCourId">
                                               <?php foreach ($forms1 as $f) : ?>
                                                <option value="<?= $f['typeCourId']?>"
                                                 <?php if(isset($mat)){ 
                                                     foreach ($mat as $m):
                                                        if($f['typeCourId']==$m['typeCourId']):
                                                             echo 'selected';
                                                        endif;
                                                 endforeach;}?>>
                                                 <?= $f['libelle']?>
                                                </option>
                                               <?php endforeach; ?>  
                                           </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Matiere</label>
                                            <select name="matiereId">
                                               <?php foreach ($forms as $f) : ?>
                                                <option value="<?= $f['matiereId']?>"
                                                 <?php if(isset($mat)){ 
                                                     foreach ($mat as $m):
                                                        if($f['matiereId']==$m['matiereId']):
                                                             echo 'selected';
                                                        endif;
                                                 endforeach;}?>>
                                                 <?= $f['matiereNom']?>
                                                </option>
                                               <?php endforeach; ?>  
                                           </select>
                                        </div>

                                        <div class="form-group">
                                            <label>vacataires</label>
                                            <select name="vacataireId">
                                               <?php foreach ($forms2 as $f) : ?>
                                                <option value="<?= $f['vacataireId']?>"
                                                 <?php if(isset($mat)){ 
                                                     foreach ($mat as $m):
                                                        if($f['vacataireId']==$m['vacataireId']):
                                                             echo 'selected';
                                                        endif;
                                                 endforeach;}?>>
                                                 <?= $f['vacataireNom']." ".$f['vacatairePrenom']?>
                                                </option>
                                               <?php endforeach; ?>  
                                           </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Responsable Administratif</label>
                                            <select name="respAdminId">
                                               <?php foreach ($forms3 as $f) : ?>
                                                <option value="<?= $f['respAdminId']?>"
                                                 <?php if(isset($mat)){ 
                                                     foreach ($mat as $m):
                                                        if($f['respAdminId']==$m['respAdminId']):
                                                             echo 'selected';
                                                        endif;
                                                 endforeach;}?>>
                                                 <?= $f['respAdminNom']?>
                                                </option>
                                               <?php endforeach; ?>  
                                           </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Remuneration</label>
                                            <select name="remunerationId">
                                               <?php foreach ($forms4 as $f) : ?>
                                                <option value="<?= $f['remunerationId']?>"
                                                 <?php if(isset($mat)){ 
                                                     foreach ($mat as $m):
                                                        if($f['remunerationId']==$m['remunerationId']):
                                                             echo 'selected';
                                                        endif;
                                                 endforeach;}?>>
                                                 <?= $f['remunerationId']?>
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