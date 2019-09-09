<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное
            снаряжение.</p>
        <ul class="promo__list">
            <?php foreach ($categories as $value): ?>
                <li class="promo__item promo__item--<?= $value['code'] ?>">
                    <a class="promo__link" href="pages/all-lots.html"><?= $value['title'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            <?php foreach ($lots as $value): ?>
                <li class="lots__item lot">
                    <div class="lot__image">
                        <img src="<?= esc($value['image']) ?>" width="350" height="260" alt="Изображение товара">
                    </div>
                    <div class="lot__info">
                        <span class="lot__category"> <?= esc($value['category']) ?></span>
                        <h3 class="lot__title">
                            <a class="text-link" href="/?id=<?= $value['id'] ?>"><?= esc($value['title']) ?></a>
                        </h3>
                        <div class="lot__state">
                            <div class="lot__rate">
                                <span class="lot__amount">Стартовая цена</span>
                                <span class="lot__cost"><?= shows_cost(esc($value['initial_cost'])) ?></span>
                            </div>
                            <?php if (get_time_range($value['date_completion'])[0] === "00"): ?>
                                <div class="lot__timer timer timer--finishing">
                                    <?= get_time_range($value['date_completion'])[0] . ':' . get_time_range($value['date_completion'])[1] ?>
                                </div>
                            <?php else: ?>
                                <div class="lot__timer timer">
                                    <?= get_time_range($value['date_completion'])[0] . ':' . get_time_range($value['date_completion'])[1] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>