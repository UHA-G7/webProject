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
                        <li><a href="#">Utilisateurs</a></li>
                        <li class="active"><a href="#">Responsables Administratifs</a></li>
                        
                    </ol> 

                </div>
                <div id="page-inner">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des Responsables Administratifs <a href="<?= URL_BASE ?>/RespAdministratif/add/"><button class="btn-default pull-right <?php if(isset($classe)){ echo $classe ;}?>">Ajouter un Responsable Administratif</button></a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Identifient</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Adresse</th>                                            
                                            <th>Phone</th>
                                            <th>E-mail</th>
                                            <th class="<?php if(isset($classe)){ echo $classe ;}?>">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php foreach ($list as $l) {?>  
                                       <tr class="gradeX">
                                            <td><?= $l['respAdminId'] ?></td>
                                            <td><?= $l['respAdminNom'] ?></td>
                                            <td><?= $l['respAdminPrenom'] ?></td>
                                            <td><?= $l['respAdminAdresse'] ?></td>
                                            <td><?= $l['respAdminPhone'] ?></td>
                                            <td><?= $l['respAdminEmail'] ?></td>
                                            <td class="<?php if(isset($classe)){ echo $classe ;}?>">
                                                <button class="btn-danger" onclick="supprimerRespAdministratif(<?= $l['respAdminId']?>)">Supprimer</button>
                                                <a href="<?= URL_BASE.'/RespAdministratif/update?userId='.$l['respAdminId']?>"><button class="btn-default">Modifier</button></a>
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