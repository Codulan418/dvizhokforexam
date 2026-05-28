    <form method="POST" class="auth-form">

        <?php if (!empty($arrError)): ?>
            <div class="auth-error">
                <?php foreach ($arrError as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($success != ''): ?>
            <div class="auth-success">
                <p><?php echo $success; ?></p>
            </div>
        <?php endif; ?>

        <input type="email" name="new_email" class="input" placeholder="Новая почта">
        <input type="submit" class="btn" value="Изменить почту">
    </form>