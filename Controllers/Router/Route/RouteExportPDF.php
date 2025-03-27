<?php
    /**
     * Class RouteFollowUp
     * @author Lola
     */
    class RouteExportPDF extends Route {
        private MainController $controller;

        /**
         * RouteFollowUp constructor.
         * @param MainController $controller
         */
        public function __construct(MainController $controller) {
            parent::__construct();
            $this->controller = $controller;
        }

        /**
         * Get method for RouteFollowUp
         * @param array $params
         * @return mixed
         */
        public function get($params = []) {
            return $this->controller->ExortPDF();
        }

        /**
         * Post method for RouteFollowUp
         * @param array $params
         * @return mixed
         */
        public function post($params = []) {
            return $this->controller->ExportPDF();
        }

        /**
         * Action method for RouteFollowUp
         * @param array $params
         * @param string $method
         * @return mixed
         */
        public function action($params = [], $method = 'GET') {
            return $this->controller->ExportPDF();
        }
    }
?>