<?php

declare(strict_types=1);

namespace Exbico\JsendResponse;

use JsonException;
use Stringable;

final class Response implements Stringable
{
    public const ERROR   = 'error';
    public const FAIL    = 'fail';
    public const SUCCESS = 'success';

    public function __construct(
        /** @var string<self::*> $status */
        public string $status = self::SUCCESS,
        public ?string $message = null,
        public ?string $version = null,
        public array $data = [],
        public ?int $code = null,
    ) {
    }

    /**
     * @return string
     * @throws JsonException
     */
    public function __toString(): string
    {
        return json_encode($this, JSON_THROW_ON_ERROR);
    }

    public function addData(array $data): void
    {
        $this->data = array_merge($this->data, $data);
    }

    /**
     * @param array $data
     * @return self
     */
    public function setAttributes(array $data): self
    {
        foreach ($data as $key => $item) {
            if ($item !== null && property_exists($this, $key)) {
                $this->$key = $item;
            }
        }
        return $this;
    }
}
