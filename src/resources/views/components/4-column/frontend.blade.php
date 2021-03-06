<div class="laravel_block2_gallery" id="laravel_block2_gallery_{{$page_element_id}}">
    <x-frontend.row>
        <div class="flex flex-wrap -mx-4">
            @foreach ($collections as $item)
                <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 box">
                <x-LaravelBlock2GalleryItem :content="$item" />
                </div>          
            @endforeach
        </div>
    </x-frontend.row>
</div>

@push('js')
    <script>
        gsap.from("#laravel_block2_gallery_{{$page_element_id}} .box", {
            scrollTrigger:{
                trigger: "#laravel_block2_gallery_{{$page_element_id}}",
                start: 'top 60%',
                once: true
            },
            y: 200,
            opacity: 0,
            stagger: 0.1,
            duration: 0.6,
        });
    </script>
@endpush



