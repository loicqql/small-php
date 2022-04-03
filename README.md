# Small-PHP
a small PHP router

## Examples

```php
$small->get('/', function($request, $response) {

    $response->setData(['message'=>'get /']);

    return $response;
});

$small->post('example', function($request, $response) {

    $response->setData('<p>Hello World</p>');
    $response->setResponseType('HTML');

    return $response;
});

$small->get('example/{name}', function($request, $response) {

    $response->setData(['name'=> $request->resource['name']]);

    return $response;
});

$small->req('/', 'patch', function($request, $response) {

    $response->setData(['message'=>'patch /']);

    return $response;
});
```

## Response
return JSON by default