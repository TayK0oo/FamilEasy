<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

/**
 * This file is the entry point of the application.
 * It requires Router classes.
 * If an action is set in the GET parameters, it uses the Router to route the request.
 * Otherwise, it sets the action to 'Index' and routes the request.
 * 
 * @author Théo Cornu
 */
require_once 'Controllers/MainController.php';
require_once 'Controllers/Router/Router.php';

session_start();

if (isset($_GET['action'] )) {
    ob_clean();
    $router = new Router('action');
    $router->routing($_GET, $_POST);
} else {
    $_GET['action'] = 'Index';
    $router = new Router('action');
    $router->routing($_GET, $_POST);
}


//ex de navigation grace à l'url
/* <a href="index.php?action=EditPokemon&IdPokemon=<?= $pokemon->getIdPokemon() ?>"><button type="submit" name="update">Modifier</button></a>
                    
<a href="index.php?action=DeletePokemon&IdPokemon=<?= $pokemon->getIdPokemon() ?>"><button type="submit" name="supr">Supprimer</button></a>
*/
