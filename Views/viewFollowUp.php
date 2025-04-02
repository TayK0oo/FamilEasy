<!-- 
autor : Lola Cohidon
author : Théo Cornu
-->

<?php include 'companion.php'; ?>
<?php require 'translations.php' ?>
<link rel="stylesheet" href="Public/css/followUp24.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="Public/Animation_js/followUp6.js"></script>

<div id = "viewFollowUp">

    <!-- Header -->
    <div id="Person">
        <h1 id="PersonTitle"><?= $username ?></h1> <!--Displaying the user's first and last name-->
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
    <input type="hidden" id="tasksData" value="<?= htmlspecialchars(json_encode($tasks)) ?>">

    <!-- Add the following debugging information -->
<!--    <h2>Data Passed to View:</h2>-->
<!--    <pre>--><?php //print_r($tasks); ?><!--</pre>-->
<!--        <pre>--><?php //print_r($labels); ?><!--</pre>-->
<!--    <pre>--><?php //print_r($hoursHomeGlobalPerTask); ?><!--</pre>-->
<!--    <pre>--><?php //print_r($taskPercent); ?><!--</pre>-->


</div>


    




