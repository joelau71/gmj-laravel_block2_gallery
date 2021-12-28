<div class="p-4">
    <div class="relative rounded-3xl overflow-hidden group">
        <img src="{{ $content->getFirstMedia("laravel_block2_gallery")->getUrl() }}" alt="" class="w-full duration-700 transform group-hover:scale-125">
        <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 text-white opacity-0 duration-700 group-hover:opacity-100 flex items-center justify-center text-center">
            {{ $content->getTranslation("text", $locale) }}
        </div>
    </div>
</div>