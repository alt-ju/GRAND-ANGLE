<?php
require_once "./config/pdo.php";
 
$sql = "SELECT *
        FROM exposition";
$requete = $db -> query($sql);
$expos= $requete->fetchAll(PDO::FETCH_ASSOC);
 
?>
 



<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 mt-5 text-center">
            <div id="calendar"></div>
        </div>
    </div>
</div>

<script >
 
 document.addEventListener('DOMContentLoaded', function() {
 let calendarExpo = document.getElementById('calendar');
  
 let calendar = new FullCalendar.Calendar(calendarExpo, {
 aspectRatio:1,
 contentHeight: '400px',
 initialView: 'dayGridMonth',
 events: [
 <?php foreach ($expos as $expo): ?>
 {
 title: '<?php echo ($expo['libelle_Exposition']); ?>',
 start: '<?php echo ($expo['Date_Debut']); ?>',
 end: '<?php echo ($expo['Date_Fin']); ?>'
 },
 <?php endforeach; ?>
 ]
 });
  
 calendar.render();
 });
  
</script>  