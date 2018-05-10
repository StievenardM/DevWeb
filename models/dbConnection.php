<?php
	function getConnection() {
        $hostname = 'localhost';
        $user = '';
        $password = '';
        $bdd = '';
        $dbh = null;
        
        try {
            $dbh = new PDO("mysql:host=$hostname;dbname=$bdd", 
                $user, $password);
            $dbh -> exec('SET NAMES utf8');
        }
        catch (Exception $ex) {
            echo 'Erreur: ' . $ex -> getMessage();
        }
        return $dbh;
    }
?>