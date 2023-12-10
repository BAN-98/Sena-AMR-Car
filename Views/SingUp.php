<?php include('../Libs/Inc/header.php') ?>
<div class="box">
    <div class="form">

        <h2> Registrate </h2>
        <form id="register" method="post">
            <div class="inputBox">
                <input type="text" name="username" required="required">
                <span>Nombre de Usario</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="email" name="email" required="required">
                <span>Email</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" name="adress" required="required">
                <span>Direccion</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" name="phone" required="required">
                <span>Telefono</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required">
                <span>Contraseña</span>
                <i></i>
            </div>
            <input type="hidden" name="action" value="register">
            <div class="links">
                <a href="login.php">Ya tienes una cuenta? Inicia Sesion</a>
            </div>
            <div style="display: flex; justify-content: center;">
                <input type="submit" id='login' value="Login">
            </div>

        </form>
    </div>
</div>
<script type="module" src="../../js/register.js"></script>
<?php include('../Libs/Inc/footer.php') ?>