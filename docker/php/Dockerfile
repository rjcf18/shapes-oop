FROM php:8.0-fpm

VOLUME /app
WORKDIR /app

RUN apt-get update && \
    apt-get install -y \
    git \
    curl \
    nano

ARG PHP_USER_UID=110
ARG PHP_USER_GID=115

# Create user and group with the host user's UID and GID
RUN groupadd --gid ${PHP_USER_GID} phpuser && \
    useradd -l --uid ${PHP_USER_UID} --gid ${PHP_USER_GID} phpuser && \
    mkhomedir_helper phpuser && \
    adduser phpuser sudo

ENV USER="phpuser"

# Install composer and make it available to all users
RUN mkdir -p ~/.composer && \
    cd ${HOME} && \
    curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    mkdir -p ~/.local/bin && \
    php composer-setup.php --install-dir=${HOME}/.local/bin --filename=composer --version=1.10.19 && \
    rm composer-setup.php && \
    echo 'PATH=${PATH}:~/.local/bin' >> ~/.bashrc && \
    chmod +x ~/.local/bin/composer && \
    mv ~/.local/bin/composer /usr/local/bin/composer

USER phpuser
