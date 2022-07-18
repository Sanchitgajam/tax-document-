<x-app-layout>
    <x-slot name="header">
        Create a new team
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-md">
        <form class="form-horizontal" method="post" action="{{route('teams.store')}}">
            @csrf

                <div style="display: flex">
                <x-label for="name" :value="__('Team Name')" style="" />
                <x-input type="text"
                         id="name"
                         name="name"
                         class="block w-full"
                         value="{{ old('name') }}"
                         required style="width: 20%;margin: 10px"/>

                    <x-label for="email" :value="__('Email')" />
                    <x-input type="text"
                             id="email"
                             name="email"
                             class="block w-full"
                             value="{{ old('email') }}"
                             required style="width: 30%;margin: 10px"/>

                @error('email')
                <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror

                <x-label for="type_id" :value="__('Roles')" style="margin-left: 10px"/>
                <select class="form-select" name="type_id" aria-label="Default select example" style="margin: 6px;border-radius: 5px;width: 30%;">
                    @foreach($teamroles as $role)
                        <option value="{{ $role->id }}" >{{$role->title}}</option>
                    @endforeach
                </select>

            </div>

            <div class="mt-4">
                <x-button class="block" style="margin-left: 30px">
                    Save
                </x-button>
            </div>

        </form>
    </div>
</x-app-layout>>



