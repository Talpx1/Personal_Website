<?php declare(strict_types=1);

namespace SC;

use SC\Http\Middlewares\DetectLocale;
use SC\Http\Middlewares\Contracts\Middleware;

final class App {

    protected static ?self $instance;

    /** @var class-string<Middleware>[] */
    protected array $middlewares = [];

    /** @var string[] */
    protected array $valid_locales = ['it', 'en']; //TODO: put this in config

    /** @var array<string, string> */
    protected array $locales_with_country = ['it' => "it-it", 'en' => 'en-us']; //TODO: put this in config
    
    public readonly string $locale; // @phpstan-ignore-line
    
    protected string $current_route = '/'; //TODO: put default fallback route in config

    private const DEFAULT_LOCALE = 'it'; //TODO: put this in config

    private function __construct() {}

    public static function instance(): self {
        self::$instance ??= new self();
        return self::$instance;
    }
    public static function dispose(): void {        
        self::$instance = null;        
    }

    /** @param class-string<Middleware>|class-string<Middleware>[] $middleware */
    public function addMiddleware(string|array $middleware): void {
        if(is_string($middleware)) {
            $middleware = [$middleware];
        }        
        
        foreach ($middleware as $entry) {
            if(!is_a($entry, Middleware::class, true)) {
                throw new \RuntimeException("The middleware passed to addMiddleware must implement the Middleware contract.");                
            }

            $this->middlewares[] = $entry;
        }
    }

    public function runMiddlewares(): void {
        foreach ($this->middlewares as $middleware) {
            (new $middleware)->handle();
        }
    }

    public function setLocale(string $locale): void {
        $this->locale = in_array($locale, $this->valid_locales) ? strtolower($locale) : self::DEFAULT_LOCALE; // @phpstan-ignore-line
    }

    public function localeWithCountry(): string {
        return $this->locales_with_country[$this->locale] ?? array_values($this->locales_with_country)[0];
    }

    //TODO: refactor to support more than 2 locales
    //TODO: make this actually change locale
    public function alternateLocale(): string { 
        return array_values(array_diff($this->valid_locales, [$this->locale]))[0];
    }    

    public function setCurrentRoute(string $route): void {
        $this->current_route = $route;
    }

    public function currentRoute(): string {
        return $this->current_route ?? "/";
    }

}