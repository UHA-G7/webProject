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
    function supprimerFac(id) {
        
        if (confirm("Voulez vous vraiment supprimer cette faculté ?"))
        {
            location.href = "<?= URL_BASE ?>/Faculte/deleteFaculte?facId="+id;
        }
        return  false;
    }
    ;
    function supprimerFormation(id) {
        
        if (confirm("Voulez vous vraiment supprimer cette formation ?"))
        {
            location.href = "<?= URL_BASE ?>/Formation/deleteFormation?formaId="+id;
        }
        return  false;
    }
    ;
    function supprimerMatiere(id) {
        
        if (confirm("Voulez vous vraiment supprimer cette matière ?"))
        {
            location.href = "<?= URL_BASE ?>/Matiere/deleteMatiere?matId="+id;
        }
        return  false;
    }
    ;
</script>
