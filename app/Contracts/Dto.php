<?php

namespace App\Contracts;

use Illuminate\Contracts\Support\Arrayable;

interface Dto
{
    public function toDto() : Arrayable;
}
