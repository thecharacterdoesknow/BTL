-- Exported from QuickDBD: https://www.quickdatabasediagrams.com/
-- Link to schema: https://app.quickdatabasediagrams.com/#/d/3rsc1K
-- NOTE! If you have used non-SQL datatypes in your design, you will have to change these here.


CREATE TABLE `user` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `username` varchar(50)  NOT NULL ,
    `password` varchar(256)  NOT NULL ,
    `first_name` varchar(10)  NOT NULL ,
    `last_name` varchar(20)  NOT NULL ,
    `email` varchar(100)  NOT NULL ,
    `phone` varchar(15)  NOT NULL ,
    `role` enum('admin','customer')  NOT NULL ,
    PRIMARY KEY (
        `id`
    ),
    CONSTRAINT `uc_user_email` UNIQUE (
        `email`
    )
);

CREATE TABLE `address` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `user_id` int  NOT NULL ,
    `address` varchar(256)  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

-- hash_otp
-- -
-- email PK varchar(100) FK - user.email
-- hash text
CREATE TABLE `category` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `title` varchar(256)  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `product` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `name` varchar(256)  NOT NULL ,
    `thumnails` varchar(256)  NOT NULL ,
    `rating` int  NOT NULL ,
    `description` text  NOT NULL ,
    `unit_id` int  NOT NULL ,
    `price` int  NOT NULL ,
    `quantity` int  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `product_category` (
    `product_id` int  NOT NULL ,
    `category_id` int  NOT NULL ,
    PRIMARY KEY (
        `product_id`,`category_id`
    )
);

CREATE TABLE `product_image` (
    `product_id` int  NOT NULL ,
    `image_url` varchar(256)  NOT NULL ,
    PRIMARY KEY (
        `product_id`,`image_url`
    )
);

CREATE TABLE `product_cart` (
    `user_id` int  NOT NULL ,
    `product_id` int  NOT NULL ,
    `quantity` int  NOT NULL ,
    PRIMARY KEY (
        `user_id`,`product_id`
    )
);

CREATE TABLE `order` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `user_id` int  NOT NULL ,
    `address_id` int  NOT NULL ,
    `created_at` timestamp  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `product_order` (
    `order_id` int  NOT NULL ,
    `product_id` int  NOT NULL ,
    `quantity` int  NOT NULL ,
    `unit_id` int  NOT NULL ,
    `price` int  NOT NULL ,
    PRIMARY KEY (
        `order_id`,`product_id`
    )
);

CREATE TABLE `unit` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `title` varchar(50)  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

ALTER TABLE `address` ADD CONSTRAINT `fk_address_user_id` FOREIGN KEY(`user_id`)
REFERENCES `user` (`id`);

ALTER TABLE `product` ADD CONSTRAINT `fk_product_unit_id` FOREIGN KEY(`unit_id`)
REFERENCES `unit` (`id`);

ALTER TABLE `product_category` ADD CONSTRAINT `fk_product_category_product_id` FOREIGN KEY(`product_id`)
REFERENCES `product` (`id`);

ALTER TABLE `product_category` ADD CONSTRAINT `fk_product_category_category_id` FOREIGN KEY(`category_id`)
REFERENCES `category` (`id`);

ALTER TABLE `product_image` ADD CONSTRAINT `fk_product_image_product_id` FOREIGN KEY(`product_id`)
REFERENCES `product` (`id`);

ALTER TABLE `product_cart` ADD CONSTRAINT `fk_product_cart_user_id` FOREIGN KEY(`user_id`)
REFERENCES `user` (`id`);

ALTER TABLE `product_cart` ADD CONSTRAINT `fk_product_cart_product_id` FOREIGN KEY(`product_id`)
REFERENCES `product` (`id`);

ALTER TABLE `order` ADD CONSTRAINT `fk_order_user_id` FOREIGN KEY(`user_id`)
REFERENCES `user` (`id`);

ALTER TABLE `order` ADD CONSTRAINT `fk_order_address_id` FOREIGN KEY(`address_id`)
REFERENCES `address` (`id`);

ALTER TABLE `product_order` ADD CONSTRAINT `fk_product_order_order_id` FOREIGN KEY(`order_id`)
REFERENCES `order` (`id`);

ALTER TABLE `product_order` ADD CONSTRAINT `fk_product_order_product_id` FOREIGN KEY(`product_id`)
REFERENCES `product` (`id`);

ALTER TABLE `product_order` ADD CONSTRAINT `fk_product_order_unit_id` FOREIGN KEY(`unit_id`)
REFERENCES `unit` (`id`);

