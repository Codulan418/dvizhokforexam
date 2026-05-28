<div class="admin-form">
    <h1>Редактирование пользователя</h1>
    
    <form action="/admin/users/update/<?= $user['id'] ?>" method="POST">
        <div class="form-group">
            <label>Логин</label>
            <input type="text" name="login" value="<?= htmlspecialchars($user['login'] ?? '') ?>">
        </div>
        
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>">
        </div>
        
        <div class="form-group">
            <label>Роль</label>
            <select name="role_id">
                <option value="1" <?= $user['role_id'] == 1 ? 'selected' : '' ?>>Пользователь</option>
                <option value="2" <?= $user['role_id'] == 2 ? 'selected' : '' ?>>Администратор</option>
                <option value="3" <?= $user['role_id'] == 3 ? 'selected' : '' ?>>Модератор</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Новый пароль (оставьте пустым, если не менять)</label>
            <input type="password" name="password" placeholder="Новый пароль">
        </div>
        
        <button type="submit" class="btn-save">Сохранить</button>
        <a href="/admin/users" class="btn-cancel">Отмена</a>
    </form>
</div>
