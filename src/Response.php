<?php
namespace exbico\jsend;

use exbico\jsend\interfaces\ResponseInterface;

class Response implements ResponseInterface
{
    public $status = self::SUCCESS;
    public $message;
    public $version;
    public $data = [];

    public function __toString()
    {
        return json_encode($this);
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data)
    {
        $this->data = $data;
    }

    public function addData(array $data)
    {
        $this->data = array_merge($this->data, $data);
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version)
    {
        $this->version = $version;
    }
}