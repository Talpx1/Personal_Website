<?php declare(strict_types=1);

namespace SC\Http\Middlewares\Contracts;

interface Middleware {

    public function handle(): void;

}