#Library for JSend

You can find out more information about JSend [here](https://labs.omniti.com/labs/jsend).

## How to use

```php
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
```php
{"status":"error","message":"the message","version":"v1","data":{"id":1,"name":"User"}}
```