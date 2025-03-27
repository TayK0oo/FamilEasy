<!-- 
autor : Lola Cohidon
author : Théo Cornu
-->

<?php include 'companion.php'; ?>
<?php require 'translations.php' ?>
<link rel="stylesheet" href="Public/css/followUp24.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="Public/Animation_js/followUp3.js"></script>

<div id = "viewFollowUp">

    <!-- Header -->
    <div id="Person">
        <h1 id="PersonTitle">Surname Name</h1> <!--Displaying the user's first and last name-->
    </div>
    <!--Buttons-->
    <div class="buttons">
        <button class=selectData id="suiviD" ><?= $translations[$language]['followUp_button_suiviD']?></button>
        <div class="line"></div>
        <button class=selectData id="suiviG" ><?= $translations[$language]['followUp_button_suiviG']?></button>
    </div>
    <!--Detailed tracking-->
    <input type="hidden" id="data2" value="<?= htmlspecialchars(json_encode($taskCountPerYearMonth)) ?>">
    <input type="hidden" id="data3" value="<?= htmlspecialchars(json_encode($taskPercent)) ?>">
    <input type="hidden" id="data4" value="<?= htmlspecialchars(json_encode($hoursHomeGlobalPerTask)) ?>">

    
</div>


    




