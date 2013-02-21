# simple-mvc-app

Just an example to try out Composer `create-project` command

```
$ curl -s http://getcomposer.org/installer | php
$ php composer.phar create-project wdalmut/simple-mvc-app my-simple-mvc-project
```

# Use Vagrant

In order to use Vagrant to run this app simple do

```
$ curl -s http://getcomposer.org/installer | php
$ php composer.phar install

$ git submodule init
$ git submodule update

$ vagrant up
```
