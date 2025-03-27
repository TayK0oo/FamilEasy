<!-- author: Théo Cornu -->

<?php require 'translations.php' ?>
<?php include 'companion.php'; ?>

<div id="contenu">
    <link rel="stylesheet" href="Public/css/page_accueil/index10.css">

    <script src="Public/Animation_js/page_accueil/index.js"></script>
    

    <div id="Debut">
        <?php if (isset($message)) : ?>
            

            <p><?= $message ?></p>
        <?php endif; ?>
        <?php if (isset($_GET['errorMessage'])) : ?>
            <p><?= $_GET['errorMessage']?></p>
        <?php endif; ?>
        <div id="imageDebut">
            <div class="imageDuDeb haut"></div>
            <div class="imageDuDeb bas"></div>
            <div class="imageDuDeb haut"></div>
            <div class="imageDuDeb bas"></div>
        </div>
        <h1>
            <?= $translations[$language]['index_title']?>    
        </h1>
        <p>
            <?= $translations[$language]['index_desc']?>
        </p>
    </div>

    <!-- block-->

    <div id="SomeChiffre">
        <div id="SomeChiffreTexte">
            <p>
                <?= $translations[$language]['index_SomeChiffreTexte']?>
            </p>
        </div>
        <div class="SmileyChiffre a">
            <div>
                <img id="smiley1" src="Public/image/page_accueil/Smiley_Familly.png" alt="Smiley_Familly">
            </div>
            <div class="nbWrite">
                <h3>
                    100+
                </h3>
                <p>
                    <?= $translations[$language]['index_Satisfied_Families']?>
                </p>
            </div>
        </div>
        <div class="SmileyChiffre b">
            <div>
                <img id="smiley2" src="Public/image/page_accueil/Smiley_Choked.png" alt="Smiley_Choked">
            </div>
            <div class="nbWrite">
                <h3>
                    +23k
                </h3>
                <p>
                    <?= $translations[$language]['index_downloads']?>    
                </p>
            </div>
        </div>
        <div id="Smiley_Choked" class="SmileyChiffre c">
            <div id="smiley3Div">
                <img id="smiley3" src="Public/image/page_accueil/Smiley_HearthEyes.png" alt="Smiley_HearthEyes">
            </div>
            <div class="nbWrite">
                <h3>
                    95%
                </h3>
                <p>
                    <?= $translations[$language]['index_User_Satisfaction']?>
                </p>
            </div>
        </div>
    </div>

    <!-- block-->

    <div id="FAQ">
        <div id="FAQcontainer">
        
            <div>
                
                <div id="Faq_Pixi" class="relative-container">
                    <div id='FAQprParent'>
                        <div id='FAQprincipal'>
                            <div id='imageFAQ'>
                            </div>
                        </div>
                    </div>
                    <div id="PixiPresentation">
                        
                        <div class="field">
                        
                            <fieldset>
                                <img src="Public/image/page_accueil/Pixy_Helper.png" alt="Pixy_Helper">
                                <label for="pixi">Pixi</label>
                                <label for="Statut"><?= $translations[$language]['index_pixi_status']?></label>
                                <input type="button" value="<?=$translations[$language]['index_pixi_button_Messages']?>">
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h2>
                    <?= $translations[$language]['index_pixi_meet_pixi']?>
                </h2>
                <p>
                    <?= $translations[$language]['index_pixi_desc']?>
                </p>
                <input id="MAU" type="button" value="<?=$translations[$language]['index_pixi_button_LearnMore']?>">
            </div>
        </div>
    </div>

    <!-- block-->

    <div id="Tuto">
        <h2>
            <?= $translations[$language]['index_tuto_h2']?>
        </h2>
        <p>
            <?= $translations[$language]['index_tuto_p']?>
        </p>
        <video width="320" height="240" controls>
            <source src="tutorial_video.mp4" type="video/mp4">
        </video>
    </div>

    <!-- block-->

    <div id="Publication">
        <div id="PubliGauche">
            <h4>
                <?= $translations[$language]['index_PubliGauche_h4']?>
            </h4>
            <div>
                <div class="slider-controls">
                    <div class="slider-control active"></div>
                    <div class="slider-control"></div>
                    <div class="slider-control"></div>
                    <div class="slider-control"></div>
                </div>
            </div>
        </div>
        <div class="slider" id="slider_1">
            <div class="slider-panel active">
                <p>
                    <?= $translations[$language]['index_slider_slider-panel_active_p']?>
                </p>
                <div class="people">
                    <div id="imgA"></div>
                    <div>
                        <h2>
                            Jane Doe
                        </h2>
                        <h5><?= $translations[$language]['index_slider_imgA_h5']?></h5>
                    </div>
                </div>
            </div>
            <div class="slider-panel">
                <p>
                    <?= $translations[$language]['index_slider_slider-panel_1_p']?>
                </p>
                <div class="people">
                    <div id="imgB"></div>
                    <div>
                        <h2>
                            John Smith
                        </h2>
                        <h5><?= $translations[$language]['index_slider_imgB_h5']?></h5>
                    </div>
                </div>
            </div>
            <div class="slider-panel">
                <p>
                    <?= $translations[$language]['index_slider_slider-panel_2_p']?>
                </p>
                <div class="people">
                    <div id="imgC"></div>
                    <div>
                        <h2>
                            Emily Wilson
                        </h2>
                        <h5><?= $translations[$language]['index_slider_imgC_h5']?></h5>
                    </div>
                </div>
            </div>
            <div class="slider-panel">
                <p>
                <?= $translations[$language]['index_slider_slider-panel_3_p']?>
                </p>
                <div class="people">
                    <div id="imgD"></div>
                    <div>
                        <h2>
                            Mark Johnson
                        </h2>
                        <h5><?= $translations[$language]['index_slider_imgD_h5']?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div id="ligneP"></div>
        <div id="Réseaux">
            <!-- Add your social media links or content here -->
        </div>
    </div>

    <!-- block-->
</div>
