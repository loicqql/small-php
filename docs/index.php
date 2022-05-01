<?php

$AUTH = false;
$MDP = 'admin';

if($AUTH) {
  if ((!isset($_SERVER['PHP_AUTH_USER'])) || $_SERVER['PHP_AUTH_PW'] != $MDP) {
    header('WWW-Authenticate: Basic realm="My Website"');
    header('HTTP/1.0 401 Unauthorized');
    echo '<p>Access denied. You did not enter a password.</p>';
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta
    name="description"
    content="SwaggerIU"
  />
  <title>SwaggerUI</title>
  <link rel="stylesheet" href="https://unpkg.com/swagger-ui-dist@4.5.0/swagger-ui.css" />
</head>
<body>
<div id="swagger-ui"></div>
<script src="https://unpkg.com/swagger-ui-dist@4.5.0/swagger-ui-bundle.js" crossorigin></script>
<script>
  window.onload = () => {
    fetch('/') // generate openapi.json
    .then(function(response) {
      return response.blob();
    })
    .then(function(myBlob) {
      window.ui = SwaggerUIBundle({
        url: './openapi.json',
        dom_id: '#swagger-ui',
      });
    });
    
  };
</script>
</body>
</html>