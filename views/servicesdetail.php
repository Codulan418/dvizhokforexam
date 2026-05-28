<div class="frame two-columns">
    <img src="/assets/img/<?= htmlspecialchars($service['image']) ?>" alt="" class='img-info'>
    <div class="border-left">
        <h3><?= htmlspecialchars($service['name']) ?></h3>
        <p class='text-size-small'><?= htmlspecialchars($service['type']) ?></p>
        <p class='text-size-small'><?= htmlspecialchars($service['description']) ?></p>
        <h3><?= htmlspecialchars($service['price']) ?> ₽</h3>
        <button onclick="location.href='/record?service_id=<?= $service['id'] ?>'" class='btn'>Оформить заказ</button>
    </div>
</div>