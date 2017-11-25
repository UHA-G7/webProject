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
                    </ol> 

                </div>
                <div id="page-inner">
                     <?php //if(isset($message)):?>
                   <!-- <div class="row message" id="message" >
                        <div class="col-md-10 ">
                            <?= $message; ?>
                        </div>
                    </div>-->
                    <?php //endif; ?>
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="panel panel-primary text-center no-boder blue">
                                <div class="panel-left pull-left blue">
                                    <i class="fa fa-archive fa-5x"></i>

                                </div>
                                <div class="panel-right">
                                    <h3><?= $nb_fac ;?></h3>
                                    <strong> Facultés</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="panel panel-primary text-center no-boder blue">
                                <div class="panel-left pull-left blue">
                                    <i class="fa fa-folder fa-5x"></i>
                                </div>

                                <div class="panel-right">
                                    <h3><?= $nb_forma ;?> </h3>
                                    <strong> Formations</strong>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="panel panel-primary text-center no-boder blue">
                                <div class="panel-left pull-left blue">
                                    <i class="fa fa fa-book fa-5x"></i>

                                </div>
                                <div class="panel-right">
                                    <h3><?= $nb_mat;?> </h3>
                                    <strong> Matères </strong>

                                </div>
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