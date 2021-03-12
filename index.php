<!DOCTYPE html>
<html>
<body>

<?php
    $error = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty(htmlspecialchars(stripslashes(trim($_POST["name"]))))) {
            $error = "Der Name ist nicht optional. <br>";
        }
        elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error = "Dies ist eine ungültige Emailadresse! <br>";
        }
        else {
            echo "Heyhooo " . htmlspecialchars(stripslashes(trim($_POST["name"] . "!"))) ,
            "<br>Der sehnlichst erwartete Newsletter wird gesendet an: " . htmlspecialchars(stripslashes(trim($_POST["email"])));
        }
    }
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    Name: <input type="text" name="name"><br>
    E-Mail: <input type="text" name="email"><br>
    <?php echo $error ?>
    <input type="submit">
</form>

</body>
</html>