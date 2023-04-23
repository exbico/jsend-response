<?php

namespace tests;

use Exbico\JsendResponse\Response;
use JsonException;
use PHPUnit\Framework\TestCase;

final class ResponseTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $response = new Response();
        $this->assertNull($response->message);
        $this->assertNull($response->version);
        $this->assertIsArray($response->data);
        $this->assertEmpty($response->data);
        $this->assertNull($response->code);
        $this->assertEquals(Response::SUCCESS, $response->status);
    }

    /**
     * @return void
     * @throws JsonException
     */
    public function testResponse(): void
    {
        $response = new Response(
            status : Response::ERROR,
            message: 'the message',
            version: '1.0.0',
            data   : ['id' => 1],
            code   : 200,
        );

        $response->addData(['name' => 'User']);

        $json = '{"status":"error","message":"the message","version":"1.0.0","data":{"id":1,"name":"User"},"code":200}';
        $this->assertEquals($json, $response);

        $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        $response->setAttributes($data);
        $object = new Response(
            status : Response::ERROR,
            message: 'the message',
            version: '1.0.0',
            data   : ['id' => 1, 'name' => 'User'],
            code   : 200,
        );
        $this->assertEquals($object, $response);
    }
}
