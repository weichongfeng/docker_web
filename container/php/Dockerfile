#php 容器配置

#设置镜像
FROM php:7.2-fpm
#设置作者
LABEL MAINTAINER "1181488349@qq.com"

#设置时区
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

#安装PHP扩展
RUN apt-get update \
    && apt-get install -y \
       libfreetype6-dev \
       libjpeg62-turbo-dev \
       libmcrypt-dev \
       libpng-dev \
    && docker-php-ext-install -j$(nproc) bcmath pdo_mysql \
    && pecl install redis-4.0.2 && docker-php-ext-enable redis \
    && pecl install xdebug-2.8.1.tgz && docker-php-ext-enable xdebug

#安装composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
#替换成阿里云镜像
RUN composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/

#修改uuid
RUN usermod -u 1000 www-data

