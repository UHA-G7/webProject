<nav class="navbar navbar-default top-navbar" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html"><strong>UHA-Vacataires</strong></a>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown <?php if($_SESSION['profile']!="Vacataire"){ echo 'hide' ;}?>">
            <a href="#" data-toggle="dropdown" ria-expanded="false" class="dropdown-toggle"> Documents <i class="fa fa-file-o"></i> </a>
            <ul class="dropdown-menu">
                <li >
                    <a href="<?= URL_BASE ?>/Documents/add/">Ajouter un document <i class="fa fa-plus "></i></a>
                </li>
                <li >
                    <a href="<?= URL_BASE ?>/Documents/documentsVacataire?vacid=<?= $_SESSION['id']?>">Mes documents <i class="fa fa-eye "></i></a>
                </li>
                
            </ul>
        </li>
        <li class="dropdown <?php if($_SESSION['profile']!="Vacataire"){ echo 'hide' ;}?>">
            <a href="<?= URL_BASE ?>/Cours/coursByVacataire/?vacid=<?= $_SESSION['id']?>" > Mes cours <i class="fa fa-file-o"></i> </a>
            
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
               <?= ' '.$_SESSION['profile']; ?> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                
                <li><a href="#"><i class="fa fa-user"></i> <strong><?= $_SESSION['nom'].' '.$_SESSION['prenom']; ?></strong></a>
                </li>
                <li><a href="<?= URL_BASE ?>/Connexion/updatePwd?userId=<?= $_SESSION['id']?>"><i class="fa fa-gear fa-fw"></i> Changer de Mot de passe</a>
                </li>
                <li class="divider"></li>
                <li><a href="<?= URL_BASE ?>/Connexion/logout"><i class="fa fa-sign-out fa-fw"></i> Deconnexion</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
</nav>
<!--/. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div id="sideNav" href=""><i class="fa fa-caret-right"></i></div>
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a class="active-menu" href="<?= URL_BASE ?>"><i class="fa fa-dashboard"></i> Accueil</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-sitemap"></i> Gestion des Utilisateurs<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Vacataires <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="<?php if(isset($classe)){ echo $classe ;}?>">
                                <a href="<?= URL_BASE ?>/Vacataire/ajoutVacataire/">Ajouter un vacataire <i class="fa fa-plus "></i></a>
                            </li>
                            <li>
                                <a href="<?= URL_BASE ?>/Vacataire/listVacataires/">Liste des vacataires <i class="fa fa-eye "></i></a>
                            </li>
                            

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Resp. Formations <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="<?php if(isset($classe)){ echo $classe ;}?>">
                                <a href="<?= URL_BASE ?>/RespFormation/add/">Ajouter <i class="fa fa-plus"></i></a>
                            </li>
                            <li>
                                <a href="<?= URL_BASE ?>/RespFormation/lists/">Voir <i class="fa fa-eye "></i></a>
                            </li>

                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Resp. Administratifs <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="<?php if(isset($classe)){ echo $classe ;}?>">
                                <a href="<?= URL_BASE ?>/RespAdministratif/add/">Ajouter <i class="fa fa-plus"></i></a>
                            </li>
                            <li>
                                <a href="<?= URL_BASE ?>/RespAdministratif/lists/">Voir <i class="fa fa-eye "></i></a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Resp. Financiers <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="<?php if(isset($classe)){ echo $classe ;}?>">
                                <a href="<?= URL_BASE ?>/RespFinancier/add/">Ajouter <i class="fa fa-plus"></i></a>
                            </li>
                            <li>
                                <a href="<?= URL_BASE ?>/RespFinancier/lists/">Voir <i class="fa fa-eye "></i></a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Controleurs Gestion <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="<?php if(isset($classe)){ echo $classe ;}?>">
                                <a href="<?= URL_BASE ?>/ContGestion/add/">Ajouter <i class="fa fa-plus"></i></a>
                            </li>
                            <li>
                                <a href="<?= URL_BASE ?>/ContGestion/lists/">Voir <i class="fa fa-eye "></i></a>
                            </li>

                        </ul>
                    </li>

                    <li class="<?php if(isset($classe ) || ($_SESSION['profile']=="Vacataire")){ echo $classe ;}?>">
                       <a href="#" ><i class="fa fa-sitemap"></i> Documents <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li >
                                <a href="<?= URL_BASE ?>/Documents/add/">Ajouter un document <i class="fa fa-plus "></i></a>
                            </li>
                            <li >
                                <a href="<?= URL_BASE ?>/Documents/lists/">Tous les documents <i class="fa fa-eye "></i></a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap"></i> Facultés<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php if(isset($classe)){ echo $classe ;}?>">
                        <a href="<?= URL_BASE ?>/Faculte/ajoutFaculte/">Ajouter une faculté</a>
                    </li>
                    <li>
                        <a href="<?= URL_BASE ?>/Faculte/listFacultes/">Liste des facultés</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href=""><i class="fa fa-sitemap"></i> Formations<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php if(isset($classe)){ echo $classe ;}?>">
                        <a href="<?= URL_BASE ?>/Formation/ajoutFormation/">Ajouter une formation</a>
                    </li>
                    <li>
                        <a href="<?= URL_BASE ?>/Formation/listFormations/">Liste des formation</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap"></i> Matières<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php if(isset($classe)){ echo $classe ;}?>">
                        <a href="<?= URL_BASE ?>/Matiere/ajoutMatiere/">Ajouter une matières</a>
                    </li>
                    <li>
                        <a href="<?= URL_BASE ?>/Matiere/listMatieres/">Liste des matières</a>
                    </li>

                </ul>
            </li>
            <!--<li>
                <a href="#"><i class="fa fa-sitemap"></i>Remuneration<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php //if(isset($classe)){ echo $classe ;}?>">
                        <a href="<?= URL_BASE ?>/Remuneration/ajoutRemuneration/">Ajouter une remuneration</a>
                    </li>
                    <li>
                        <a href="<?= URL_BASE ?>/Remuneration/listRemunerations/">Liste des remunerations</a>
                    </li>

                </ul>
            </li>-->
            <li class="<?php if(isset($classe)){ echo $classe ;}?>">
                <a href="#"><i class="fa fa-sitemap"></i>Type de Cours<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php if(isset($classe)){ echo $classe ;}?>">
                        <a href="<?= URL_BASE ?>/TypeCours/ajoutTypeCours/">Ajouter un type de cours</a>
                    </li>
                    <li>
                        <a href="<?= URL_BASE ?>/TypeCours/listTypeCours/">Liste des type de cours</a>
                    </li>

                </ul>
            </li>
            <li class="<?php if(isset($classe) && $_SESSION['profile']=="Vacataire") echo $classe ;?>">
                <a href="#"><i class="fa fa-sitemap"></i>Cours<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li >
                        <a href="<?= URL_BASE ?>/Cours/ajoutCours/">Ajouter un cours</a>
                    </li>
                    <li >
                        <a href="<?= URL_BASE ?>/Cours/listCours/">Liste des cours</a>
                    </li>

                </ul>
            </li>

        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->
