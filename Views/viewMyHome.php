<!-- author: Théo Cornu-->
<?php require 'translations.php' ?>
<link rel="stylesheet" href="Public/css/connection1.css">
<script src="Public/Animation_js/myhome.js"></script>    

<div id="page">
    
    <div id="familyGlobal">
        <img id="family" src="Public/image/page_connection/image_connection.png" alt="">
    </div>
    <div class="container">
        <div id="divlogo">
            <img id="logo" src="Public/image/page_connection/logo_F2.png" alt="">
        </div>
        <div id="rightPart">
            <?php if (isset($_GET['errorMessage'])) : ?>
                <div id="fond-erreur">
                    <p id="erreur"><?= $_GET['errorMessage']?></p>
                </div>
            <?php endif; ?>
            <div id="HeadForm">
                <h1><?= $translations[$language]['myHome_title']?></h1>
                <p><?= $translations[$language]['myHome_desc']?></p>
            </div>
            <div>
                <form id="HomeForm" action="index.php?action=MyHomeConnect" method="post">
                    <fieldset>
                        <div class="formConnect">   
                            <div class="infoSend">
                                <label id="labelcode" for="CodeHome"><?= $translations[$language]['myHome_codeHome']?></label><br>
                                <input type="text" id="CodeHome" name="CodeHome" class="inputs" autofocus required>
                            </div>
                                   
                            <div id="submitDiv">
                                <input type="submit" value="<?= $translations[$language]['myHome_submit']?>" id="submitbutton">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div id="FootForm">
                <p ><?= $translations[$language]['myHome_submit']?> <input type="button" id="lienCreatHome" value="<?= $translations[$language]['myHome_submit']?>"></p>
            </div>    
        </div>
    </div>
</div>

