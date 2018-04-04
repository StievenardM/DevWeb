<?php
    require ('article.php');
    require ('client.php');
    require ('commande.php');
    require ('lignesCommande.php');
    require ('beanCommande.php');
    require ('beanArticle.php');

    function getConnection() {
        $hostname = 'localhost';
        $user = 'michael';
        $password = 'brutus';
        $bdd = 'DevWeb';
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
    
    function listeArticles() {
        $articles = array();
        try {
            $dbh = getConnection();
            $sql = 'select * from Article';
        }
        catch(PDOException $ex) {
            echo 'Erreur: ' . $ex -> getMessage();
        }
        $stmt = $dbh -> query($sql);
        while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            $article = new Article($row['id'], $row['idCategorie'], $row['titre'], $row['description'], $row['prix'], $row['image'], $row['etat']);
            array_push($articles, $article);
        }
        return $articles;
    }

    function listeClients() {
        $clients = array();
        try {
            $dbh = getConnection();
            $sql = 'select * from Client';
        }
        catch(Exception $ex) {
            echo 'Erreur: ' . $ex -> getMessage();
        }
        $stmt = $dbh -> query($sql);
        while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            $client = new Client($row['id'], $row['nom'], $row['prenom'], $row['adresse'], $row['cp'], $row['localite'], $row['email'], $row['idGrade'], $row['motDePasse']);
            array_push($clients, $client);
        }
        return $clients;
    }

    function listeCommandes() {
        $commandes = array();
        try {
            $dbh = getConnection();
            $sql = 'select * from Commande';
        }
        catch(Exception $ex) {
            echo 'Erreur: ' . $ex -> getMessage();
        }
        $stmt = $dbh -> query($sql);
        while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            $commande = new Commande($row['id'], $row['dateCommande'], $row['idClient']);
            array_push($commandes, $commande);
        }
        return $commandes;
    }

    function getCommande($id) {
        try {
            $dbh = getConnection();
            $sql = 'select * from Commande where id = ' . $id;
        }
        catch(Exception $ex) {
            echo 'Erreur: ' . $ex -> getMessage();
        }
        $stmt = $dbh -> query($sql);
        $row = $stmt -> fetch(PDO::FETCH_ASSOC);
        $commande = new Commande($row['id'], $row['dateCommande'], $row['idClient']);
        $lignes = array();
        $sql = 'select * from LignesCommande where idCommande = ' . $commande -> getId();
        $stmt = $dbh -> query($sql);
        while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            $idCommande = $commande -> getId();
            $article = getArticle($row['idArticle']);
            $quantite = $row['quantite'];
            $ligne = new LigneCommande($article, $quantite);
            array_push($lignes, $ligne);
        }
        $client = getClient($commande -> getIdClient());
        $beanCommande = new BeanCommande($commande, $client, $lignes);
        return $beanCommande;
    }

    function getArticle($id) {
        try {
            $dbh = getConnection();
            $sql = 'select * from Article where id = ' . $id;
        }
        catch(Exception $ex) {
            echo 'Erreur: ' . $ex -> getMessage();
        }
        $stmt = $dbh -> query($sql);
        $row = $stmt -> fetch(PDO::FETCH_ASSOC);
        $article = new Article($row['id'], $row['idCategorie'], $row['titre'], $row['description'], $row['prix'], $row['image'], $row['etat']);
        return $article;
    }

    function getClient($id) {
        try {
            $dbh = getConnection();
            $sql = 'select * from Client where id = ' . $id;
        }
        catch(Exception $ex) {
            echo 'Erreur: ' . $ex -> getMessage();
        }
        $stmt = $dbh -> query($sql);
        $row = $stmt -> fetch(PDO::FETCH_ASSOC);
        $client = new Client($row['id'], $row['nom'], $row['prenom'], $row['adresse'], $row['cp'], $row['localite'], $row['email'], $row['idGrade'], $row['motDePasse']);
        return $client;
    }

    function getCategorie($id) {
        try {
            $dbh = getConnection();
            $sql = 'select categorie from Categorie where id = ' . $id;
        }
        catch(Exception $ex) {
            echo 'Erreur: ' . $ex -> getMessage();
        }
        $stmt = $dbh -> query($sql);
        $row = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $row['categorie'];
    }

    function getBeanArticle($id) {
        $article = getArticle($id);
        $categorie = getCategorie($article -> getIdCategorie());
        $beanArticle = new BeanArticle($article, $categorie);
        return $beanArticle;
    }
?>