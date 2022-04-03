# Small-PHP
a small PHP router

## Examples

```php
$small->get('/', function() {

    $r = 'get /';

    return $r;
});

$small->post('example', function() {

    $r = 'get /example';

    return $r;
});

$small->req('/', 'patch', function() {

    $r = 'patch /';

    return $r;
});
```