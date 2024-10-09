#!/bin/bash
php -S localhost:80 -t public/ & 
npx update-browserslist-db@latest &
npx tailwindcss -i ./src/assets/index.css -o ./public/css/style.css --watch
