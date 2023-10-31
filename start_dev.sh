#!/bin/bash
php -S localhost:80 -t public/ & npx tailwindcss -i ./src/assets/index.css -o ./public/css/style.css --watch
