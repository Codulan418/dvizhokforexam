<div class="admin-panel">
    <h1>Управление пользователями</h1>
    
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Логин</th>
                <th>Email</th>
                <th>Роль</th>
                <th>Дата регистрации</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <? if (!empty($users)) { ?>
                <? foreach ($users as $user) { ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['login']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td>
                            <? if ($user['role_id'] == 1) { ?>
                                Пользователь
                            <? } elseif ($user['role_id'] == 2) { ?>
                                <span class="role-admin">Администратор</span>
                            <? } else { ?>
                                Модератор
                            <? } ?>
                        </td>
                        <td><?= date('d.m.Y', strtotime($user['created_at'])) ?></td>
                        <td class="actions">
                            <a href="/admin/users/edit/<?= $user['id'] ?>" class="btn-edit">✏️</a>
                            
                            <form action="/admin/users/delete/<?= $user['id'] ?>" method="POST" onsubmit="return confirm('Точно удалить пользователя <?= htmlspecialchars($user['login']) ?>?')" class="delete-form">
                                <button type="submit" class="btn-delete">🗑️</button>
                            </form>
                        </td>
                    </tr>
                <? } ?>
            <? } else { ?>
                <tr>
                    <td colspan="6">Нет пользователей</td>
                </tr>
            <? } ?>
        </tbody>
    </table>
    
    <? if ($totalPages > 1) { ?>
        <div class="pagination">
            <? if ($page > 1) { ?>
                <a href="?page=<?= $page - 1 ?>" class="prev">← Назад</a>
            <? } ?>
            
            <? for ($i = 1; $i <= $totalPages; $i++) { ?>
                <a href="?page=<?= $i ?>" class="<?= $i === $page ? 'active' : '' ?>">
                    <?= $i ?>
                </a>
            <? } ?>
            
            <? if ($page < $totalPages) { ?>
                <a href="?page=<?= $page + 1 ?>" class="next">Вперёд →</a>
            <? } ?>
        </div>
    <? } ?>
</div>