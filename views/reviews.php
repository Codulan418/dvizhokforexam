<div class="reviews-page">
    <div class="container">
        <h1 class="reviews-title">Отзывы клиентов</h1>
        <!---------------------------------------------------Список отзывов--------------------------------------------------->
        <div class="reviews-list">
            
            <?
            foreach ($reviews as $row){?>
                <div class="review-item">
                    <div class="review-header">
                        <div class="review-name-date">
                            <span class="review-name"><?= htmlspecialchars($row['login']) ?></span>
                            <span class="review-date"><?= date('d.m.Y', strtotime($row['created'])) ?></span>
                        </div>
                        <div class="review-stars">
                            <?for ($i = 1; $i <= 5; $i++){?>
                                <span class="<?= $i <= $row['rating'] ? 'star-full' : 'star-empty' ?>">★</span>
                            <?}?>
                        </div>
                    </div>
                    <div class="review-text">
                        <?= nl2br(htmlspecialchars($row['text'])) ?>
                    </div>
                </div>
            <?}?>
        
        </div>
            <?if ($totalPages > 1){?>
                <div class="pagination">
                    <?if ($page > 1){?>
                        <a href="?page=<?= $page - 1 ?>" class="prev">← Назад</a>
                    <?}?>
                    
                    <?for ($i = 1; $i <= $totalPages; $i++){?>
                        <a href="?page=<?= $i ?>" class="<?= $i === $page ? 'active' : '' ?>">
                            <?= $i ?>
                        </a>
                    <?}?>
                    
                    <?if ($page < $totalPages){?>
                        <a href="?page=<?= $page + 1 ?>" class="next">Вперёд →</a>
                    <?}?>
                </div>
            <?}?>
        <!---------------------------------------------------форма отзывов--------------------------------------------------->
        <div class="reviews-form">

            <h2>Оставить отзыв</h2>

                <? if (isset($_SESSION['review_error'])){ ?>
                    <div class="auth-error">
                        <?php 
                        echo htmlspecialchars($_SESSION['review_error']);
                        unset($_SESSION['review_error']);
                        ?>
                    </div>
                <?}?>
                
                <? if (isset($_SESSION['review_success'])){ ?>
                    <div class="auth-success">
                        <?php 
                        echo htmlspecialchars($_SESSION['review_success']);
                        unset($_SESSION['review_success']);
                        ?>
                    </div>
                <?}?>

            <form class="form" method="POST" action="/reviews">
                
                <div class="rating-block">
                    <span class="rating-label">Ваша оценка:</span>
                    <div class="rating-stars">
                        <input type="radio" name="rating" id="star5" value="5" <?= (($_SESSION['old_rating'] ?? 0) == 5) ? 'checked' : ''; ?>>
                        <label for="star5">★</label>
                        <input type="radio" name="rating" id="star4" value="4" <?= (($_SESSION['old_rating'] ?? 0) == 4) ? 'checked' : ''; ?>>
                        <label for="star4">★</label>
                        <input type="radio" name="rating" id="star3" value="3" <?= (($_SESSION['old_rating'] ?? 0) == 3) ? 'checked' : ''; ?>>
                        <label for="star3">★</label>
                        <input type="radio" name="rating" id="star2" value="2" <?= (($_SESSION['old_rating'] ?? 0) == 2) ? 'checked' : ''; ?>>
                        <label for="star2">★</label>
                        <input type="radio" name="rating" id="star1" value="1" <?= (($_SESSION['old_rating'] ?? 0) == 1) ? 'checked' : ''; ?>>
                        <label for="star1">★</label>
                    </div>
                </div>
                <input type="text" name="name" placeholder="Имя" value="<?= htmlspecialchars($_SESSION['user']['username'])?? ''?>">
                <textarea name="reviews_textarea" placeholder="Ваш отзыв (до 80 символов)" maxlength="80" rows="4"><?= htmlspecialchars($_SESSION['old_text'] ?? ''); ?></textarea>
                <div class="char-counter">Осталось символов:80</div>
                <button type="submit" class="btn">Отправить отзыв</button>
            </form>

        </div>
    </div>
</div>

<? 
    unset($_SESSION['old_rating']);
    unset($_SESSION['old_text']);
?>
