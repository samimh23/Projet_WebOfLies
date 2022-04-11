<?php
    class Event {
        protected $id;
        private $name;
        private $date;
        private $location;
        private $price;
        private $description;
        private $picture;

        public function __construct($name, $date, $location, $price, $description)
        {
            $this->name = $name;
            $this->date = $date;
            $this->location = $location;
            $this->price = $price;
            $this->description = $description;
        }

        public function getId()
        {
            return $this->id;
        }
        
        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getDate()
        {
            return $this->date;
        }

        public function setDate($date)
        {
            $this->date = $date;
        }

        public function getLocation()
        {
            return $this->location;
        }

        public function setLocation($location)
        {
            $this->location = $location;
        }

        public function getPrice()
        {
            return $this->price;
        }

        public function setPrice($price)
        {
            $this->price = $price;
        }
        public function getDescription()
        {
            return $this->description;
        }

        public function setDescription($description)
        {
            $this->description = $description;
        }

        public function getPicture()
        {
            return $this->picture;
        }

        public function setPicture($picture)
        {
            $this->picture = $picture;
        }


    }
?>