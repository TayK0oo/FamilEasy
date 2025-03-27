<?php

    /**
     * Class Register
     *
     * @author Théo Cornu
     * @author Nicolas
     */
    class Login
    {
        private $_id;
        private $_login;
        private $_hash;

        public function __construct(string $login ='', string $password='')
        {
            
            $this->_login = $login;
            $this->_hash = $password;
        }

        // Getter for $_id
        public function getId() {
            return $this->_id;
        }

        // Setter for $_id
        public function setId(int $id) {
            $this->_id = $id;
        }

        // Getter for $_login
        public function getLogin() {
            return $this->_login;
        }

        // Setter for $_login
        public function setLogin(string $login) {
            $this->_login = $login;
        }

        // Hash password and set hash
        public function setPassword(string $password) {
            $this->setHash(hash("sha256", $password));
        }

        // Get the hash password
        public function getPassword() {
            return $this -> getHash();
        }

        // Getter for $_hash
        public function getHash() {
            return $this->_hash;
        }

        // Setter for $_hash
        public function setHash(string $hash) {
            $this->_hash = $hash;
        }

        // Compare parameter hash password with the attribut hash
        public function verifyPassword(string $password) {
            return $this->getHash() == $password;
        }

        public function hydrate(array $data)
        {
            $this->_id = $data['idLogin'];
            $this->setLogin($data['Id']);
            $this->setHash($data['Hash']);
        }

        public function __toString()
        {
            return $this->_id . " " . $this->getLogin() . " " . $this->getHash();
        }
    }

?>