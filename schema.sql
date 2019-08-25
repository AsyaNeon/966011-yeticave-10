CREATE TABLE categories
(
    id    INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) UNIQUE COMMENT 'название категории',
    code  VARCHAR(255) COMMENT 'Символьный код нужен, чтобы назначить правильный класс в меню категорий'
)
    COMMENT ='категории лотов';

CREATE TABLE lot
(
    id              INT(11) AUTO_INCREMENT PRIMARY KEY,
    date_create     TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'дата и время, создания лота',
    title           VARCHAR(255) NOT NULL COMMENT 'название: задается пользователем',
    description     TEXT(1000) COMMENT 'описание: задается пользователем',
    image           VARCHAR(255) UNIQUE COMMENT 'изображение: ссылка на файл изображения',
    initial_cost    INT(10) COMMENT 'начальная цена',
    date_completion TIMESTAMP    NOT NULL COMMENT 'дата завершения',
    step_rate       INT(10) COMMENT 'шаг ставки',
    author_id       INT(11) COMMENT 'автор: пользователь, создавший лот - id.user',
    winner_id       INT(11) COMMENT 'победитель: пользователь, выигравший лот - id.user',
    category_id     INT(11) COMMENT 'категория объявления - id.categories'
)
    COMMENT ='список лотов';

CREATE TABLE rate
(
    id          INT(11) AUTO_INCREMENT PRIMARY KEY,
    date_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'дата и время размещения ставки',
    rate        INT(10) COMMENT 'сумма: цена, по которой пользователь готов приобрести лот',
    author_id   INT(11) COMMENT 'пользователь - id.user',
    lot_id      INT(11) COMMENT 'лот - id.lot'
)
    COMMENT ='ставки';

CREATE TABLE users
(
    id                INT(11) AUTO_INCREMENT PRIMARY KEY,
    date_registration TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'дата и время регистрации пользователя',
    email             VARCHAR(255) NOT NULL UNIQUE COMMENT 'email',
    name              VARCHAR(255) NOT NULL UNIQUE COMMENT 'имя',
    password          VARCHAR(255) NOT NULL COMMENT 'пароль',
    avatar            VARCHAR(255) COMMENT 'аватар: ссылка на загруженный аватар пользователя',
    contacts          VARCHAR(255) UNIQUE COMMENT 'контакты',
    created_lots_id   INT(11) COMMENT 'лоты созданные пользователем - id.lot',
    rates_id          INT(11) COMMENT 'ставки созданные пользователем - id.rate'
)
    COMMENT ='пользователи';

CREATE TABLE all_lots_user
(
    id      INT(11) AUTO_INCREMENT PRIMARY KEY,
    lot_id  INT(11) NOT NULL COMMENT 'id лота',
    user_id INT(11) NOT NULL COMMENT 'id пользоателя создавшего лот'
) COMMENT ='для связи нескольких лотов с одним пользователем';

CREATE TABLE all_rates_user
(
    id       INT(11) AUTO_INCREMENT PRIMARY KEY,
    rates_id INT(11) NOT NULL COMMENT 'id ставки',
    user_id  INT(11) NOT NULL COMMENT 'id пользоателя создавшего ставку'
) COMMENT ='для связи нескольких ставок с одним пользователем';

CREATE INDEX lot_1 ON lot (title);
CREATE INDEX lot_2 ON lot (author_id);
CREATE INDEX lot_3 ON lot (winner_id);
CREATE INDEX lot_4 ON lot (category_id);
CREATE INDEX rate_1 ON rate (author_id);
CREATE INDEX rate_2 ON rate (lot_id);
CREATE INDEX user_1 ON users (name);
CREATE INDEX user_2 ON users (created_lots_id);
CREATE INDEX user_3 ON users (rates_id);