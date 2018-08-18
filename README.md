YiiXExtension
============

Provides integration layer for the [Yii framework](http://www.yiiframework.com/):

between Behat 3.5+ and Yii2.

Behat configuration
-------------------

```yml
default:
    extensions:
        Behat\YiiXExtension\ServiceContainer\YiiXExtension:
              file_path_style: absolute
              framework_script: '/usr/src/php_library/yii2_framework/Yii.php'
              config_script: [ '/wwwroot/scm.ddxq.mobi/src/config/dev.php','/wwwroot/scm.ddxq.mobi/src/config/base_admin.php']
              application_class_name: yii\web\Application
              parameters: ~
```

Installation
------------

```json
{
    "require-dev": {
        "behat/behat": "^3.5",
        "phpunit/phpunit": "^7.3",
        "behat/mink": "^1.7",
        "behat/mink-extension": "^2.3",
        "behat/mink-goutte-driver": "^1.2",
        "behat/mink-selenium2-driver": "^1.3",
        "behat/mink-browserkit-driver": "^1.3"
    }
}

```

```bash
$ composer update 'behat/mink' 'behat/mink-extension' 'behatx/yiix-extension'
```

Copyright
---------

Copyright (c) 2018 Jeff.Liu (jeff.liu.guo@gmail.com). See LICENSE for details.

Maintainers
-----------

* Konstantin Kudryashov [jeff.liu](http://github.com/ainiaa) [lead developer]
* Other [awesome developers](https://github.com/ainiaa/behat_yii2_extension.git)
