<?php
	class Client {
		private $_id;
		private $_lastName;
		private $_firstName;
		private $_address;
		private $_zip;
		private $_locality;
		private $_email;
		private $_idLevel;
		private $_pass;
	
		function __construct($id, $lastName, $firstName, 
				$address, $zip, $locality, $email, $idLevel, $pass) {
			$this -> _id = $id;
			$this -> _lastName = $lastName;
			$this -> _firstName = $firstName;
			$this -> _address = $address;
			$this -> _zip = $zip;
			$this -> _locality = $locality;
			$this -> _email = $email;
			$this -> _idLevel = $idLevel;
			$this -> _pass = $pass;
		}

		function getId() {
			return $this -> _id;
		}

		function setId($id) {
			$this -> _id = $id;
		}

		function getLastName() {
			return $this -> _lastName;
		}

		function setLastName($lastName) {
			$this -> _lastName = $lastName;
		}

		function getFirstName() {
			return $this -> _firstName;
		}

		function setFirstName($firstName) {
			$this -> _firstName = $firstName;
		}

		function getAddress() {
			return $this -> _address;
		}

		function setAddress($address) {
			$this -> _address = $address;
		}

		function getZip() {
			return $this -> _zip;
		}

		function setZip($zip) {
			$this -> _zip = $zip;
		}

		function getLocality() {
			return $this -> _locality;
		}

		function setLocality($locality) {
			$this -> _locality = $locality;
		}

		function getEmail() {
			return $this -> _email;
		}

		function setEmail($email) {
			$this -> _email = $email;
		}

		function getIdLevel() {
			return $this -> _idLevel;
		}

		function setIdLevel($idLevel) {
			$this -> _idLevel = $idLevel;
		}

		function getPass() {
			return $this -> _pass;
		}

		function setPass($pass) {
			$this -> _pass = $pass;
		}
	}
?>