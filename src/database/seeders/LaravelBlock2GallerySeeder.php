<?php

namespace Database\Seeders;

use App\Models\Element;
use App\Models\ElementTemplate;
use Illuminate\Database\Seeder;
use Faker\Factory;
use GMJ\LaravelBlock2Gallery\Models\Block;
use GMJ\LaravelBlock2Gallery\Models\Config;
use Image;

class LaravelBlock2GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template = ElementTemplate::where("component", "LaravelBlock2Gallery")->first();

        if ($template) {
            return false;
        }

        $template = ElementTemplate::create(
            [
                "title" => "Laravel Block2 Gallery",
                "component" => "LaravelBlock2Gallery",
            ]
        );
        $element = Element::create([
            "template_id" => $template->id,
            "title" => "laravel-block2-gallery-sample",
            "is_active" => 1
        ]);
        $faker = Factory::create();
        $config = Config::create([
            "element_id" => $element->id,
            "img_width" => 600,
            "img_height" => 600,
            "layout" => "4-column"
        ]);

        for ($i = 1; $i < 7; $i++) {
            $text = [];

            foreach (config('translatable.locales') as $locale) {
                $text[$locale] = $faker->text(60);
            }

            $collection = Block::create([
                "element_id" => $element->id,
                "text" => $text,
                "display_order" => $i
            ]);

            $img = Image::make(storage_path("demo/food/{$i}.jpg"))->fit($config->img_width, $config->img_height);
            $img->save(storage_path("demo/temp.jpg"));
            $collection->addMedia(storage_path('demo/temp.jpg'))
                ->toMediaCollection("laravel_block2_gallery");
        }
    }
}
