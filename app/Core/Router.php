<?php

declare(strict_types=1);

namespace App\Core;

final class Router
{
    /** @var array<string, array<string, callable>> */
    private array $routes = [];

    public function get(string $path, callable $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, callable $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch(string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        $requestMethod = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
        $isHead = $requestMethod === 'HEAD';
        $method = $isHead ? 'GET' : $requestMethod;
        $handler = $this->routes[$method][$path] ?? $this->routes['GET']['/404'];
        if (!isset($this->routes[$method][$path])) {
            http_response_code(404);
        }
        if ($isHead) {
            ob_start();
            try {
                $handler();
            } finally {
                ob_end_clean();
            }
            return;
        }
        $handler();
    }
}
