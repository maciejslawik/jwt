[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/maciejslawik/jwt/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/maciejslawik/jwt/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/maciejslawik/jwt/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/maciejslawik/jwt/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/maciejslawik/jwt/badges/build.png?b=master)](https://scrutinizer-ci.com/g/maciejslawik/jwt/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/mslwk/jwt/v/stable)](https://packagist.org/packages/mslwk/jwt)
[![License](https://poser.pugx.org/mslwk/jwt/license)](https://packagist.org/packages/mslwk/jwt)
[![Total Downloads](https://poser.pugx.org/mslwk/jwt/downloads)](https://packagist.org/packages/mslwk/jwt)

# JSON Web Token encoder/decoder #

The library provides dead easy way of creating and verifing JSON Web Tokens.

### Installation ###

Use composer to include the library in your project.

```
composer require mslwk/jwt
```

### Usage ###

#### Generating a token ####

Include the Generator class:

![Alt text](docs/include_generator.png?raw=true "Include the generator")

Generate a token:   

![Alt text](docs/use_generator.png?raw=true "Generate a token")

#### Verifing a token ####

Include the Generator class:

![Alt text](docs/include_verifier.png?raw=true "Include the verifier")

Generate a token:   

![Alt text](docs/use_verifier.png?raw=true "Verify the token")