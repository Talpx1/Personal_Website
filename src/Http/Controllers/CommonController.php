<?php declare(strict_types=1);

namespace SC\Http\Controllers;

class CommonController {

    public function home(): void {
        view('home', ['title' => t('welcome')]);
    }

    public function projects(): void {
        view('projects', ['title' => t('projects')]);
    }
    
    public function about(): void {
        view('about', ['title' => t('about')]);
    }
    
    public function blog(): void {
        view('blog', ['title' => t('blog')]);
    }

}