INSERT INTO categories (title, code)
VALUES ('Доски и лыжи', 'boards'),
       ('Крепления', 'attachment'),
       ('Ботинки', 'boots'),
       ('Одежда', 'clothing'),
       ('Инструменты', 'tools'),
       ('Разное', 'other');

INSERT INTO lot (date_create, title, description, image, initial_cost, date_completion, step_rate, author_id, winner_id,
                 category_id)
VALUES (NOW(),
        '2014 Rossignol District Snowboard',
        'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами.
        Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а
        симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости.
        А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая
        графика от Шона Кливера еще никого не оставляла равнодушным.',
        'img/lot-1.jpg',
        10999,
        '2019-09-23',
        100,
        1,
        3,
        1),
       (NOW(),
        'DC Ply Mens 2016/2017 Snowboard',
        'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами.
        Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а
        симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости.
        А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая
        графика от Шона Кливера еще никого не оставляла равнодушным.',
        'img/lot-2.jpg',
        159999,
        '2019-09-24',
        150,
        3,
        2,
        1),
       (NOW(),
        'Крепления Union Contact Pro 2015 года размер L/XL',
        'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами.
        Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а
        симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости.
        А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая
        графика от Шона Кливера еще никого не оставляла равнодушным.',
        'img/lot-3.jpg',
        8000,
        '2019-09-25',
        100,
        1,
        2,
        2),
       (NOW(),
        'Ботинки для сноуборда DC Mutiny Charocal',
        'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами.
        Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а
        симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости.
        А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая
        графика от Шона Кливера еще никого не оставляла равнодушным.',
        'img/lot-4.jpg',
        10999,
        '2019-09-26',
        100,
        2,
        3,
        3),
       (NOW(),
        'Куртка для сноуборда DC Mutiny Charocal',
        'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами.
        Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а
        симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости.
        А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая
        графика от Шона Кливера еще никого не оставляла равнодушным.',
        'img/lot-5.jpg',
        7500,
        '2019-09-27',
        100,
        1,
        3,
        4),
       (NOW(),
        'Маска Oakley Canopy',
        'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами.
        Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а
        симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости.
        А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая
        графика от Шона Кливера еще никого не оставляла равнодушным.',
        'img/lot-6.jpg',
        5400,
        '2019-09-28',
        150,
        3,
        1,
        6);

INSERT INTO users (date_registration, email, name, password, avatar, contacts)
VALUES (NOW(), 'asya@gmail', 'asya', '12345', 'img/avatar-1.jpg', 'no'),
       (NOW(), 'asya1@gmail', 'asya1', '123456', 'img/avatar-2.jpg', 'yes'),
       (NOW(), 'asya2@gmail', 'asya2', '1234567', 'img/avatar-3.jpg', 'no-no');

INSERT INTO rate (date_create, rate, author_id, lot_id)
VALUES (NOW(), 11299, 1, 1),
       (NOW(), 5850, 3, 6),
       (NOW(), 6000, 1, 6);

# -- покажет все категории
# SELECT title
# FROM categories
# ORDER BY id ASC;
#
# -- покажет самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену,
# -- ссылку на изображение, цену, название категории
# SELECT l.title, initial_cost, image, c.title AS category, date_completion
# FROM lot l
# INNER JOIN categories c ON l.category_id = c.id
# WHERE date_completion > NOW()
# ORDER BY date_create DESC;
#
# -- показать лот по его id. Получите также название категории, к которой принадлежит лот
# SELECT l.title, c.title AS category
# FROM lot l
# INNER JOIN categories c ON l.category_id = c.id
# WHERE l.id = 1;
#
# -- обновить название лота по его идентификатору
# UPDATE lot
# SET title = '2014 Rossignol District Snowboard'
# WHERE id = 1;
#
# -- получить список ставок для лота по его идентификатору с сортировкой по дате
# SELECT l.title, r.date_create, u.name
# FROM rate r
# INNER JOIN lot l ON r.lot_id = l.id
# INNER JOIN users u ON r.author_id = u.id
# WHERE l.id = 1
# ORDER BY r.date_create DESC;




