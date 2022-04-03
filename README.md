# Small-PHP
a small PHP router

## Examples

```php
$small->get('/', function($response) {

    $response->setData(['message'=>'get /']);

    return $response;
});

$small->post('example', function($response) {

    $response->setData('<p>Hello World</p>');
    $response->setResponseType('HTML');

    return $response;
});

$small->req('/', 'patch', function($response) {

    $response->setData(['message'=>'patch /']);

    return $response;
});
```

## Response
return JSON by default