<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Symfony\Component\HttpFoundation\Request;

class TrustProxies extends Middleware
{
    /**
     * Cấu hình các proxy tin cậy.
     *
     * @var array|string|null
     */
    protected $proxies = null;

    /**
     * Các headers được sử dụng.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
