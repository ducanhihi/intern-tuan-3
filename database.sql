CREATE DATABASE tuan3;
USE tuan3;
CREATE TABLE categories (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(55)
);

CREATE TABLE brands (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(55)
);

CREATE TABLE users (
	id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(55) NOT NULL,
    email VARCHAR(55) UNIQUE NOT NULL,
    password VARCHAR(55) NOT NULL,
    create_at TIMESTAMP DEFAULT current_timestamp
);

CREATE TABLE products (
	id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    price INT NOT NULL,
    stock INT NOT NULL,
    description TEXT,
    image VARCHAR(255),
    create_at TIMESTAMP DEFAULT current_timestamp,
    category_id INT,
    brand_id INT,
    FOREIGN KEY (brand_id) REFERENCES brands(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE orders (
	id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    total INT NOT NULL,
    create_at TIMESTAMP DEFAULT current_timestamp,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
CREATE TABLE order_items (
  id INT PRIMARY KEY AUTO_INCREMENT,
  product_id INT,
  order_id INT,
  quantity INT,
  price INT,
  FOREIGN KEY (product_id) REFERENCES products(id),
  FOREIGN KEY (order_id) REFERENCES orders(id)
);
INSERT INTO categories (id, name)
VALUE (1, 'Apple');
INSERT INTO categories (id, name)
VALUE (2, 'Samsung');
INSERT INTO categories (id, name)
VALUE (3, 'Nokia');
INSERT INTO categories (id, name)
VALUE (4, 'Vivo');
INSERT INTO categories (id, name)
VALUE (5, 'Oppo');

CREATE TABLE cart (
	id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE cart_items (
	id INT PRIMARY KEY AUTO_INCREMENT,
    cart_id INT,
    product_id INT,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cart_id) REFERENCES cart(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);