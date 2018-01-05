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
                        <li><a href="#">Remuneration</a></li>
                        
                    </ol> 

                </div>
                <div id="page-inner">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des Remunerations <a href="<?= URL_BASE ?>/Remuneration/ajoutRemuneration/"><button class="btn-default pull-right <?php if(isset($classe)){ echo $classe ;}?>">Ajouter une rémunearation</button></a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Identifient</th>
                                            <th>Date de debut</th>
                                            <th>Date de fin</th>
                                            <th>Responsable Financier</th>
                                            <th>Controleur de gestion</th>
                                            <th class="<?php if(isset($classe)){ echo $classe ;}?>">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php foreach ($list as $l) {?>  
                                       <tr class="gradeX">
                                            <td><?= $l['remunerationId'] ?></td>
                                            <td><?= $l['dateD'] ?></td>
                                            <td><?= $l['dateF'] ?></td>
                                            <td><?php $m = new ModelRespFinancier(); $r = $m->getOne($l['respFinId']); echo ($r[0]['respFinNom'])  ?></td>
                                            <td><?php $m = new ModelContGestion(); $r = $m->getOne($l['controleurId']); echo ($r[0]['controleurNom']) ?></td>
                                            <td class="<?php if(isset($classe)){ echo $classe ;}?>">
                                                <button class="btn-danger" onclick="supprimerRemuneration(<?= $l['remunerationId']?>)">Supprimer</button>
                                                <a href="<?= URL_BASE.'/Remuneration/modifRenumeration?remunerationId='.$l['remunerationId']?>"><button class="btn-default">Modifier</button></a>
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