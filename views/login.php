<form class="auth-form" action="/login" method="POST">
        <?php if(isset($_SESSION['error'])): ?>
            <div class="auth-error">
                <?php 
                    echo $_SESSION['error']; 
                    unset($_SESSION['error']); 
                ?>
            </div>
        <?php endif; ?>

        <input type="text" name="login" class="input" placeholder="Логин или Email" value="<?echo $_SESSION['old_login'] ?? ''?>">
        <input type="password" name="password" class="input" placeholder="Пароль">
        <input type="submit" class="btn" value="Войти">
    </form>

