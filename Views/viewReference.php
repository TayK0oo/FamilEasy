<!-- author: Théo Cornu
author : Lola Cohidon-->
<?php require 'translations.php' ?>
<link rel="stylesheet" href="Public/css/reference6.css">
<?php include 'companion.php'; ?>
<div id="ContaintReference">
    <!--Search bar-->
    <!-- Search bar -->
    <div class="search">
        <div class="search-box">
            <div class="search-field">
                <input list="TaskProp" placeholder="<?= $translations[$language]['reference_searchbox_search']?>" id="research" class="input" type="text">
                <datalist id="TaskProp">
                    <?php foreach ($tasks as $task): ?>
                    <option value="<?= $task['activity'] ?>">
                        <?php endforeach; ?>
                </datalist>
                <div class="search-box-icon">
                    <button id="btn-icon-content">
                        <i class="search-icon">
                            <svg xmlns="://www.w3.org/2000/svg" version="1.1" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" fill="#fff"></path></svg>
                        </i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--Reference table-->
    <!-- <div class="ReferenceTable"> -->
    <table>
        <tr>
            <th class="thToDisplay" id="activityColumn"><?= $translations[$language]['reference_table_activity']?></th>
            <th class="thToNotDisplay" id="descriptiveColumn"><?= $translations[$language]['reference_table_descriptive']?></th>
            <th class="thToNotDisplay" id="quarterHourValueColumn"><?= $translations[$language]['reference_table_quarter']?></th>
            <th class="thToNotDisplay" id="monetaryValueColumn"><?= $translations[$language]['reference_table_monetary']?></th>
            <th class="thToNotDisplay" id="exampleQuarterHourColumn"><?= $translations[$language]['reference_table_exemple1']?></th>
            <th class="thToNotDisplay" id="exampleMonetaryColumn"><?= $translations[$language]['reference_table_exemple2']?></th>
        </tr>
        <!-- Remplacer tout le contenu du tableau par -->
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td class="tdToDisplay">
                    <div class="action">
                        <div>
                            <img class="icon" src="Public/image/page_reference/<?= $task['image'] ?>" alt="">
                        </div>
                        <div>
                            <p id="<?= $task['id'] ?>"><?= $task['activity'] ?></p>
                        </div>
                    </div>
                    <div class="extra-info">
                        <h2>Description</h2>
                        <p class="description"><?= $task['description'] ?></p>
                        <h2>Valeur en quarts d'heure</h2>
                        <p class="value"><?= $task['quarter'] ?></p>
                        <h2>Valeur monétaire</h2>
                        <p class="money"><?= $task['monetary'] ?>€</p>
                        <h2>Exemple durée</h2>
                        <p class="exampleMinutes"><?= $task['example1'] ?></p>
                        <h2>Exemple monétaire</h2>
                        <p class="exampleMoney"><?= $task['example2'] ?></p>
                    </div>
                </td>
                <td class="tdToNotDisplay"><?= $task['description'] ?></td>
                <td class="tdToNotDisplay"><?= $task['quarter'] ?></td>
                <td class="tdToNotDisplay"><?= $task['monetary'] ?>€</td>
                <td class="tdToNotDisplay"><?= $task['example1'] ?></td>
                <td class="tdToNotDisplay"><?= $task['example2'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    
</div>

<script src="Public/Animation_js/reference1.js"></script>



