<?php 
include 'controller/connexion.php';











$reponse = $bdd->query('SELECT * FROM users WHERE last_name=\'palmer\'');     // On créé une requette SQL "query" qui dit Selectionne TOUS dans la table USERS

while ($data = $reponse->fetch())     // Ensuite on fait une boucle qui récupère une nouvelle entrée qui la place dans $data  (Fetch = va chercher)

{     // On ouvre la boucle et on écris nos echo à l'interieur 

?>

    <p>
        <strong>Humain nommés Palmer</strong><br>
        <?php echo $data['first_name']; ?> &nbsp;
        <?php echo $data['last_name']; ?> &nbsp;
    </p>
<?php
}     // On ferme la boucle

$reponse->closeCursor();      //Permet de terminer le traitemant de la requette SQL 

?>

















<h1>HUMAIN FEMME</h1>

<?php

$reponse = $bdd->query('SELECT * FROM users WHERE gender=\'female\'');     

while ($data = $reponse->fetch())    

{

?>     

    <ui>
        <li><?php echo $data['first_name']; ?> &nbsp; <?php echo $data['last_name']; ?></li>
    </ui>

<?php

}
$reponse->closeCursor(); 

?>








<h1>Mail contenant GOOGLE</h1>

<?php

$reponse = $bdd->query("SELECT * FROM users WHERE email LIKE '%google%'");     

while ($data = $reponse->fetch())    

{

?>     

    <ui>
        <li><?php echo $data['email']; ?></li>
    </ui>

<?php

}
$reponse->closeCursor(); 

?>









<h1>Répartition par Etat et le nombre d’enregistrement (croissant)</h1>

<?php

$reponse = $bdd->query("SELECT *, COUNT(country_code) AS ord  FROM users GROUP BY country_code ORDER BY ord ASC");

while ($data = $reponse->fetch())    

{

?>     

    <ui>
        <li><?php echo $data['country_code'] . ' | Apparait :' . $data['ord']; ?> fois !</li>
    </ui>

<?php

}
$reponse->closeCursor(); 

?>





<h1>Nombre de femme et d'homme</h1>

<?php

$reponse = $bdd->query("SELECT *, COUNT(gender) AS ord  FROM users GROUP BY gender ORDER BY ord ASC");

while ($data = $reponse->fetch())    

{

?>     

    <ui>
        <li><?php echo $data['gender'] . ' | Apparait :' . $data['ord']; ?> fois !</li>
    </ui>

<?php

}
$reponse->closeCursor(); 

?>





<?php

// J'ajoute un humain
$statement = "INSERT INTO users VALUES (NULL, 'Test2', 'TEST', 'test@test.fr', 'Male', '127.0.0.1', '26/02/2000', '', '', '', 'FR')";
$data = $bdd->exec($statement);


// Je modifie l'email
$statement = "UPDATE users SET email = 'mailtest@test.fr' WHERE email = 'test@test.fr'";
$data = $bdd->exec($statement);


// Je le supprime
// $statement ="DELETE FROM users WHERE email = 'mailtest@test.fr'";
// $data = $bdd->exec($statement);


