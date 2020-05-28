<?php

namespace exbico\jsend;

use exbico\jsend\interfaces\ResponseInterface;

class Response implements ResponseInterface
{
    public $status = self::SUCCESS;
    public $message;
    public $version;
    public $data;
    public $code;

    public function __toString()
    {
        return (string)json_encode($this);
    }

    public function getData(): array
    {
        return (array)$this->data;
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function addData(array $data): void
    {
        $this->data = array_merge((array)$this->data, $data);
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setAttributes(array $data): ResponseInterface
    {
        foreach ($data as $key => $item) {
            if ($item !== null && property_exists($this, $key)) {
                $this->$key = $item;
            }
        }
        return $this;
    }
}