-- Create the database
CREATE DATABASE IF NOT EXISTS ecommerce_db;
USE ecommerce_db;

-- Create the products table for inventory management
CREATE TABLE IF NOT EXISTS products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT NOT NULL,
    image_url VARCHAR(255)
);

-- Insert sample products tailored to your IT/Tech background
INSERT INTO products (name, description, price, stock_quantity, image_url) VALUES
('Secure Wireless Router', 'High-performance router with advanced firewall and encryption support.', 89.99, 15, 'router.jpg'),
('Cybersecurity Pocket Guide', 'Comprehensive reference manual for network defense and security protocols.', 29.99, 40, 'book.jpg'),
('Mechanical Gaming Keyboard', 'RGB backlit keyboard with custom tactile switches for programming and daily use.', 64.99, 25, 'keyboard.jpg');
