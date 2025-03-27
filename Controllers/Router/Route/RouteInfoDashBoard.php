<?php

require_once 'Controllers/DashBoardController.php';
/**
 * Représente une route pour afficher le tableau de bord de l'utilisateur.
 * Hérite de la classe Route.
 * 
 * @package Controllers\Router\Route
 */
class RouteInfoDashBoard extends Route {
    private DashBoardController $controller;

    /**
     * Initialise une nouvelle instance de la classe RouteInfoDashBoard.
     *
     * @param DashBoardController $controller Le contrôleur de dashboard.
     */
    public function __construct(DashBoardController $controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * Gère les requêtes GET pour la route.
     *
     * @param array $params Les paramètres de la route.
     * @return mixed Le résultat de l'opération d'affichage.
     */
    public function get($params = []) {
        return $this->controller->InfoDashBoard();
    }

    /**
     * Gère les requêtes POST pour la route.
     *
     * @param array $params Les paramètres de la route.
     * @return mixed Le résultat de l'opération d'affichage.
     */
    public function post($params = []) {
        return $this->controller->InfoDashBoard();
    }

    /**
     * Gère les requêtes pour la route.
     *
     * @param array $params Les paramètres de la route.
     * @param string $method La méthode de la requête.
     * @return mixed Le résultat de l'opération d'affichage.
     */
    public function action($params = [], $method = 'POST') {
        return $this->controller->InfoDashBoard();
    }
}
