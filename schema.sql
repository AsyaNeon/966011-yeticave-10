CREATE TABLE categories
(
    id_categories INT AUTO_INCREMENT PRIMARY KEY,
    title         CHAR,
    value         CHAR UNIQUE
);

CREATE TABLE lot
(
    id_lot          INT AUTO_INCREMENT PRIMARY KEY,
    date_creation   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    title           CHAR      NOT NULL,
    description     TEXT,
    image           CHAR UNIQUE,
    initial_cost    INT,
    date_completion TIMESTAMP NOT NULL,
    step_rate       INT,
    author          CHAR,
    winner          CHAR,
    category        CHAR
);

CREATE TABLE rate
(
    id_rate       INT AUTO_INCREMENT PRIMARY KEY,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    rate          INT,
    author        CHAR,
    lot           CHAR
);

CREATE TABLE user
(
    id_user           INT AUTO_INCREMENT PRIMARY KEY,
    date_registration TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    email             CHAR NOT NULL UNIQUE,
    name              CHAR NOT NULL UNIQUE,
    password          CHAR NOT NULL UNIQUE,
    avatar            CHAR,
    contacts          CHAR UNIQUE,
    created_lots      CHAR,
    rates             CHAR
);

CREATE INDEX lots ON lot (title);