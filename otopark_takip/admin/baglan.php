
<?php 

try {
    $db = New PDO ('mysql:host=localhost;dbname=otopark', 'root' , '');




    
} catch (Exception $e) {
   $e -> getMessage();
}

ob_start();
session_start();




?>