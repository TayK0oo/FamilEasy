<!-- author: Théo Cornu
author: Théo Deguin 
author : Enzo-->
<?php require'translations.php' ?>
<?php include 'companion.php'; ?>
<div id="page">
    <link rel="stylesheet" href="Public/css/connection1.css">
    
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
            <div>
                <h1><?= $translations[$language]['connection_title']?></h1>
                <p><?= $translations[$language]['connection_desc']?></p>
            </div>
            <div>
                <form action="index.php?action=ConnectLogin" method="post">
                    <fieldset>
                        <div class="formConnect">   
                            <div class="infoSend">
                                <label for="Username"><?= $translations[$language]['connection_login_label']?></label><br>
                                <input type="text" id="login" name="Username" class="inputs" autofocus required>
                            </div>
                            <div class="infoSend">
                                <label for="Password"><?= $translations[$language]['connection_password_label']?></label><br>
                                <input type="password" id="password" name="Password" class="inputs" required> 
                            </div >         
                            <div id="submitDiv">
                                <input type="submit" value="<?= $translations[$language]['connection_submit']?>" id="submitbutton">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div>
                <p><?= $translations[$language]['connection_noAccount']?> <a id="lieninscription" href="index.php?action=Registration"><?= $translations[$language]['connection_createAccount']?></a></p>
            </div>    
        </div>
    </div>
</div>