<?php

namespace App\Contracts;

interface FromArrayable
{
    public static function fromArray(array $array) : Dto;
}
