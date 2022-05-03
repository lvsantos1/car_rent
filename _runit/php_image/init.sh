#!/bin/sh

cd /var/dev/php && composer update -n;

cd /var/dev/php/public && php -S 0.0.0.0:8080;