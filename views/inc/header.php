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
        
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                        <a href="<?= URL_BASE ?>/User/ajoutUser/">Ajouter un utilisateur</a>
                    </li>
                    
                    
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap"></i> Facultés<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
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
                    <li>
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
                    <li>
                        <a href="<?= URL_BASE ?>/Matiere/ajoutMatiere/">Ajouter une matières</a>
                    </li>
                    <li>
                        <a href="<?= URL_BASE ?>/Matiere/listMatieres/">Liste des matières</a>
                    </li>
                    
                </ul>
            </li>
            
        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->
