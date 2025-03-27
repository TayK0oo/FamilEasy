<!-- 
    author:  Théo Cornu
    author:  Enzo 
-->
<?php require 'translations.php' ?>
<?php include 'companion.php'; ?>
<script src="Public/Animation_js/inscription.js"></script>
<link href="Public/css/inscription2.css" rel="stylesheet">
<!--LOGO-->
<div id="logo_global">
    <img src="Public/image/page_connection/logo_F.png" alt="logo" id="logo">
</div>
<?php if (isset($_GET['errorMessage'])) : ?>
    <div id="fond-erreur">
        <p id="erreur"><?= $_GET['errorMessage']?></p>
    </div>
<?php endif; ?>
<!--REGISTRATION FORM-->
<div class="container">
    
    <div id="form">

        <!--TITLE AND SUBTITLE-->
        <div>
            <h1><?= $translations[$language]['registration_title']?></h1>
            <p id="subtitle"><?= $translations[$language]['registration_desc']?></p>
        </div>

        <!--FORM-->
        <div>  
            <form action="index.php?action=AddUser&<?php if (isset($_GET['IdLogin'])) : ?>IdLogin=<?=$_GET['IdLogin'] ?><?php endif?>" method="post">
                <fieldset>
                    <!--NAME-->
                    <div>
                        <input name="Lastname" type="text" id="lastname" class="inputs enterText" placeholder="<?= $translations[$language]['registration_lastname_label']?>" maxlength="60" autofocus required>
                        <input name="Firstname" type="text" id="firstname" class="inputs enterText" placeholder="<?= $translations[$language]['registration_firstname_label']?>" maxlength="40" required>
                    </div>
                    
                    <!--EMAIL-->
                    <div>
                        <input name="Email" type="text" id="email" class="inputs enterText" placeholder="<?= $translations[$language]['registration_email_label']?>" maxlength="100" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" >
                    </div>  

                    <!--LOGIN-->
                    <div>
                        <input name="Username" type="text" id="username" class="inputs enterText" placeholder="<?= $translations[$language]['registration_username_label']?>" maxlength="20" required>
                        <input name="Password" type="password" id="password" class="inputs enterText" placeholder="<?= $translations[$language]['registration_password_label']?>" maxlength="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required> 
                    </div> 
                    
                    <!--BIRTHDATE-->
                    <div id="birthdate">
                        <label><?= $translations[$language]['registration_birthdate_label']?></label>
                        <div>
                            <select name="DayOfBirth" id="dayOfBirth" class="inputs date" required> 
                                <?php
                                for ($i = 1; $i <= 31; $i++) {
                                    echo "<option value=\"$i\">$i</option>";
                                }
                                ?>
                            </select> 
                            <select name="MonthOfBirth" id="monthOfBirth" class="inputs date" required>
                                <option value="01"><?= $translations[$language]['registration_month_jan']?></option>
                                <option value="02"><?= $translations[$language]['registration_month_feb']?></option>
                                <option value="03"><?= $translations[$language]['registration_month_mar']?></option>
                                <option value="04"><?= $translations[$language]['registration_month_apr']?></option>
                                <option value="05"><?= $translations[$language]['registration_month_may']?></option>
                                <option value="06"><?= $translations[$language]['registration_month_jun']?></option>
                                <option value="07"><?= $translations[$language]['registration_month_jul']?></option>
                                <option value="08"><?= $translations[$language]['registration_month_aug']?></option>
                                <option value="09"><?= $translations[$language]['registration_month_sep']?></option>
                                <option value="10"><?= $translations[$language]['registration_month_oct']?></option>
                                <option value="11"><?= $translations[$language]['registration_month_nov']?></option>
                                <option value="12"><?= $translations[$language]['registration_month_dec']?></option>
                            </select>  
                            <select name="YearOfBirth" id="yearOfBirth" class="inputs date" required>
                                <?php
                                for ($i = 2023; $i >= 1923; $i--) {
                                    echo "<option value=\"$i\">$i</option>";
                                }
                                ?>
                            </select>
                        </div>  
                    </div>

                    <!--GENDER-->
                    <div id="gender_title">
                        <label><?= $translations[$language]['registration_gender_label']?></label>
                        <div class="gender_global">
                            <div class="gender">
                                <label for="woman"><?= $translations[$language]['registration_gender_woman']?></label>
                                <input type="radio" id="woman" name="Gender" value="woman" class="inputs" required>
                            </div>
                            <div class="gender">
                                <label for="Man"><?= $translations[$language]['registration_gender_man']?></label>
                                <input type="radio" id="man" name="Gender" value="man" class="inputs" required>
                            </div>
                            <div class="gender">
                                <label for="other"><?= $translations[$language]['registration_gender_other']?></label>
                                <input type="radio" id="other" name="Gender" value="other" class="inputs" required>
                            </div>                
                        </div>
                    </div>

                    <!--FAMILY PLACE-->
                    <div>
                        <label for="selectPlaceFamily"><?= $translations[$language]['registration_placeFamily_desc']?></label>
                        <div id="selectBox" onclick="showCheckboxes()">
                            <select id="select" name="selectPlaceFamily">
                                <option><?= $translations[$language]['registration_placeFamily_option']?></option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxes">
                            <label for="parent">
                            <input name="parent" value="parent" type="checkbox" id="parent" /><?= $translations[$language]['registration_placeFamily_parent']?></label>
                            <label for="child">
                            <input name="child" value="child" type="checkbox" id="child" /><?= $translations[$language]['registration_placeFamily_child']?></label>
                            <label for="grandParent">
                            <input name="grandParent" value="grandParent" type="checkbox" id="grandParent" /><?= $translations[$language]['registration_placeFamily_grandparent']?></label>
                            <label for="grandChild">
                            <input name="grandChild" value="grandChild" type="checkbox" id="grandChild" /><?= $translations[$language]['registration_placeFamily_grandchild']?></label>
                            <label for="uncle/aunt">
                            <input name="uncle/aunt" value="uncle/aunt" type="checkbox" id="uncle/aunt" /><?= $translations[$language]['registration_placeFamily_uncle']?></label>
                            <label for="cousin">
                            <input name="cousin" value="cousin" type="checkbox" id="cousin" /><?= $translations[$language]['registration_placeFamily_cousin']?></label>
                            <label for="nephew/niece">
                            <input name="nephew/niece" value="nephew/niece" type="checkbox" id="nephew/niece" /><?= $translations[$language]['registration_placeFamily_nephew']?></label>
                            <label for="stepchild">
                            <input name="stepchild" value="stepchild" type="checkbox" id="stepchild" /><?= $translations[$language]['registration_placeFamily_stepchild']?></label>
                            <label for="in-law">
                            <input name="in-law" value="in-law" type="checkbox" id="in-law" /><?= $translations[$language]['registration_placeFamily_inlaw']?></label>
                            <label for="step-parent">
                            <input name="step-parent" value="step-parent" type="checkbox" id="step-parent" /><?= $translations[$language]['registration_placeFamily_stepparent']?></label>
                            <label for="half-sibling">
                            <input name="half-sibling" value="half-sibling" type="checkbox" id="half-sibling" /><?= $translations[$language]['registration_placeFamily_halfSibling']?></label>
                            <label for="otherPlace">
                            <input name="otherPlace" value="otherPlace" type="checkbox" id="otherPlace" /><?= $translations[$language]['registration_placeFamily_otherPlace']?></label>
                        </div>
                    </div>

                    <!--CONDITIONS-->
                    <div>
                        <p id="conditions">
                        <?= $translations[$language]['registration_conditions']?> <a href="" class="chartes"><?= $translations[$language]['registration_privacyPolicy']?></a> <?= $translations[$language]['registration_and']?> <a href="" class="chartes"><?= $translations[$language]['registration_codeOfConduct']?></a>.
                        </p>
                    </div>   
                    
                    <!--SIGN UP-->
                    <div id="submitDiv">
                        <input type="submit" value="<?= $translations[$language]['registration_submit']?>" class="inputs" id="submit">
                    </div>

                    <!--HAVE A ACCOUNT-->
                    <div id="haveAccount_global">
                        <p><a href="index.php?action=Connection" id="haveAccount"><?= $translations[$language]['registration_haveAccount']?></a></p>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>