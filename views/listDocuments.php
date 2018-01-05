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
                        <li><a href="#">Documents</a></li>
                        
                    </ol> 

                </div>
                <div id="page-inner">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des Documents <a href="<?= URL_BASE ?>/Documents/add/"><button class="btn-default pull-right <?php if(isset($classe)){ echo $classe ;}?>">Ajouter un document</button></a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Identifient</th>
                                            <th>libellé</th>
                                            <th>Document</th>
                                            <th>Vacataire</th>                                            
                                            <th class="<?php if(isset($classe)){ echo $classe ;}?>">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php foreach ($list as $l) {?>  
                                       <tr class="gradeX">
                                            <td><?= $l['documentId'] ?></td>
                                            <td><?= $l['libelle'] ?></td>
                                            <td><a href="<?= URL_BASE.'/assets/documents/'. $l['documentUrl'] ?>"><img src="<?= URL_BASE.'/assets/documents/'. $l['documentUrl'] ?>" width="80" height="70"></a></td>
                                            <td>
                                               <?php foreach ($vacs as $v){
                                                  if($l['vacataireId']==$v['vacataireId'])
                                                        {
                                                           echo $v['vacataireNom']." ".$v['vacatairePrenom'];
                                                         }
                                                   } ?>
                                            </td>
                                            <td class="<?php if(isset($classe)){ echo $classe ;}?>">
                                                <button class="btn-danger" onclick="supprimerDocument(<?= $l['documentId']?>)">Supprimer</button>
                                             
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