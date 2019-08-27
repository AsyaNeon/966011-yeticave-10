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
    contacts          VARCHAR(255) UNIQUE COMMENT 'контакты'
)
    COMMENT ='пользователи';

CREATE INDEX uk_lot_title ON lot (title);
CREATE INDEX idx_lot_author_id ON lot (author_id);
CREATE INDEX idx_lot_winner_id ON lot (winner_id);
CREATE INDEX idx_lot_category_id ON lot (category_id);
CREATE INDEX idx_rate_author_id ON rate (author_id);
CREATE INDEX idx_rate_lot_id ON rate (lot_id);
CREATE INDEX uk_user_name ON users (name);