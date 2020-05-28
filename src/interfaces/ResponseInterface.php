<?php

namespace exbico\jsend\interfaces;

interface ResponseInterface
{
    public const ERROR = 'error';
    public const FAIL = 'fail';
    public const SUCCESS = 'success';

    public function getStatus(): string;

    public function setStatus(string $status): void;

    public function getData(): ?array;

    public function setData(array $data): void;

    public function addData(array $data): void;

    public function getMessage(): ?string;

    public function setMessage(string $message): void;

    public function getVersion(): ?string;

    public function setVersion(string $version): void;

    public function getCode(): ?int;

    public function setCode(int $code): void;

    public function setAttributes(array $data): self;
}