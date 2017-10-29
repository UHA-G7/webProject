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
                        <li><a href="<?= URL_BASE ?>/Formation/listFormations/">Formations</a></li>
                        <?php if (isset($act) && ($act === 'add')) : ?>
                            <li class="active">Ajout d'une formation</li>
                        <?php endif; ?>
                        <?php if (isset($act) && ($act === 'modif')) : ?>
                            <li class="active">Modification d'une formation</li>
                        <?php endif; ?>
                    </ol> 

                </div>
                <div id="page-inner">
                    <div class="panel-body">
                        <div class="col-lg-6">
                            <?php if (isset($act) && ($act === 'add')) : ?>
                               <!--   Formulaire d'ajout d'une formation -->    
                                <form role="form" action="<?= URL_BASE ?>/Formation/actionAjoutFormation" method="POST">
                                    <div class="form-group">
                                        <label>Nom de la formation</label>
                                        <input class="form-control"  name="formaNom">
                                    </div>
                                    <div class="form-group">
                                        <label>Faculté</label>
                                        <select name="facId">
                                            <?php foreach ($facs as $f) : ?>
                                            <option value="<?= $f['faculteId']?>"><?= $f['faculteNom']?></option>
                                            <?php endforeach; ?>  
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-default">Ajouter</button>

                                </form>
                            <?php endif; ?>
                            <?php if (isset($act) && ($act === 'modif')) : ?>
                                 <!--   Formulaire de modification d'une formation -->    
                                <form role="form" action="<?= URL_BASE ?>/Formation/actionModiFormation" method="POST">
                                    <?php foreach ($form as $fo) { ?>
                                        <div class="form-group">
                                            <label>Nom de la formation</label>
                                            <input class="form-control" type="hidden" name="formaId" value="<?= $fo['formationId'] ?>">
                                            <input class="form-control"  name="formaNom" value="<?= $fo['formationNom'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <select name="facId">
                                               <?php foreach ($facs as $f) : ?>
                                                <option value="<?= $f['faculteId']?>" <?php if($f['faculteId']==$fo['faculteId']): echo 'selected'; endif; ?>><?= $f['faculteNom']?></option>
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