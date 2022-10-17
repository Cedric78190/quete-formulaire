<?php
require_once '_connec.php';

$pdo = new PDO(DSN, USER, PASS);

if (isset($_POST['firstname']) && isset($_POST['lastname']))


if ($_SERVER['REQUEST_METHOD']  === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    
    if (empty($firstname) && empty($lastname)) {
        echo 'erreur';
    }
    else {
        $insert    = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
        $statement = $pdo->prepare($insert);
        
        $statement->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $statement->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        
        $statement->execute();
        $statement->fetch();
    }



    
}

 $query     = 'SELECT * FROM friend';
 $statement = $pdo->query($query);
 $friends   = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
    <ul>
         <?php foreach($friends as $friend) : ?>
                <li>
                    <?php
                    echo $friend['firstname'] . " " . $friend['lastname'];
                    ?>
                </li>
                <?php endforeach;?> 
            </ul>
    <form action="" method ="post">
        <label for="firstname">Prénom :</label>
        <input type="text" id="firstname" name="firstname"  maxlength=45 required>

        <label for="lastname">Nom :</label>
        <input type="text" id="lastname" name="lastname"  maxlength=45 required>

        <input type="submit" value="Envoyer">
    </form>


    </main>
</body>
</html>

