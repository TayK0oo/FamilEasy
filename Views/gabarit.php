<!-- author : Théo Cornu -->
<?php require 'translations.php' ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $titre ?></title>
    <link rel="stylesheet" href="Public/css/header3.css"/>
    <link rel="stylesheet" href="Public/css/footer2.css"/>
    <link rel="stylesheet" href="Public/css/erreur.css"/>
    <link rel="stylesheet" href="Public/css/companion2.css"/>
    <link rel="stylesheet" href="Public/css/mentionLegal.css"/>
    <script src="Public/Animation_js/header.js"></script>
    <script src="Public/Animation_js/companion1.js"></script>
    <script src="Public/Animation_js/scrollTop.js"></script>
</head>

<body>
<!-- header et bars -->
<header>
        <div>
            <img class="icon" id="bars" src="Public/image/header/bars-staggered-solid.svg" alt="">
        </div>
        
        <a class="lien-header" href="index.php?action=Index" >
            
            <div class="icon" id="logoH" ></div>
        
        </a>
        
        
        <?php if (isset($_SESSION['IdLogin']) && !isset(($_SESSION["IdMyHome"])))  : ?>
            <a class="lien-header" href="index.php?action=MyHome" > 
                <div class="icon" id="user"></div>
            </a>
        <?php elseif(!isset($_SESSION['IdLogin'])) : ?>
            <a class="lien-header" href="index.php?action=Connection" > 
                <div class="icon" id="user"></div>
            </a>
        <?php endif; ?>
</header>

<!-- Parti menu déroulant + Flou -->
<div id="menu">
    <ul>
        <?php if (isset($_SESSION['IdLogin'])) : ?>
            <li><a class="lien-header" href="index.php?action=Index" ><?= $translations[$language]['gabarit_button_home']?></a></li>
            <li><a class="lien-header" href="index.php?action=InfoDashBoard"><?= $translations[$language]['gabarit_button_dashboard']?></a></li>
            <li><a class="lien-header" href="index.php?action=Reference"><?= $translations[$language]['gabarit_button_reference']?></a></li>
            <li><a class="lien-header" href="index.php?action=InfoFollowUp"><?= $translations[$language]['gabarit_button_followUp']?></a></li>
            <li><a class="lien-header" href="index.php?action=ExportPDF">Export PDF</a></li>
        <?php else : ?>
            <li><a class="lien-header" href="index.php?action=Connection"  ><?= $translations[$language]['gabarit_button_login']?></a></li> 
            <li><a class="lien-header" href="index.php?action=Registration"  ><?= $translations[$language]['gabarit_button_register']?></a></li> 
        <?php endif; ?>
    </ul>
</div>
<div id="menuF"></div>



<!-- #contenu -->
<main id="contenu">
<?= $contenu ?>
</main>

<!-- footer -->
<!-- author : Lola Cohidon -->
<!-- author : Théo Cornu -->
<footer>
    <div class="footer-inner">
        <div class="footer-logo">
            <a  class="scroll-to-top">
                <img src="Public/image/page_connection/logo_F.png" alt="Logo">
            </a>                
        </div>
        <div id="shortcuts" class="link">
            <ul>
                <li class="linkTitle" ><a href="#"><?= $translations[$language]['gabarit_shortcuts']?></a></li>
                <li class="linkTitle" ><a href="#">Shortcuts</a></li>
                <li class="linkSubstitle"><a href="index.php?action=InfoDashBoard">DashBord</a></li>
                <li class="linkSubstitle"><a href="index.php?action=Reference">Reference</a></li>
                <li class="linkSubstitle"><a href="index.php?action=InfoFollowUp">Follow Up</a></li>
                <li class="linkSubstitle"><a href="index.php?action=ExportPDF">Export PDF</a></li>
                <li class="linkSubstitle"><a href="index.php?action=Registration&IdLogin=83">Update my account</a></li>
            </ul>
        </div>
        <div id="legalNotice" class="link">
            <ul>
                <li class="linkTitle" ><a href="#"><?= $translations[$language]['gabarit_legalNotice']?></a></li>
                <li class="linkSubstitle" ><a href="index.php?action=PrivacyPolicy"><?= $translations[$language]['gabarit_privacyPolicy']?></a></li>
                <li class="linkSubstitle" ><a href="index.php?action=TermsConditions"><?= $translations[$language]['gabarit_termsConditions']?></a></li>
                <li class="linkSubstitle" ><a href="index.php?action=LegalNotice"><?= $translations[$language]['gabarit_legalMention']?></a></li>
                <li class="linkSubstitle" ><a href="index.php?action=CookiePolicy"><?= $translations[$language]['gabarit_cookiePolicy']?></a></li>
            </ul>
        </div>
        <div id="services" class="link">
            <ul>
                <li class="linkTitle"><a href="#">Services</a></li>
                <li class="linkSubstitle"><a href="#">Contact</a></li>
                <li class="linkSubstitle"><a href="#">Who are we?</a></li>
            </ul>
        </div>
        <div class="footer-social">
            <div id="follow-text-div">
                <p id="follow-text"><?= $translations[$language]['gabarit_followUs']?></p>
            </div>
            <div id="ResLogo">
                <a class="Facebook" href="#"><img src="Public/image/page_footer/facebook.png" alt="Facebook"></a>
                <a class="Instagram" href="#"><img src="Public/image/page_footer/instagram.png" alt="Instagram"></a>
                <a href="#"><img src="Public/image/page_footer/twitter.png" alt="Twitter"></a>
            </div>
        </div>
    </div>
</footer>
</body>

</html>