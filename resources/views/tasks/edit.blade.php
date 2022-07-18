<x-app-layout>
    <x-slot name="header">
        Update Task
    </x-slot>
    

    <div class="p-4 bg-white rounded-lg shadow-md">

        <form action="{{ url('edit-data/'.$data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mt-4">
                <x-input type="hidden"
                         id="id"
                         name="id"
                         class="block w-full"
                         value="{{ $data->id }}"
                         required />

                <x-label for="name" :value="__('Name')" />
                <x-input type="text"
                         id="name"
                         name="name"
                         class="block w-full"
                         value="{{ $data->name }}"
                         required />


                @error('name')
                <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mt-4">
                <x-button class="block">
                    {{ __('Update') }}
                </x-button>
            </div>
        </form>

    </div>
</x-app-layout>
