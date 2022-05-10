<?php
    class EventReservation {
        protected $id;
        protected $idEvent;
        private $lastName;
        private $firstName;
        private $email;

        public function __construct($lastName, $firstName, $email)
        {
            $this->lastName = $lastName;
            $this->firstName = $firstName;
            $this->email = $email;
        }

        public function getId()
        {
            return $this->id;
        }
        public function getIdevent()
        {
            return $this->idEvent;
        }
        public function getLastname()
        {
            return $this->lastName;
        }

        public function setLastname($lastName)
        {
            $this->lastName = $lastName;
        }

        public function getFirstname()
        {
            return $this->firstName;
        }

        public function setFirstname($firstName)
        {
            $this->firstName = $firstName;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }
    }
?>