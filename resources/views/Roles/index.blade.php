<x-app-layout>
    <x-slot name="header">
        {{ __('Roles') }}
    </x-slot>



    @can('role_view')
    <div class="p-4 bg-white rounded-lg shadow-xs">
        @can('role_create')
        <a class="inline-flex px-4 py-2 mb-4 text-sm font-medium text-white bg-purple-600 rounded-lg border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring" href="">
            Create Role
        </a>
        @endcan   

        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Roletype</th>
                        @can('role_edit')   <th class="px-4 py-3">Operation</th> @endcan
                        @can('role_delete') <th class="px-4 py-3">Operation</th> @endcan
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">

                    @foreach ($roles as $row)
                        @foreach($roletypes as $roletype)
                        @if($roletype->id == $row->roletype_id)
                        <tr style="backgroud: white;">
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $roletype->title }}</td>

                                @can('role_edit')
                                <td><a href="{{ url('document_metadata/'.$row->id) }}" class="btn btn-primary">Add </a></td>
                                @endcan

                                @can('role_delete')
                                <td><a href="{{ url('roles/delete',['id'=>$row->id]) }}" class="btn btn-danger">Delete</a></td>
                                @endcan
                            </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
            </div>  
                    
        </div>

    </div>
    @endcan

</x-app-layout>
