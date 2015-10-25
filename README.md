# hash-router-extension

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]


This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

Via Composer

``` bash
$ composer require wodcz/hash-router-extension
```

then register extension in config.neon:

```
extensions:
    hashRouter: WodCZ\HashRouterExtension\DI\HashRouterExtension
```

and finally, configure extension:

 **salt** is required. You should pick unique salt, so you get never-seen hashes.
 **styles** is array of router styles, which will be handled by this extension. by default only id style is handled

```
hashRouter:
    salt: loremipsum
    styles: ['id']
```



## Usage

After configuring styles (and cleaning cache), router will automatically hash chosen parameters when generating links 
and, of course, will translate them back from request. 

## Security, limits

This extension is only wrapper for [hashids](http://hashids.org/php/) library.
Look at their [official documentation](http://hashids.org/php/) and [repository](https://github.com/ivanakimov/hashids.php/tree/master) for more information.

TLDR:
 - there are no collisions thanks to integer to hex conversion
 - you **can't** encode negative numbers 
 - you **can't** encode strings 
 - you **shouldn't** encode sensitive data 
 - you **can't** encode numbers greater then 1,000,000,000 by default because of php limitations. [read more here](https://github.com/ivanakimov/hashids.php/tree/master#big-numbers)

## Known bugs, limitations
 - this extension currently doesn't handle component signal parameters, I'm not sure how to handle this nicely
 

## Testing

Currently no tests are written, sorry.

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email admin@ikw.cz instead of using the issue tracker.

## Credits

- [Martin Janeček][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/wodcz/hash-router-extension.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/wodcz/hash-router-extension/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/wodcz/hash-router-extension.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/wodcz/hash-router-extension.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/wodcz/hash-router-extension.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/wodcz/hash-router-extension
[link-travis]: https://travis-ci.org/wodcz/hash-router-extension
[link-scrutinizer]: https://scrutinizer-ci.com/g/wodcz/hash-router-extension/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/wodcz/hash-router-extension
[link-downloads]: https://packagist.org/packages/wodcz/hash-router-extension
[link-author]: https://github.com/wodCZ
[link-contributors]: ../../contributors
