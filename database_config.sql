CREATE DATABASE IF NOT EXISTS db_artists_shop;

USE db_artists_shop;

CREATE TABLE IF NOT EXISTS user (
    id int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL UNIQUE,
    passwd varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS product (
    id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    title varchar(255) NOT NULL,
    description text NOT NULL,
    camera_specs text NOT NULL,
    capture_date datetime NOT NULL,
    thumbnail_path varchar(255) NOT NULL,
    user_id int(11) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE IF NOT EXISTS tag (
    id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    tag_name varchar(32) UNIQUE
);

CREATE TABLE IF NOT EXISTS product_tag (
    id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    product_id int(11) NOT NULL,
    tag_id int(11) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES product(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tag(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS tier (
    id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    price decimal(8, 2) NOT NULL,
    with_watermark_path varchar(255) NOT NULL,
    no_watermark_path varchar(255) NOT NULL,
    size ENUM('small', 'medium', 'large') NOT NULL,
    product_id int(11) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES product(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS order_item (
    id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_id int(11) NOT NULL,
    tier_id int(11) NOT NULL,
    created_at datetime NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
    FOREIGN KEY (tier_id) REFERENCES tier(id) ON DELETE CASCADE
);