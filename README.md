YiiXExtension
============

Provides integration layer for the [Yii framework](http://www.yiiframework.com/):

between Behat 3.5+ and Yii.

Behat configuration
-------------------

```yml
default:
  extensions:

    Behat\YiiXExtension\Extension:
      framework_script: ../../framework/yii.php
      config_script: ../config/test.php
      application_class_name: yii\web\Application
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
