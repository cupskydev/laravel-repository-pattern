<?php

namespace App\Services\Interfaces;

interface CarServiceInterface
{
    public function list();

    public function show(string|int $id);

    public function create(array $fields);

    public function update(array $fields, string|int $id);

    public function delete(string|int $id);
}
