<script src="<?= JS ?>/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="<?= JS ?>/bootstrap.min.js"></script>

<!-- Metis Menu Js -->
<script src="<?= JS ?>/jquery.metisMenu.js"></script>
<!-- Morris Chart Js -->
<script src="<?= JS ?>/morris/raphael-2.1.0.min.js"></script>
<script src="<?= JS ?>/morris/morris.js"></script>


<script src="<?= JS ?>/easypiechart.js"></script>
<script src="<?= JS ?>/easypiechart-data.js"></script>

<script src="<?= JS ?>/Lightweight-Chart/jquery.chart.js"></script>

<!-- Custom Js -->
<script src="<?= JS ?>/custom-scripts.js"></script>

<script type="text/javascript">

    var timePeriodInMs = 8000;

    setTimeout(function ()
    {
        document.getElementById("message").style.display = "none";
    },
            timePeriodInMs);
    function supprimerRespFinancier(id) {

        if (confirm("Voulez vous vraiment supprimer ce responsable Financier ?"))
        {
            location.href = "<?= URL_BASE ?>/RespFinancier/delete?userId=" + id;
        }
        return  false;
    }
    ;
    function supprimerContGestion(id) {

        if (confirm("Voulez vous vraiment supprimer ce Controleur Gestion ?"))
        {
            location.href = "<?= URL_BASE ?>/ContGestion/delete?userId=" + id;
        }
        return  false;
    }
    ;
    function supprimerRespAdministratif(id) {

        if (confirm("Voulez vous vraiment supprimer ce responsable administratif ?"))
        {
            location.href = "<?= URL_BASE ?>/RespAdministratif/delete?userId=" + id;
        }
        return  false;
    }
    ;
    function supprimerRespFormation(id) {

        if (confirm("Voulez vous vraiment supprimer ce responsable de Formation ?"))
        {
            location.href = "<?= URL_BASE ?>/RespFormation/delete?userId=" + id;
        }
        return  false;
    }
    ;
    function supprimerFac(id) {

        if (confirm("Voulez vous vraiment supprimer cette faculté ?"))
        {
            location.href = "<?= URL_BASE ?>/Faculte/deleteFaculte?facId=" + id;
        }
        return  false;
    }
    ;
    function supprimerVac(id) {

        if (confirm("Voulez vous vraiment supprimer ce Vacataire ?"))
        {
            location.href = "<?= URL_BASE ?>/Vacataire/deleteVacataire?vacId=" + id;
        }
        return  false;
    }
    ;
    function supprimerFormation(id) {

        if (confirm("Voulez vous vraiment supprimer cette formation ?"))
        {
            location.href = "<?= URL_BASE ?>/Formation/deleteFormation?formaId=" + id;
        }
        return  false;
    }
    ;
    function supprimerMatiere(id) {

        if (confirm("Voulez vous vraiment supprimer cette matière ?"))
        {
            location.href = "<?= URL_BASE ?>/Matiere/deleteMatiere?matId=" + id;
        }
        return  false;
    }
    ;
    function supprimerRemuneration(id) {

        if (confirm("Voulez vous vraiment supprimer cette Remuneration ?"))
        {
            location.href = "<?= URL_BASE ?>/Remuneration/deleteRemuneration?remunerationId=" + id;
        }
        return  false;
    }
    ;
    function supprimerTypeCours(id) {

        if (confirm("Voulez vous vraiment supprimer ce type de cours ?"))
        {
            location.href = "<?= URL_BASE ?>/TypeCours/deleteTypeCours?typeCourId=" + id;
        }
        return  false;
    }
    ;
    function supprimerCours(id) {

        if (confirm("Voulez vous vraiment supprimer ce cours ?"))
        {
            location.href = "<?= URL_BASE ?>/Cours/deleteCours?CoursId=" + id;
            
        }
        return  false;
    }
    ;
    function supprimerDocument(id) {

        if (confirm("Voulez vous vraiment supprimer ce document ?"))
        {
            location.href = "<?= URL_BASE ?>/Documents/delete?docId=" + id;
            
        }
        return  false;
    }
    ;
</script>
