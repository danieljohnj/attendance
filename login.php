<?php 

    $title='User Login';
    require_once 'includes/header.php';
    require_once 'includes/db/conn.php';
    
?>

<h1 class="text-centre"><?php echo $title ?> </h1>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <table class="table table - sm">
            <tr>
                <td><label for="username"> User name: * </label></td>
                <td><input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD']== 'POST') echo $_POST['username']; ?>">
                <?php if (empty($username) && $_SERVER['REQUEST_METHOD'] == 'POST') echo"<p class='text-danger'>$username_error</p>"; ?>
                </td>
            </tr>
            <tr>
                <td><label for="password"> Password: * </label></td>
                <td><input type="password" name="password" class="form-control" id="password">
                <?php if (empty($password) && isset($password_error)) echo "<p class= 'text-danger'>$password_error</p>";?>

                </td>
            </tr>
        </table><br/><br/>
        <input type="sumbit" value="login" class="btn btn-primary btn-block"><br/>
        <a href = "#"> Forgot Password </a>

</form><br/><br/><br/><br/>

<?php include_once 'includes/footer.php'?> 
