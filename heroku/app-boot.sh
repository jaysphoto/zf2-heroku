#!/usr/bin/env bash
# 
# Installs the web application
# @link https://github.com/bergie/heroku-buildpack-php
#
# bin/compile <build-dir>

# fail fast
set -e

BUILD_DIR=/app
LP_DIR=`cd $(dirname $0); cd ..; pwd`

# check if we have Composer dependencies and vendors are not bundled
if [ -f www/composer.json ] && [ -d www/vendor ]; then
  GIT_DIR_ORIG=$GIT_DIR
  unset GIT_DIR
  echo "-----> Installing Composer dependencies"
  COMPOSER_URL="http://getcomposer.org/composer.phar"
  curl --silent --max-time 60 --location "$COMPOSER_URL" > www/composer.phar
  cd www
  LD_LIBRARY_PATH=$BUILD_DIR/php/ext $BUILD_DIR/php/bin/php -c $BUILD_DIR/php/php.ini composer.phar install --prefer-source
  cd $BUILD_DIR
  rm www/composer.phar
  export GIT_DIR=$GIT_DIR_ORIG
fi