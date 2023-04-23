#Library for JSend

![ci](https://github.com/exbico/jsend-response/actions/workflows/ci.yml/badge.svg)
[![Latest Stable Version](https://poser.pugx.org/exbico/jsend-response/v/stable)](https://packagist.org/packages/exbico/jsend-response)
[![Total Downloads](https://poser.pugx.org/exbico/jsend-response/downloads)](https://packagist.org/packages/exbico/jsend-response)
[![License](https://poser.pugx.org/exbico/jsend-response/license)](https://packagist.org/packages/exbico/jsend-response)

You can find out more information about JSend [here](https://labs.omniti.com/labs/jsend).

## Installation
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require exbico/jsend-response
```

or add

```
"exbico/jsend-response" : "*"
```

to the `require` section of your application's composer.json file.

## How to use

```php
<?php

use exbico\jsend\Response;

$response = new Response();
$response->setMessage('the message');
$response->setStatus(Response::ERROR);

$data = ['id' => 1];
$response->setData($data);

$newData = ['name' => 'User'];
$response->addData($newData);

$response->setVersion('v1');

echo $response;
```

When you print out your object, you'll get something like this:
```json
{"status":"error","message":"the message","version":"v1","data":{"id":1,"name":"User"}}
```