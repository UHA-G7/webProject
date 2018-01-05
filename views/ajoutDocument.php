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
                        <li><a href="<?= URL_BASE ?>/Documents/listDocumentss">Documents</a></li>
                        <li class="active"><?php if (isset($sub_title)) echo $sub_title; ?></li>    
                    </ol> 

                </div>
                <div id="page-inner">
                    <div class="panel-body">
                        <div class="col-lg-6">
                            
                                  <!--   Formulaire de modification d'une docière -->    
                                <form role="form" action="<?= URL_BASE.'/Documents/'.$functionUrl?>" method="POST" enctype="multipart/form-data">
                                    
                                        <div class="form-group">
                                            <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                                            <label>Libellé du document</label>
                                            <?php if(isset($doc)){ foreach ($doc as $d):?>
                                             <input class="form-control" type="hidden" name="docId" value="<?= $d['documentId'] ?>">
                                            <?php endforeach;} ?>
                                                 <input class="form-control" type="text"  name="docNom" value="<?php if(isset($doc)){ foreach ($doc as $d): echo $d['libelle']; endforeach;} ?>">
                                        </div>
                                    <div class="form-group">
                                        <input class="form-control" type="file"  name="document" value="<?php if(isset($doc)){ foreach ($doc as $d): echo $d['documentUrl']; endforeach;} ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Vacatire</label>
                                            <select name="vacId">
                                               <?php foreach ($vacs as $v) : ?>
                                                <option value="<?= $v['vacataireId']?>"
                                                 <?php if(isset($doc)){ 
                                                     foreach ($doc as $d):
                                                         if($v['vacataireId']==$d['vacataireId']):
                                                             echo 'selected';
                                                        endif;
                                                    endforeach;}
                                                    if(isset($_SESSION['id']) && $_SESSION['id']== $v['vacataireId']): echo 'selected'; endif;
                                                
                                                        ?>>
                                                     <?= $v['vacataireNom']." ".$v['vacatairePrenom']?>
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