<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface Comment
{
    public function comments(): MorphMany;
}
