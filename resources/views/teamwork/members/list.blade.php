<x-app-layout>
    <x-slot name="header">
        Members of team <span class="tracking-wide">{{ $team->name }}</span>
    </x-slot>

    @can('team_view')
    <div class="p-4 bg-white rounded-lg shadow-xs">
        <a href="{{ route('teams.index') }}" class="inline-flex px-4 py-2 mb-4 text-sm font-medium text-white bg-purple-600 rounded-lg border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring">
            Back
        </a>

        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Roles</th>
                            @can('team_user_role_create')<th class="px-4 py-3">Operation</th>@endcan
                            @can('team_delete')<th class="px-4 py-3">Action</th>@endcan
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach($team->users as $user)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                                <td class="px-4 py-3 text-sm">{{ $user->name }}</td>
                                @can('team_user_role_create')
                                    <td class="px-4 py-3 text-sm">

                                    @if(auth()->user()->isOwnerOfTeam($team))
                                        @if(auth()->user()->getKey() !== $user->getKey())
{{--                                            <form class="form-horizontal" method="post" action="{{ route('teams.members.change') }}">--}}
                                            <div style="display: flex">
                                            <select class="form-select" name="change_id" aria-label="Default select example" style="margin-left: 20px; margin-top: 4px; border-radius: 5px; width:80%">
                                                <option selected>Change User Role</option>
                                                @foreach($roles as $role)
{{--                                                    @if($user->name)--}}
                                                    <option value="{{ $role->change_id }}" >{{$role->title}}</option>
                                                @endforeach
                                            </select>
                                            <x-button class="btn btn-success">
                                                Save
                                            </x-button>
                                            </div>
                                            </form>
                                        @endif
                                    @endif


                                </td>
                                @endcan

                                @can('team_delete')
                                <td class="px-4 py-3 text-sm">
                                    @if(auth()->user()->isOwnerOfTeam($team))
                                        @if(auth()->user()->getKey() !== $user->getKey())
                                            <form class="inline-block" action="{{ route('teams.members.destroy', [$team, $user]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
{{--                                                @can('team_delete')--}}
                                                 <x-button>
                                                    Delete
                                                </x-button>
{{--                                                @endcan--}}
                                            </form>
                                        @endif
                                    @endif
                                </td>
                                @endcan

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @can('team_create')
        @if(auth()->user()->isOwnerOfTeam($team))

            <h3 class="mb-3 text-lg font-semibold tracking-wide">Pending invitations</h3>

            <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
                <div class="overflow-x-auto w-full">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                                <th class="px-4 py-3">E-Mail</th>
                                <th class="px-4 py-3">Roletype</th>

                                <th class="px-4 py-3">Action</th>

                            </tr>
                        </thead>
                        @foreach($team->invites as $invite)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm">{{ $invite->email }}</td>
                                @foreach($roles as $role)
                                    @if($role->id == $invite->role_id)
                                <td class="px-4 py-3 text-sm">{{ $role->title }}</td>
                                    @endif
                                @endforeach

                                <td class="px-4 py-3 text-sm">
                                    <a href="{{route('teams.members.resend_invite', $invite)}}" class="inline-flex px-4 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring">
                                        Resend invite
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

           
            <h3 class="mb-3 text-lg font-semibold tracking-wide">Invite to team "{{ $team->name }}"</h3>

            <form class="form-horizontal" method="post" action="{{route('teams.members.invite', $team)}}">
                @csrf

                <div>
                    <x-label for="email" :value="__('Email')" />
                    <div style="display: flex">
                    <x-input type="text" style="width: 50% "
                             id="email"
                             name="email"
                             class="block w-full"
                             value="{{ old('email') }}"
                             required />
                    <br>
                    <select class="form-select" name="role_id" aria-label="Default select example" style="margin-left: 20px; margin-top: 4px; border-radius: 5px; width: 40%">
                        <option selected>Select User Role</option>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}" >{{$role->title}}</option>
                        @endforeach
                    </select>
                    </div>

                    @error('email')
                    <span class="text-xs text-red-100 dark:text-red-400">
                    {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-button class="block">
                        Invite to Team
                    </x-button>
                </div>

            </form>
            

        @endif
        @endcan
    </div>
    @endcan
    
</x-app-layout>>
