<html><head><title>Bonjour</title></head><body>
<?php
            function getConnection() {
                $hostname = 'localhost';
                $user = 'michael';
                $pass = 'brutus';
                $dbh = null;
                try {
                    $dbh = new PDO("mysql:host=$hostname;dbname=DevWeb", $user, $pass);
                } 
                catch (Exception $ex) {
                    echo 'Erreur: ' . $ex->getMessage();
                }
                return $dbh;
            }
        
            $article = array();
            try {
                $sql = 'select * from Categorie';
                $dbh = getConnection();
            }
            catch (PDOException $ex) {
                echo 'Erreur: ' . $ex -> getMessage();
            }
            $stmt = $dbh -> query($sql);
            while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
                $article[$row['id']] = $row['id'];
                $article[$row['categorie']] = $row['categorie'];
                echo $article[$row['id']] . ': ' . $article[$row['categorie']] . '<br />';
            }
        
?>
</body></html>
