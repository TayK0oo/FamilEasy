<?php

    /**
     * Class DashBoard
     *
     * @author Théo Cornu
     */
    class DashBoard
    {
        
        private int $id;
        private string $username;
        private int $idUser;

        public function __construct(string $username =' ')
        {
            $this->username = $username;
        }

        public function GetId(): int
        {
            return $this->id;
        }

        public function SetId(int $id): void
        {
            $this->id = $id;
        }

        public function GetUsername(): string
        {
            return $this->username;
        }

        public function SetUsername(string $username): void
        {
            $this->username = $username;
        }

        public function GetIdUser(): int
        {
            return $this->idUser;
        }

        public function SetIdUser(int $idUser): void
        {
            $this->idUser = $idUser;
        }



    }

?>