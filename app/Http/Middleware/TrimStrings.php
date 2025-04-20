<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * Những trường không bị trim.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
