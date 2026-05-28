<form class="auth-form" action="/register" method="POST">
            
            <?php if(isset($_SESSION['error'])): ?>
                <div class="auth-error">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <?php if(isset($_SESSION['success'])): ?>
                <div class="auth-success">
                    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>

            <input type="text" name="login" class="input" placeholder="Логин" value="<?php echo $_SESSION['old_login'] ?? '' ?>">
            <input type="email" name="email" class="input" placeholder="Почта" value="<?php echo $_SESSION['old_email'] ?? '' ?>">
            <input type="password" name="password" class="input" placeholder="Пароль">
            <input type="password" name="repeat_password" class="input" placeholder="Повторите пароль">
            
            <input type="submit" class="btn" value="Зарегистрироваться">
        </form>

