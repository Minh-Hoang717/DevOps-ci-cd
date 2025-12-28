# Sử dụng Image PHP kèm Apache
FROM php:8.1-apache

# Cài đặt extension để kết nối MySQL (PDO)
RUN docker-php-ext-install pdo pdo_mysql

# Bật Mod Rewrite của Apache (Để chạy được .htaccess)
RUN a2enmod rewrite

# Thiết lập thư mục làm việc
WORKDIR /var/www/html

# Copy toàn bộ code từ máy tính vào trong Container
COPY . /var/www/html/

# Thay đổi DocumentRoot của Apache trỏ vào thư mục public (Quan trọng!)
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf