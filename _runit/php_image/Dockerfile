FROM debian:stable-slim

# INSTALL CURL
RUN apt update -y && apt install -y curl

# PUT PHP PACKAGES
RUN curl https://packages.sury.org/php/apt.gpg --output /etc/apt/trusted.gpg.d/php.gpg
RUN echo "deb https://packages.sury.org/php/ bullseye main" | tee /etc/apt/sources.list.d/php.list

# UPDATE PACKAGES
RUN apt update -y && apt upgrade -y

# INSTAL PHP AND DEPENDENCIES
RUN apt -y install php8.1-fpm php-mbstring php8.1-xml php8.1-opcache php8.1-common php8.1-gettext php8.1-curl php-readline php-tokenizer php8.1-grpc php8.1-protobuf php8.1-mongodb unzip

# COPY INIT SCRIPT
COPY init.sh /init.sh

# COPY COMPOSER
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer

ENTRYPOINT ["sh", "init.sh"]