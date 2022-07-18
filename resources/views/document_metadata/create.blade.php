<x-app-layout>
    <x-slot name="header">
        Create Metadata
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-md">
        <h5 style="color: #1a202c">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $id }}</h5>
        <div class="mt-4">
            <button class="btn btn-primary">
            <a href="{{ url('document_metadata/'.$id) }}" style="color: white">View Metadata for {{ $id }}</a>
            </button>
        </div>

        <form action="{{ url('document_metadata/'.$id) }}" method="POST">
            @csrf
{{--            @method('DELETE')--}}
            <div class="mt-4">
                <x-label for="key" :value="__('Key')" />
                <x-input type="text"
                         id="key"
                         name="key"
                         class="block w-full"
                         value="{{ old('key') }}"
                         required />

                <x-input type="hidden"
                         id="id"
                         name="id"
                         class="block w-full"
                         value="{{ $id }}"
                         required />

                <x-label for="value" :value="__('Value')" />
                <x-input type="text"
                         id="value"
                         name="value"
                         class="block w-full"
                         value="{{ old('value') }}"
                         required />
                @error('name')
                <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mt-4">
                <x-button class="block">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>

    </div>
</x-app-layout>
