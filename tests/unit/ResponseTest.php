<?php

use exbico\jsend\interfaces\ResponseInterface;
use exbico\jsend\Response;

class ResponseTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testResponse()
    {
        $response = new Response();
        $this->tester->assertInstanceOf(ResponseInterface::class, $response);

        $response->setMessage('the message');
        $this->tester->assertEquals('the message', $response->getMessage());

        $response->setStatus(Response::ERROR);
        $this->tester->assertEquals(Response::ERROR, $response->getStatus());

        $data = ['id' => 1];
        $response->setData($data);
        $this->tester->assertEquals($data, $response->getData());

        $newData = ['name' => 'User'];
        $response->addData($newData);
        $this->tester->assertEquals(array_merge($data, $newData), $response->getData());

        $response->setVersion('v1');
        $this->tester->assertEquals('v1', $response->getVersion());

        $json = '{"status":"error","message":"the message","version":"v1","data":{"id":1,"name":"User"}}';
        $this->tester->assertEquals($json, $response);
    }
}