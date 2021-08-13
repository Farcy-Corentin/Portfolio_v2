### LaraStan
Larastan is a static analysis command-line tool by Nuno Maduro built on top of PHPStan and focuses on finding errors in your Laravel code before running it

```sh
create file ./phpstan.neon.dist
```
```yml
includes:
    - ./vendor/nunomaduro/larastan/extension.neon

parameters:
    paths: 
        - app
    level: 8
    # ignoreErrors:
    checkMissingIterableValueType: false
```
