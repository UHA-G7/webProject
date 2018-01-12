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
                        <li><a href="#">Cours</a></li>
                        
                    </ol> 

                </div>
                <div id="page-inner">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des cours <a href="<?= URL_BASE ?>/Cours/ajoutCours/"><button class="btn-default pull-right <?php if(isset($classe)){ echo $classe ;}?>">Ajouter un cours</button></a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Identifient</th>
                                            <th>Nom de la matière</th>
                                            <th>Type de cours</th>
                                            <th>Date du cours</th>
                                            <th>Duree du cours</th>
                                            <th>Heure de debut</th>
                                            <th>Vacataire</th>
                                            <th>Formation</th>
                                            <th>Validation</th>
                                            <th>Paiement</th>
                                            <th class="<?php if(isset($classe)){ echo $classe ;}?>">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php foreach ($list as $l) {?>  
                                       <tr class="gradeX">
                                            <td><?= $l['courId'] ?></td>
                                            <td>
                                               <?php foreach ($mats as $mat){
                                                  if($l['matiereId']==$mat['matiereId'])
                                                        {
                                                           echo $mat['matiereNom'];
                                                         }
                                                   } ?>
                                            </td>
                                            <td>
                                               <?php foreach ($types as $t){
                                                  if($l['typeCourId']==$t['typeCourId'])
                                                        {
                                                           echo $t['libelle'];
                                                         }
                                                   } ?>
                                            </td>
                                            <td><?= $l['courDate'] ?></td>
                                            <td><?= $l['courduree'] ?></td>
                                            <td><?= $l['courHD'] ?></td>
                                            <td>
                                               <?php foreach ($vacs as $v){
                                                  if($l['vacataireId']==$v['vacataireId'])
                                                        {
                                                           echo $v['vacataireNom']." ".$v['vacatairePrenom'];
                                                         }
                                                   } ?>
                                            </td>
                                            <td>
                                                   <?php foreach ($resps as $r){
                                                       if($r['respAdminId']==$l['respAdminId']){
                                                           foreach ($forms as $forma){
                                                               if($r['formationId']==$forma['formationId']){
                                                                   echo $forma['formationNom'];
                                                               }
                                                           }
                                                       }
                                                   }  ?>
                                            </td>
                                            <td><?php if(($l['valide'] == 0) && ($_SESSION['profile']=="Controleur Gestion")) { ?>
                                                <button class="btn btn-primary" onclick="validerCours(<?= $l['courId']?>)">Valider</button>
                                                <?php }
                                                else if(($l['valide'] == 1)) echo "Validé" ?>
                                            </td>
                                            <td><?php if($l['valide'] == 1 && $l['payer'] == 0 && $_SESSION['profile']=="Responsable Financier") { ?>
                                                <button class="btn btn-primary" onclick="payerCours(<?= $l['courId']?>)">Payer</button>
                                                <?php }
                                                else if($l['valide'] == 0 ){
                                                    echo "";
                                                }
                                                else if($l['valide'] == 1 && $l['payer'] == 1 ) echo "Payé" ?>
                                            </td>

                                            <td class="<?php if(isset($classe)){ echo $classe ;}?>">
                                                <button class="btn-danger" onclick="supprimerCours(<?= $l['courId']?>)">Supprimer</button>
                                                
                                                <a href="<?= URL_BASE.'/Cours/modifCours?coursId='.$l['courId']?>"><button class="btn-default">Modifier</button></a>
                                            </td>
                                            
                                        </tr>
                                       <?php } ?>  
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    
                <?php include_once 'inc/footer.php'; ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
        </div>
        <?php include_once 'inc/js.php'; ?> 

    </body>

</html>