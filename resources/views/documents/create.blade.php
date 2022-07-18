
{{--@section('content')--}}
<x-app-layout>
    <x-slot name="header">
        Upload Document
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-md">

        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mt-4">
                <H1><x-label for="file" :value="__('File')" /></H1>
                <input type="file" name="image" id="image" multiple>

                @error('name')
                <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mt-4">
                <x-button class="block">
                    {{ __('Back') }}
                </x-button>
            </div>

        </form>

    </div>
    @section('scripts')
    <script>
        // import * as FilePond from 'filepond';
        // Get a reference to the file input element

        const inputElement = document.querySelector('input[id="image"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
        FilePond.setOptions({
            server: {
                url: '/upload',
                headers:{
                    'X-CSRF-TOKEN':'{{ csrf_token() }}'
                }
            }
        });

    </script>
    @endsection



</x-app-layout>
{{--@endsection--}}