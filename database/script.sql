create table category
(
    id         int auto_increment
        primary key,
    title      varchar(256) not null,
    thumbnails varchar(255) null
);

create table comment_news
(
    id         int auto_increment
        primary key,
    user_id    int                                 null,
    news_id    int                                 null,
    content    varchar(255)                        null,
    created_at timestamp default CURRENT_TIMESTAMP null
);

create table contact
(
    id      int auto_increment
        primary key,
    name    varchar(255)  null,
    email   varchar(255)  null,
    title   varchar(255)  null,
    message varchar(3000) null
);

create table news
(
    id          int auto_increment
        primary key,
    title       varchar(255)                        null,
    thumbnails  varchar(255)                        null,
    content     text                                null,
    description varchar(255)                        null,
    created_at  timestamp default CURRENT_TIMESTAMP null
);

create table notification
(
    id         int auto_increment
        primary key,
    user_id    int                                  null,
    content    varchar(255)                         null,
    url        varchar(255)                         null,
    is_read    tinyint(1) default 0                 null,
    created_at datetime   default CURRENT_TIMESTAMP null
);

create table `order`
(
    id         int auto_increment
        primary key,
    user_id    int                                          not null,
    address_id int                                          not null,
    status     enum ('Processing', 'Canceled', 'Delivered') null,
    note       varchar(255)                                 null,
    created_at timestamp default CURRENT_TIMESTAMP          not null on update CURRENT_TIMESTAMP
);

create table unit
(
    id    int auto_increment
        primary key,
    title varchar(50) not null
);

create table product
(
    id          int auto_increment
        primary key,
    name        varchar(256)    not null,
    thumbnails  varchar(256)    not null,
    rating      float default 0 not null,
    description text            not null,
    unit_id     int             not null,
    price       int             not null,
    quantity    int             not null,
    num_rate    int   default 0 null,
    constraint fk_product_unit_id
        foreign key (unit_id) references unit (id)
);

create table product_category
(
    product_id  int not null,
    category_id int not null,
    primary key (product_id, category_id),
    constraint fk_product_category_category_id
        foreign key (category_id) references category (id),
    constraint fk_product_category_product_id
        foreign key (product_id) references product (id)
);

create table product_image
(
    id         int auto_increment
        primary key,
    product_id int          not null,
    image_url  varchar(256) not null,
    constraint fk_product_image_product_id
        foreign key (product_id) references product (id)
);

create table product_order
(
    order_id   int not null,
    product_id int not null,
    quantity   int not null,
    unit_id    int not null,
    price      int not null,
    primary key (order_id, product_id),
    constraint fk_product_order_order_id
        foreign key (order_id) references `order` (id),
    constraint fk_product_order_product_id
        foreign key (product_id) references product (id),
    constraint fk_product_order_unit_id
        foreign key (unit_id) references unit (id)
);

create table user
(
    id         int auto_increment
        primary key,
    email      varchar(100)                                             not null,
    password   varchar(256)                                             not null,
    first_name varchar(10)                                              not null,
    last_name  varchar(20)                                              not null,
    avatar     varchar(256) default '/public/images/default_avatar.jpg' null,
    phone      varchar(15)                                              null,
    role       enum ('admin', 'customer')                               not null,
    constraint uc_user_email
        unique (email)
);

create table address
(
    id      int auto_increment
        primary key,
    user_id int          not null,
    address varchar(256) not null,
    constraint fk_address_user_id
        foreign key (user_id) references user (id)
);

create table comment_product
(
    id         int auto_increment
        primary key,
    user_id    int                                 null,
    product_id int                                 null,
    content    varchar(255)                        null,
    created_at timestamp default CURRENT_TIMESTAMP null,
    constraint comment_product_product_id_fk
        foreign key (product_id) references product (id),
    constraint comment_product_user_id_fk
        foreign key (user_id) references user (id)
);

create table product_cart
(
    user_id    int not null,
    product_id int not null,
    quantity   int not null,
    primary key (user_id, product_id),
    constraint fk_product_cart_product_id
        foreign key (product_id) references product (id),
    constraint fk_product_cart_user_id
        foreign key (user_id) references user (id)
);

create table rate_product
(
    id         int auto_increment
        primary key,
    user_id    int                                 null,
    product_id int                                 null,
    rate       int                                 not null,
    content    varchar(255)                        null,
    created_at timestamp default CURRENT_TIMESTAMP null,
    constraint rate_product_product_id_fk
        foreign key (product_id) references product (id),
    constraint rate_product_user_id_fk
        foreign key (user_id) references user (id)
);


