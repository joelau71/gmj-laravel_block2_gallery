# gmj-laravelblock2gallery

Laravel Block for backend and frontend - need tailwindcss support

**composer require gmj/laravel_block2_gallery**

in terminal run:<br/>
php artisan vendor:publish --provider="GMJ\LaravelBlock2Gallery\LaravelBlock2GalleryServiceProvider" --force

php artisan migrate

php artisan db:seed --class=LaravelBlock2GallerySeeder

package for test
composer.json#autoload-dev#psr-4: "GMJ\\LaravelBlock2Gallery\\": "package/laravel_block2_gallery/src/",
config: GMJ\LaravelBlock2Gallery\LaravelBlock2GalleryServiceProvider::class,
