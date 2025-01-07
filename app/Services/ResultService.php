<?php

namespace App\Services;

class ResultService
{
public function __construct(private bool $ok, public ?string $route=null, public ?string $message=null)
{
}
}
