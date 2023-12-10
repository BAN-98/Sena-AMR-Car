<?php include('../Libs/Inc/header.php') ?>
<div class="box" style="height: 480px;">
    <div class="form" style="height: 480px;">

        <h2>Sing in</h2>
        <form id="login" action="Controllers/main.php" method="post">
            <div class="inputBox">
                <input type="text" name="username" required="required">
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required">
                <span>Password</span>
                <i></i>
            </div>
            <div class="links">
                <a href="">Forgot your password</a>
                <a href="SingUp.php">Sing Up</a>
            </div>
            <input type="hidden" name="action" value="login">
            <input type="submit" id='login' value="Login">

        </form>

    </div>
</div>
<script type="module" src="../../js/login.js"></script>
<?php include('../Libs/Inc/footer.php') ?>