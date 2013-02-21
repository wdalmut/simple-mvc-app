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

When the VM is running you can go to your browser and type: `http://localhost:8080/`. 
A simple `This is the first title` sentence should appear on your screen, if it appears
it means that Vagrant has configured the environment well (apache2/php5/mysql).
