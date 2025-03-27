<?php
    require_once 'Controllers/FollowUpController.php';

    /**
     * Représente une route pour afficher le suivi de l'utilisateur.
     * @package Controllers\Router\Route
     * @author Enzo
     */
    class RouteInfoFollowUp extends Route {
        private FollowUpController $controller;

        /**
         * Initialise une nouvelle instance de la classe RouteInfoFollowUp.
         * @param FollowUpController $controller Le contrôleur de FollowUp.
         */
        public function __construct(FollowUpController $controller) {
            parent::__construct();
            $this->controller = $controller;
        }

        /**
         * Gère les requêtes GET pour la route.
         * @param array $params Les paramètres de la route.
         * @return mixed Le résultat de l'opération d'affichage.
         */
        public function get($params = []) {
            return $this->controller->InfoFollowUp();
        }

        /**
         * Gère les requêtes POST pour la route.
         * @param array $params Les paramètres de la route.
         * @return mixed Le résultat de l'opération d'affichage.
         */
        public function post($params = []) {
            return $this->controller->InfoFollowUp();
        }

        /**
         * Gère les requêtes pour la route.
         * @param array $params Les paramètres de la route.
         * @param string $method La méthode de la requête.
         * @return mixed Le résultat de l'opération d'affichage.
         */
        public function action($params = [], $method = 'POST') {
            return $this->controller->InfoFollowUp();
        }
}
