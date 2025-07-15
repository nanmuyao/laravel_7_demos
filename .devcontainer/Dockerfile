# 使用官方 PHP 镜像作为基础镜像
FROM php:7.4-fpm

# 安装系统依赖、zsh 和 PHP 扩展，并安装 oh-my-zsh
RUN apt-get update \
    && apt-get install -y \
        git \
        locales \
        unzip \
        libzip-dev \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        zip \
        curl \
        mariadb-client \
        zsh \
        telnet \
        htop \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd intl soap sockets opcache \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && sh -c "$(curl -fsSL https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh)" --unattended \
    && chsh -s $(which zsh)

# 安装 Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 安装 Xdebug
RUN pecl install xdebug-3.1.6 \
    && docker-php-ext-enable xdebug

# 设置工作目录
WORKDIR /var/www/html

## 已挂载代码目录，无需复制项目文件

# 暴露端口
EXPOSE 8000

# 启动命令
CMD ["php-fpm"]
