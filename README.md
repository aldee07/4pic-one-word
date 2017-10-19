## Overview

4pic-one-word is a PHP script that is capable of generating valid words out of the given list of characters and output letters count. The project is mainly designed for the 4-pic-one-word app.

## Requirements

- libpspell-dev 
- aspell-en
- php-pspell (depending on your php version, this might vary. Example: php5.6-pspell)

## Usage

- Given characters: YYLWFDORN 
- # of characters required: 5
- seconds timeout (optional): 10 - means timeout after 10 seconds

```bash

$ chmod a+x 4pic
$ ./4pic YYLWFDORN 5 10

```

## License

The MIT License (MIT)

Copyright (c) 2015 Chris Kibble
