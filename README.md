# Validator #

A validator on top of Symfony validator.

[![Latest Stable Version](https://poser.pugx.org/ebidtech/validator/v/stable.png)](https://packagist.org/packages/ebidtech/validator)
 [![Build Status](https://travis-ci.org/ebidtech/validator.png?branch=master)](https://travis-ci.org/ebidtech/validator) [![Coverage Status](https://coveralls.io/repos/ebidtech/validator/badge.png?branch=master)](https://coveralls.io/r/ebidtech/validator?branch=master) [![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/ebidtech/validator/badges/quality-score.png?s=38db28f9fc3b7b4286c479c772f4fcd8b4855282)](https://scrutinizer-ci.com/g/ebidtech/validator/) [![Dependency Status](https://www.versioneye.com/user/projects/52da5c4cec137510bf000380/badge.png)](https://www.versioneye.com/user/projects/52da5c4cec137510bf000380)

## Why to use? ##

Using Symfony validator with annotations or configuration (yml or xml) is just fine, but for simple cases, eg: validation of
argument methods and throw exception is too verbose.

Eg:

### Symfony way ###

```php
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Type;

class Test {
    public function getByName($name)
    {
        $violations = Validation::createValidator()->validateValue(
            $name,
            new Type(array('type' => 'string'))
        );

        if (count($violations) != 0) {
          throw new \InvalidArgumentException((string) $violations);
        }
    }
}
```

### EBTValidator way ###

```php
use EBT\Validator\ValidatorBasicExtended;

class Test {
    public function getByName($name)
    {
        if (!ValidatorBasicExtended::isTypeString($name)) {
            throw new \InvalidArgumentException(ValidatorBasicExtended::getViolationsAsShortString());
        }
    }
}
```

## Requirements ##

* PHP >= 5.3.3

## Installation ##

The recommended way to install is through composer.

Just create a `composer.json` file for your project:

```json
{
    "require": {
        "ebidtech/validator": "@stable"
    }
}
```

**Tip:** browse [`ebidtech/validator`](https://packagist.org/packages/ebidtech/validator) page to choose a stable version to use, avoid the `@stable` meta constraint.

And run these two commands to install it:

```bash
$ curl -sS https://getcomposer.org/installer | php
$ composer install
```

Now you can add the autoloader, and you will have access to the library:

```php
<?php

require 'vendor/autoload.php';
```

## Usage ##

The validators are divided according to the Symfony Validator:

* ValidatorBasic
* ValidatorString
* ValidatorNumber
* ValidatorDate
* ValidatorCollection

For each one exists a Extended version (Eg: ValidatorBasicExtended), that adds convenience alias methods. It exists also
a ValidatorExtended that mix validations.

[Example of code](README.md#ebtvalidator-way)

## Contributing ##

See CONTRIBUTING file.

## Credits ##

* Ebidtech developer team, validator Lead developer [Eduardo Oliveira](https://github.com/entering) (eduardo.oliveira@ebidtech.com).
* [All contributors](https://github.com/ebidtech/validator/contributors)

## License ##

Validator library is released under the MIT License. See the bundled LICENSE file for details.

