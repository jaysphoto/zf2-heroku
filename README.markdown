ZF2-Heroku
==========

Zend Framework skeleton application for Heroku

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

    jaysphoto@sandbox:~/165196 (zf2-heroku) $ git push heroku HEAD:master                                                                                                                                                                           
    Counting objects: 7, done.                                                                                                                                                                                                                      
    Delta compression using up to 2 threads.                                                                                                                                                                                                        
    Compressing objects: 100% (4/4), done.                                                                                                                                                                                                          
    Writing objects: 100% (5/5), 501 bytes, done.                                                                                                                                                                                                   
    Total 5 (delta 2), reused 0 (delta 0)                                                                                                                                                                                                           
    ----->  PHP app detected                                                                                                                                                                                                                         
    ----->  Bundling Apache version 2.2.22                                                                                                                                                                                                           
    ----->  Bundling PHP version 5.3.10                                                                                                                                                                                                              
    ----->  Discovering process types                                                                                                                                                                                                                
            Procfile declares types -> web                                                                                                                                                                                                           
    
    ----->  Compiled slug size: 9.6MB                                                                                                                                                                                                                
    ----->  Launching... done, v13                                                                                                                                                                                                                   
            http://jaysphoto.herokuapp.com deployed to Heroku

Heroku bootstrap
----------------

The following files are used to automate the Heroku bootstrap:

* Procfile (Cedar 'boot' file, which boots the web server)
* heroku/app-boot.sh (PHP Web application bootstrap file)
* heroku/web-boot.sh (httpd bootstrap file)
* heroku/conf/default.conf (Apache default config)
* composer.json

Documentation
-------------

When the application is pushed to heroku the following will happen:
* Heroku reads the Procfile and starts the web-boot.sh script
* Apache is configured and a temporary httpd process is launched
* Composer installs ZF2 and its dependencies
* When ready, the httpd is reconfigured for ZF2 and restarted

It takes over a minute for composer to install Zend Framework 2. While composer 
is at work, the contents of the index.php in the web root is displayed.

The temporary httpd is necessary, otherwise the App will be marked as 'crashed'
by Heroku and the 'R10 boot timeout' message is displayed.

Links
-----

@link http://getcomposer.org/
@link https://github.com/heroku/heroku-buildpack-php
@link https://github.com/zendframework/ZendSkeletonApplication
@link https://devcenter.heroku.com/articles/cedar
@link https://devcenter.heroku.com/articles/error-codes#r10-boot-timeout