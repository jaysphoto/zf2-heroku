zf2-heroku
==========

Zend Framework 2 skeleton application for Heroku.

This is an experiment to deploy a ZF2 application using Composer in the 
Heroku cloud. Ofcourse we could have used git submodules, but this was more fun.

Requirements
------------

* PHP 5.3.3 or higher
* Zend Framework 2.x
* Heroku app based on the Cedar stack

Installation
------------

Once you've setup a Heroku Cedar App, the installation should be fully
automatic.

Example:

    master!zf2-heroku *> push heroku master
    Fetching repository, done.
    Counting objects: 1, done.
    Writing objects: 100% (1/1), 188 bytes | 0 bytes/s, done.
    Total 1 (delta 0), reused 0 (delta 0)
    
    -----> PHP app detected
    -----> Resolved composer.lock requirement for PHP >=5.3.3 to version 5.5.15.
    -----> Installing system packages...
           - PHP 5.5.15
           - Apache 2.4.10
           - Nginx 1.6.0
    -----> Installing PHP extensions...
           - zend-opcache (automatic; bundled, using 'ext-zend-opcache.ini')
    -----> Installing dependencies...
           Composer version 1e27ff5e22df81e3cd0cd36e5fdd4a3c5a031f4a 2014-08-11 15:46:48
    
     !     WARNING: You have put Composer's vendor directory under version control.
           That directory should not be in your Git repository; only composer.json
           and composer.lock should be added, with Composer handling installation.
           Please 'git rm --cached vendor/' to remove the folder from your index,
           then add '/vendor/' to your '.gitignore' list to remove this notice.
           For more information, refer to the Composer FAQ: http://bit.ly/1rlCSZU
    
           Loading composer repositories with package information
           Installing dependencies from lock file
             - Installing zendframework/zendxml (1.0.0)
               Loading from cache
           
             - Installing zendframework/zendframework (2.3.2)
               Loading from cache
           
           Generating optimized autoload files
    -----> Preparing runtime environment...
    -----> Discovering process types
           Procfile declares types -> web
    
    -----> Compressing... done, 64.6MB
    -----> Launching... done, v16
           http://jaysphoto.herokuapp.com/ deployed to Heroku
    
    To git@heroku.com:jaysphoto.git
       d4982ab..2e218af  master -> master

Heroku bootstrap
----------------

The following files are used to automate the Heroku bootstrap:

* Procfile (Cedar 'boot' file, which boots the web server)
* composer.json

Documentation
-------------

When the application is pushed to heroku the following will happen:
* Heroku reads the Procfile and boots apache2 with php
* Apache is configured and a httpd process is launched
* Composer installs ZF2 and its dependencies

It takes a few seconds for composer to install Zend Framework 2.

Links
-----

This application and the ideas it's based upon is built on the work of others:

* [Composer](http://getcomposer.org/)
* [Heroku buildpack for PHP](https://github.com/heroku/heroku-buildpack-php)
* [Heroku Cedar Stack](https://devcenter.heroku.com/articles/cedar)
* [ZendSkeletonApplication](https://github.com/zendframework/ZendSkeletonApplication)
