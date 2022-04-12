B1: tạo database
create table products (
 id int primary key auto_increment,
 title varchar(250) not null,
 thumbnail varchar(500),
 content longtext,
 price float,
 created_at datetime,
 updated_at datetime,
 type varchar(20) //IP : iphone , SS: Samsung, OP : oppo                         
);
create table users(
 id int primary key auto_increment,
 username varchar(20),
 password varchar(200),
 fullname varchar(100),
 phone_number varchar(20),
 email varchar(200),
 address varchar(200),
 token varchar(50)
);
create table orders (
 id int primary key auto_increment,
 user_id int references user (id),
 order_date datetime
);

create table order_details (
 id int primary key auto_increment,
 order_id int references orders (id),
 product_id int references products (id),
 num int,
 price float
);

B2: khởi tạo cây thư mục sẽ làm 
    - db
        + config.php
        + dbhelpers.php 
        + utils.php 
    - api 
        + process_user_infor.php
        + cookie.php 
        + process_register.php
        + process_login.php
        + process_checkout.php 
        + process_change_password.php
    - layout
        - no_login
            + header.php 
            + footer.php 
        + header.php 
        + footer.php 
    - user 
        - image
        - no_login
            + contact.php
            + detail.php
            + iPhone.php
            + oppo.php
            + samsung.php
            + tracking.php
        + register.php 
        + login.php
        + product.php
        + detail.php
        + cart.php
        + checkout.php
        + logout.php
        + complete.php
        + iPhone.php
        + oppo.php
        + samsung.php
        + user_infor.php
        + contact.php
        + tracking.php
        + change_password.php
    + index.php


