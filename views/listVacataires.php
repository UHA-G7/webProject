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
                        <li><a href="#">Utilisateurs</a></li>
                        <li class="active"><a href="#">Vacataires</a></li>
                        
                    </ol> 

                </div>
                <div id="page-inner">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des vacataires <a href="<?= URL_BASE ?>/Vacataire/ajoutVacataire/"><button class="btn-default pull-right">Ajouter un vacataire</button></a>
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
                                            <th>Adresse</th>
                                            <th>Phone</th>
                                            <th>E-mail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php foreach ($list as $l) {?>  
                                       <tr class="gradeX">
                                            <td><?= $l['vacataireId'] ?></td>
                                            <td><?= $l['vacataireNom'] ?></td>
                                            <td><?= $l['vacatairePrenom'] ?></td>
                                            <td><?= $l['vacataireAdresse'] ?></td>
                                            <td><?= $l['vacatairePhone'] ?></td>
                                            <td><?= $l['vacataireEmail'] ?></td>
                                            <td>
                                                <button class="btn-danger" onclick="supprimerVac(<?= $l['vacataireId']?>)">Supprimer</button>
                                                <a href="<?= URL_BASE.'/Vacataire/modifVacataire?vacId='.$l['vacataireId']?>"><button class="btn-default">Modifier</button></a>
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