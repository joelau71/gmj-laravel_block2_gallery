<x-admin.layout.app>
    @php
        $breadcrumbs = [
            ['name' => 'Element', 'link' => route("admin.element.index")],
            ['name' => $element->title],
            ['name' => "Gallery Content"],
        ];
    @endphp
    <x-admin.atoms.breadcrumb :breadcrumbs="$breadcrumbs" />

    <div>
        <x-admin.atoms.row>
            <div class="text-right">
                <x-admin.atoms.link href="{{ route('LaravelBlock2Gallery.create', $element_id) }}">
                    ADD
                </x-admin.atoms.link>
                <x-admin.atoms.link href="{{ route('LaravelBlock2Gallery.order', $element_id) }}">
                    ORDER
                </x-admin.atoms.link>
                <x-admin.atoms.link href="{{ route('LaravelBlock2Gallery.config.edit', $element_id) }}">
                    CONFIG
                </x-admin.atoms.link>
            </div>
        </x-admin.atoms.row>

        
        <x-admin.atoms.index-header>
            <div class="flex-1">Image</div>
            <div class="flex-1"></div>
        </x-admin.atoms.index-header>

        @forelse ($collections as $item)
            <div class="flex items-center space-x-2 p-3">
                <div class="flex-1">
                    <img src="{{ $item->getMedia('laravel_block2_gallery')->first()->getUrl() }}" class="w-24" />
                </div>
                <div class="flex-1">
                    <x-admin.atoms.link
                        href="{{ route('LaravelBlock2Gallery.edit', ['element_id' => $element_id, 'id' => $item->id]) }}">
                        Edit
                    </x-admin.atoms.link>
                    <form
                        action="{{ route('LaravelBlock2Gallery.delete', ['element_id' => $element_id, 'id' => $item->id]) }}"
                        method="POST"
                        class="inline-block">
                        @csrf
                        @method("DELETE")
                        <x-admin.atoms.button class="destroy">
                            Delete
                        </x-admin.atoms.button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center p-4 font-bold text-3xl">No Data</div>
        @endforelse
    </div>
</x-admin.layout.app>