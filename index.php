<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>XSS Attack test</title>
    </head>

    <?php
   
    ?> 
    <?php
    // put your code here
    include './XssPrevention.inc.php';
    $x = new XssPrevention();
    echo $x->protectXSS($_POST['comments']);
    //echo $_POST['comments'];
    //echo $x->protectXSSBlackListTags($_POST['comments']);
    //echo ($_POST['comments']);
    //echo $x->protectXSSpurifier($_POST['comments']);
    ?>



    <h1>Welcome to XSS prevention library</h1>

    <form action="index.php" method="POST">
        Comment:<br>
        <textarea name="comments" rows="6" cols="30"></textarea>
        <input type="submit" value="Send"></input>

    </form>

</html>