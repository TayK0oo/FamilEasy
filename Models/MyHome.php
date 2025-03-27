<?php
    /**
     * Class MyHome
     * @author Enzo
     */
    class MyHome {
        private $idMyHome;
        private $codeMyHome;
        private $nameMyHome;
        
        public function __construct(?int $idMyHome = null, ?string $codeMyHome = null, ?string $nameMyHome = null) {
            $this->idMyHome = $idMyHome;
            $this->codeMyHome = $codeMyHome;
            $this->nameMyHome = $nameMyHome;
        }

        /**
         * Set the value of idMyHome
         * @author Enzo
         * @param $idMyHome id of myHome
         */
        public function SetIdMyHome(?int $idMyHome) {
            $this->idMyHome = $idMyHome;
        }

        /**
         * Get the value of idMyHome
         * @author Enzo
         * @return ?int
         */
        public function GetIdMyHome(): ?int {
            return $this->idMyHome;
        }

        /**
         * Set the value of codeMyHome
         * @author Enzo
         * @param $codeMyHome code of myHome
         */
        public function SetCodeMyHome(?string $codeMyHome) {
            $this->codeMyHome = $codeMyHome;
        }

        /**
         * Get the value of codeMyHome
         * @author Enzo
         * @return ?string
         */
        public function GetCodeMyHome(): ?string {
            return $this->codeMyHome;
        }

        /**
         * Set the value of usernameMyHome
         * @author Enzo
         * @param $usernameMyHome username of myHome
         */
        public function SetNameMyHome(?string $nameMyHome) {
            $this->nameMyHome = $nameMyHome;
        }

        /**
         * Get the value of usernameMyHome
         * @author Enzo
         * @return ?string 
         */
        public function GetNameMyHome(): ?string {
            return $this->nameMyHome;
        }
    }
?>