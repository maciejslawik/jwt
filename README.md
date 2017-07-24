[![Build Status](https://travis-ci.org/maciejslawik/jwt.svg?branch=master)](https://travis-ci.org/maciejslawik/jwt)
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