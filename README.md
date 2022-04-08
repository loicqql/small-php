# Small-PHP
a small PHP router

## Examples

```php
$small->get('/', function($request, $response) {

    $response->setData(['message'=>'get /']);

    return $response;
});

$small->post('example', function($request, $response) {

    $response->setResponseType('HTML');
    $user = $request->params['user'];
    $response->setData('<p>Hello '.$user.'</p>');

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

## Request

### Request example

```
url : https://mydomain.com/user/DkndfS
method : post
body : { "user": "Loic", "password": "toor" }
```

### The request object

```php
$small->post('/user/{id}', function($request, $response) {

    // return route. Eg : user/{id}
    $request->route;

    // return uri. Eg : user/DkndfS
    $request->uri;

    // return method. Eg : post
    $request->method;

    // return body data of request. Eg : Loic
    $request->params['user'];

    // return resource. Eg : DkndfS (from {id} in route request)
    $request->resource['id'];

    // return a cookie. See function $response->setCookie()
    $request->cookies['name'];


    // return a response
    return $response->setData(['name'=> $request->resource['name']]);
});
```

## Response
return JSON by default


```php
$small->post('/user/{id}', function($request, $response) {
    $user = $request->params['user'];

    // set response type : JSON (default) or HTML
    $response->setResponseType('HTML');

    // return HTML
    $response->setData('<p>Hello '.$user.'</p>');
    // OR
    // return JSON : array will be converted in JSON
    $response->setData(['name'=> $request->resource['name']]); 

    // set Cookie 
    $response->setCookie('name', 'value');

    // return http code
    $response->setResponseCode(401);
    
    return $response;
});
```
