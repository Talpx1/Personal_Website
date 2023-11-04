<?php declare(strict_types=1);

namespace SC;

use SC\Http\Middlewares\DetectLocale;

final class App {

    protected static ?self $instance;

    protected array $middlewares = [
        DetectLocale::class
    ];

    protected array $valid_locales = ['it', 'en'];

    protected array $locales_with_country = ['it' => "it-it", 'en' => 'en-us'];
    
    public readonly string $locale;

    private const DEFAULT_LOCALE = 'it';

    private function __construct() {}

    public static function instance(): self {
        self::$instance ??= new self();
        return self::$instance;
    }
    public static function dispose(): void {        
        self::$instance = null;        
    }

    public function runMiddlewares(): void {
        foreach ($this->middlewares as $middleware) {
            (new $middleware)->handle();
        }
    }

    public function setLocale(string $locale): void {
        $this->locale = in_array($locale, $this->valid_locales) ? strtolower($locale) : self::DEFAULT_LOCALE;
    }

    public function localeWithCountry(): string {
        return $this->locales_with_country[$this->locale] ?? array_values($this->locales_with_country)[0];
    }

    public function alternateLocale(): string {
        return array_values(array_diff($this->valid_locales, [$this->locale]))[0];
    }

}