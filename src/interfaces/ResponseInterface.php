<?php

namespace exbico\jsend\interfaces;

interface ResponseInterface
{
    public function getStatus();

    public function setStatus(string $status);

    public function getData();

    public function setData(array $data);

    public function addData(array $data);

    public function getMessage();

    public function setMessage(string $message);

    public function getVersion();

    public function setVersion(string $version);
}