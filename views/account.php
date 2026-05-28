<?php
global $pdo;

if (!isset($_SESSION['user']['username'])) {
    header('Location: /'); 
    exit();
}

$login = $_SESSION['user']['username'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
$stmt->execute([$login]);
$user = $stmt->fetch();

// Если сессия есть, но пользователя вдруг удалили из БД
if (!$user) {
    session_destroy();
    header('Location: /');
    exit();
}
 
$userId = $user['id'];

/*----- Записи пользователя -----*/
$stmt = $pdo->prepare("
SELECT 
    record.*,
    services.name AS service_name,
    services.price AS service_price
FROM record
JOIN services ON record.service_id = services.id
WHERE record.user_id = ?
ORDER BY record.appointment_date DESC
");

$stmt->execute([$userId]);
$records = $stmt->fetchAll();
?>

<div class="account-block">
    <div class="account">

        <!-- левая часть -->
        <div class="account-left">
            <form class="avatar-form" method="POST" enctype="multipart/form-data">
                <div class="avatar-wrapper">
                    <img src="/assets/img/profiles_photo/<?= $user['img'] ?>" class="avatar-preview">

                    <div class="avatar-overlay">
                        <img src="/assets/img/camera.svg" class="camera-icon"></img>
                    </div>

                    <input type="file" name="uploadfile" class="avatar-input">
                </div>

                <input type="hidden" name="upload" value="1">
            </form>
            <details>
                <summary class="account-summary"><h3><?= $user['login'] ?></h3></summary>
                <p class="email-block"><?= $user['email'] ?>
                <a href="/redactEmail" class="edit-link" title="Изменить почту">
                    <img src="/assets/img/pencil.svg" alt="Редактировать" class="pencil-icon">
                </a>
                </p>
                <p><?= (new DateTime($user['created_at']))->format('d.m.Y') ?></p>
            </details>
        </div>

        <!-- правая часть -->
        <div class="account-right">
            <h2>История записей</h2>
            <div class="history">
                <?php if (count($records) > 0): ?>
                    <?php foreach ($records as $record): ?>
                        <div class="history-card">
                            <div class="card-top">
                                <img src="/assets/img/car-test.jpg">
                                <div class="card-info">
                                    <h3><?= htmlspecialchars($record['service_name']) ?></h3>
                                    <p>
                                        <?= (new DateTime($record['appointment_date']))->format('d.m.Y') ?> в 
                                        <?= substr($record['appointment_time'], 0, 5) ?>
                                    </p>
                                </div>
                            </div>

                            <div class="card-bottom">
                                <p><?= $record['service_price'] ?> ₽</p>
                                <h4><?= !empty($record['status']) ? htmlspecialchars($record['status']) : 'На рассмотрении' ?></h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-records">
                        <p>У вас пока нет записей</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<script>
    document.querySelector('.avatar-input').addEventListener('change', function() {
    if (this.files && this.files[0]) {
        this.closest('form').submit(); 
    }
});
</script>


