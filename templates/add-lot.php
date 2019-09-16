<main>
    <nav class="nav">
        <ul class="nav__list container">
            <?php foreach ($categories as $value): ?>
                <li class="nav__item">
                    <a href="pages/all-lots.html"><?= $value['title'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <form class="form form--add-lot container form--invalid <?php if (isset($errors)): ?> form--invalid <?php endif; ?>"
          action="templates/add.php" method="post">
        <h2>Добавление лота</h2>
        <div class="form__container-two">
            <div class="form__item <?php if (isset($errors['title'])): ?> form__item--invalid <?php endif; ?>">
                <label for="lot-name">Наименование <sup>*</sup></label>
                <input id="lot-name" type="text" name="title" placeholder="Введите наименование лота">
                <?php if (isset($errors['title'])): ?>
                    <span class="form__error">Введите наименование лота</span>
                <?php endif; ?>
            </div>
            <div class="form__item <?php if (isset($errors['category_id'])): ?> form__item--invalid <?php endif; ?>">
                <label for="category">Категория <sup>*</sup></label>
                <select id="category" name="category_id">
                    <option>Выберите категорию</option>
                    <?php foreach ($categories as $value): ?>
                        <option value="<?=$value['id'] ?>"><?= $value['title'] ?></option>
                    <?php endforeach; ?>
                </select>
                <?php if (isset($errors['category_id'])): ?>
                    <span class="form__error">Выберите категорию</span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form__item form__item--wide <?php if (isset($errors['description'])): ?> form__item--invalid <?php endif; ?>">
            <label for="message">Описание <sup>*</sup></label>
            <textarea id="message" name="description" placeholder="Напишите описание лота"></textarea>
            <?php if (isset($errors['description'])): ?>
                <span class="form__error">Напишите описание лота</span>
            <?php endif; ?>
        </div>
        <div class="form__item form__item--file <?php if (isset($errors['file'])): ?> form__item--invalid <?php endif; ?>">
            <label>Изображение <sup>*</sup></label>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" name="lot-img" id="lot-img" value="">
                <label for="lot-img">
                    Добавить
                </label>
            </div>
        </div>
        <div class="form__container-three">
            <div class="form__item form__item--small <?php if (isset($errors['initial_cost'])): ?> form__item--invalid <?php endif; ?>">
                <label for="lot-rate">Начальная цена <sup>*</sup></label>
                <input id="lot-rate" type="text" name="initial_cost" placeholder="0">
                <?php if (isset($errors['initial_cost'])): ?>
                    <span class="form__error">Введите начальную цену</span>
                <?php endif; ?>
            </div>
            <div class="form__item form__item--small <?php if (isset($errors['step_rate'])): ?> form__item--invalid <?php endif; ?>">
                <label for="lot-step">Шаг ставки <sup>*</sup></label>
                <input id="lot-step" type="text" name="step_rate" placeholder="0">
                <?php if (isset($errors['step_rate'])): ?>
                    <span class="form__error">Введите шаг ставки</span>
                <?php endif; ?>
            </div>
            <div class="form__item <?php if (isset($errors['date_completion'])): ?> form__item--invalid <?php endif; ?>">
                <label for="lot-date">Дата окончания торгов <sup>*</sup></label>
                <input class="form__input-date" id="lot-date" type="text" name="date_completion" placeholder="Введите дату в формате ГГГГ-ММ-ДД">
                <?php if (isset($errors['date_completion'])): ?>
                    <span class="form__error">Введите дату завершения торгов</span>
                <?php endif; ?>
            </div>
        </div>
        <?php if (isset($errors)): ?>
            <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <?php endif; ?>
        <button type="submit" class="button">Добавить лот</button>
    </form>
</main>