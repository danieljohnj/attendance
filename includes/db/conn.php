<?php
//development connection (local)
    //$host = '127.0.0.1';
    //$db =   'attendance_db';
    //$user = 'root';
    //$pass = '';
   // $charset = 'utf8mb4';

    //remote database connection
    $host = 'sql.freedb.tech';
    $db =   'freedb_php_remote_sql';
    $user = 'freedb_mysqltest';
    $pass = '8Ets62#%DZZpEc$';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{

        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {

            //echo "<h1 class='text-danger'>No datbase found</h1>";
            throw new PDOException($e->getMessage());



            }

            require_once 'crud.php';
            require_once 'user.php';
            $crud = new crud($pdo);
            $user = new user($pdo);

            $user->insertUser("admin","@dministrat0r");
?>