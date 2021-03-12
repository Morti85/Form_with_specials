<!DOCTYPE HTML>
<Html lang="de">

<Head>
    <Meta charset = "UTF-8">
    <Titel> Worschdsämml </Titel>
</Head>
<Body>
<?php
    $servername = "localhost";
    $username = "admin";
    $password = "123456";
    $dbname = "user";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("awww");
    }
    $sql = "SELECT Username, Password FROM users WHERE Username='" .
    $_POST["username"] . "' AND Password='" . $_POST["passwort"] . "'";
    $result = $conn->query($sql);
    echo $sql;
    if($result == false)
        echo $conn->error;
    while ($result != false && $row = $result->fetch_assoc()) {
        echo $row["Username"] . " - " . $row["Password"];
    }
    $conn->close();
?>

<form action="sqli.php" method="post">
    Username: <input type="text" name="username"/>
    Passwort: <input type="text" name="passwort"/>
    <input type="submit" value="Einloggen" name="submit"/>
</form>

</Body>
</Html>