<div class="admin-panel">
    <h1>Управление отзывами</h1>
    
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Пользователь</th>
                <th>Отзыв</th>
                <th>Оценка</th>
                <th>Дата</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <? if (!empty($reviews)) { ?>
                <? foreach ($reviews as $review) { ?>
                    <tr class="<?= $review['is_approved'] == 0 ? 'review-pending' : '' ?>">
                        <td><?= htmlspecialchars($review['id']) ?></td>
                        <td><?= htmlspecialchars($review['login']) ?></td>
                        <td class="review-text-full"><?= nl2br(htmlspecialchars($review['text'])) ?></td>
                        <td class="review-stars-admin">
                            <? for ($i = 1; $i <= 5; $i++) { ?>
                                <span class="<?= $i <= $review['rating'] ? 'star-full' : 'star-empty' ?>">★</span>
                            <? } ?>
                        </td>
                        <td><?= date('d.m.Y', strtotime($review['created'])) ?></td>
                        <td class="actions">
                            <? if ($review['is_approved'] == 0) { ?>
                                <form action="/admin/reviews/approve/<?= $review['id'] ?>" method="POST" class="inline-form">
                                    <button type="submit" class="btn-approve" title="Одобрить">✅</button>
                                </form>
                                <form action="/admin/reviews/delete/<?= $review['id'] ?>" method="POST" onsubmit="return confirm('Точно удалить отзыв?')" class="inline-form">
                                    <button type="submit" class="btn-delete" title="Удалить">🗑️</button>
                                </form>
                            <? } else { ?>
                                <form action="/admin/reviews/delete/<?= $review['id'] ?>" method="POST" onsubmit="return confirm('Точно удалить отзыв?')" class="inline-form">
                                    <button type="submit" class="btn-delete" title="Удалить">🗑️</button>
                                </form>
                            <? } ?>
                        </td>
                    </tr>
                <? } ?>
            <? } else { ?>
                <tr>
                    <td colspan="6">Нет отзывов</td>
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