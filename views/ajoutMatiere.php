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
                        <?php if (isset($act) && ($act === 'add')) : ?>
                            <li class="active">Ajout d'une matière</li>
                        <?php endif; ?>
                        <?php if (isset($act) && ($act === 'modif')) : ?>
                            <li class="active">Modification d'une matière</li>
                        <?php endif; ?>
                    </ol> 

                </div>
                <div id="page-inner">
                    <div class="panel-body">
                        <div class="col-lg-6">
                            <?php if (isset($act) && ($act === 'add')) : ?>
                                 <!--   Formulaire d'ajout d'une matière -->    
                                <form role="form" action="<?= URL_BASE ?>/Matiere/actionAjoutMatiere" method="POST">
                                    <div class="form-group">
                                        <label>Nom de la matière</label>
                                        <input class="form-control"  name="matNom">
                                    </div>
                                    <div class="form-group">
                                        <label>Formation</label>
                                        <select name="formaId">
                                            <?php foreach ($forms as $f) : ?>
                                            <option value="<?= $f['formationId']?>"><?= $f['formationNom']?></option>
                                            <?php endforeach; ?>  
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-default">Ajouter</button>

                                </form>
                            <?php endif; ?>
                            <?php if (isset($act) && ($act === 'modif')) : ?>
                                  <!--   Formulaire de modification d'une matière -->    
                                <form role="form" action="<?= URL_BASE ?>/Matiere/actionModifMatiere" method="POST">
                                    <?php foreach ($mat as $m) { ?>
                                        <div class="form-group">
                                            <label>Nom de la Matière</label>
                                            <input class="form-control" type="hidden" name="matId" value="<?= $m['matiereId'] ?>">
                                            <input class="form-control"  name="matNom" value="<?= $m['matiereNom'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <select name="formaId">
                                               <?php foreach ($forms as $f) : ?>
                                                <option value="<?= $f['formationId']?>" <?php if($f['formationId']==$m['formationId']): echo 'selected'; endif; ?>><?= $f['formationNom']?></option>
                                               <?php endforeach; ?>  
                                           </select>
                                        </div>
                                    <?php } ?>
                                        <button type="submit" class="btn btn-default">Modifier</button>

                                </form>
                            <?php endif; ?>

                        </div>                      
                    </div>
                <?php include_once 'inc/footer.php'; ?>
                </div>
            </div>
        </div>
    <?php include_once 'inc/js.php'; ?> 

    </body>

</html>