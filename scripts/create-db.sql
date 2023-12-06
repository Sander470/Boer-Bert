# run from mysql CLI first before the rest:
# 1: CREATE DATABASE IF NOT EXISTS `bos_mortuus`;
# 2: grant ALL PRIVILEGES on bos_mortuus.* to admin@localhost IDENTIFIED BY 'B055MAN69';

USE `bos_mortuus`;

CREATE TABLE IF NOT EXISTS `employee` (
    id INT NOT NULL AUTO_INCREMENT,
    iban VARCHAR(50),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS `user` (
    id INT NOT NULL AUTO_INCREMENT,
    employee_id INT NULL,
    mail VARCHAR(300) NOT NULL,
    password BINARY(64) NULL,
    salt VARCHAR(20) NULL,
    first_name VARCHAR(256) NULL,
    last_name VARCHAR(256) NULL,
    phone VARCHAR(15) NULL,
    street VARCHAR(200) NULL,
    city VARCHAR(200) NULL,
    postal_code VARCHAR(15) NULL,
    country VARCHAR(50) NULL,
    creation_date datetime DEFAULT NOW(),
    PRIMARY KEY (id),
    FOREIGN KEY (employee_id) REFERENCES employee(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `group` (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(30),
    RW_review SMALLINT NULL,
    RW_order SMALLINT NULL,
    RW_user SMALLINT NULL,
    RW_service SMALLINT NULL,
    RW_plot SMALLINT NULL,
    RW_visits SMALLINT NULL,
    RW_contact SMALLINT NULL,
    RW_chat SMALLINT NULL,
    RW_message SMALLINT NULL,
    RW_page SMALLINT NULL,
    RW_activity SMALLINT NULL,
    RW_revenue SMALLINT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS `group_user` (
    user_id INT NOT NULL,
    group_id INT NOT NULL,
    PRIMARY KEY (user_id, group_id),
    FOREIGN KEY (user_id) REFERENCES `user`(id),
    FOREIGN KEY (group_id) REFERENCES `group`(id)
);

CREATE TABLE IF NOT EXISTS `plot` (
    id INT AUTO_INCREMENT NOT NULL,
    location VARCHAR(5) NOT NULL,
    image VARCHAR(200) NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS `plot_price` (
    plot_id INT AUTO_INCREMENT NOT NULL,
    year YEAR NOT NULL,
    month DATE NOT NULL,
    price_night INT NOT NULL,
    PRIMARY KEY(`plot_id`, `year`, `month`),
    FOREIGN KEY (plot_id) REFERENCES plot(id)
);

CREATE TABLE IF NOT EXISTS `order` (
    id INT AUTO_INCREMENT NOT NULL,
    plot_id INT NOT NULL,
    user_id INT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    paid BOOL DEFAULT false NOT NULL,
    cancelled BOOL DEFAULT false NOT NULL,
    preference VARCHAR(1000) NULL,
    extra_notes VARCHAR(1000) NULL,
    accommodation_type VARCHAR(40) NOT NULL,
    num_people SMALLINT NOT NULL,
    setup_help BOOL NOT NULL,
    date datetime DEFAULT NOW(),
    PRIMARY KEY (id),
    FOREIGN KEY (plot_id) REFERENCES plot(id),
    FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE IF NOT EXISTS `visit` (
    id INT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    order_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (order_id) REFERENCES `order`(id)
);

CREATE TABLE IF NOT EXISTS `review` (
    id INT NOT NULL,
    visit_id INT NOT NULL,
    rating TINYINT NOT NULL,
    date datetime DEFAULT NOW(),
    body VARCHAR(300),
    PRIMARY KEY (id),
    FOREIGN KEY (visit_id) REFERENCES `visit`(id)
);

CREATE TABLE IF NOT EXISTS `version` (
    identifier VARCHAR(40) NOT NULL,
    file_location VARCHAR(200) NOT NULL,
    version FLOAT NOT NULL,
    creation_date DATETIME DEFAULT NOW(),
    PRIMARY KEY (identifier)
);

CREATE TABLE IF NOT EXISTS `page` (
    name VARCHAR(40) NOT NULL,
    language VARCHAR(5) NOT NULL,
    version_identifier VARCHAR(40) NOT NULL,
    creation_date DATETIME DEFAULT NOW(),
    PRIMARY KEY (name, language),
    FOREIGN KEY (version_identifier) REFERENCES `version`(identifier)
);

CREATE TABLE IF NOT EXISTS `page_employee` (
    employee_id INT NOT NULL,
    page_title VARCHAR(40) NOT NULL,
    PRIMARY KEY (employee_id, page_title),
    FOREIGN KEY (employee_id) REFERENCES `employee`(id),
    FOREIGN KEY (page_title) REFERENCES `page`(name)
);