<?php

namespace App\Core\Contracts\Responses;

use App\Core\Contracts\Repositories\AbstractRepositoryInterface;

interface AbstractResponseInterface {


    public function setResponse(int $code, string $message, array $data = []): void;

    public function setData(array $data);

    public function appendData($key, $value);

    public function getData(): array;

    public function setCode(int $code): void;

    public function code(): int;

    public function toArray(): array;

    public function setMessage(string $message): void;

    public function message(): string;
}