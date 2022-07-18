<x-app-layout>
    <x-slot name="header">
        {{ __('Permissions') }}
    </x-slot>

    @can('permission_view')
    <div class="p-4 bg-white rounded-lg shadow-xs">

        @can('permission_create')
        <a class="inline-flex px-4 py-2 mb-4 text-sm font-medium text-white bg-purple-600 rounded-lg border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring" href="">
            Create Permissions
        </a>
        @endcan

        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Title</th>
                        @can('permission_edit')   <th class="px-4 py-3">Operations</th>  @endcan
                        @can('permission_delete') <th class="px-4 py-3">Operations</th>  @endcan

                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($permissions as $permission)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">
                                {{ $permission->id }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $permission->title }}
                            </td>
                            @can('permission_edit')
                                <td>  <a href="" class="btn btn-success">Edit</a>  </td>
                            @endcan
                           
                            @can('permission_delete')
                                <td>  <a href="{{ url('permission/delete',['id'=> $permission->id]) }}" class="btn btn-danger">Delete</a>  </td>
                            @endcan

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
                {{ $permissions->links() }}
            </div>
        </div>

    </div>
    @endcan
</x-app-layout>
