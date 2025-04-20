<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Các URL không cần xác thực CSRF.
     *
     * @var array
     */
    protected $except = [
        // VD: 'api/*'
    ];
}
