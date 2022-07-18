<x-app-layout>
    <x-slot name="header">
        Documents List
    </x-slot>

     @can('document_view')
    <div class="p-4 bg-white rounded-lg shadow-xs">

        @can('document_create')
        <a class="inline-flex px-4 py-2 mb-4 text-sm font-medium text-white bg-purple-600 rounded-lg border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring" href="{{ route('documents.create') }}">
            Upload Document
        </a>
        @endcan
        
        
        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                        <th> ID </th>
                        <th> Team id </th>
                        <th> User id</th>
                        <th> File path </th>
                        <th> File name </th>
                        <th> File type </th>
                        <th> File size </th>
                        @can('document_delete') <th> Operation</th>  @endcan
                        <th> Metadata </th> 
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach ($documents as $row)
                        <tr style="backgroud: white;">
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->team_id }}</td>
                            <td>{{ $row->user_id }}</td>
                            <td>{{ $row->file_path }}</td>
                            <td>{{ $row->file_name }}</td>
                            <td>{{ $row->file_type}}</td>
                            <td>{{ $row->file_size }}</td>

                            @can('document_delete')
                            <td> <a href="{{ route('delete',['id'=>$row->id]) }}" class="btn btn-danger">Delete</a></td>
                            @endcan

                            <td><a href="{{ url('document_metadata/'.$row->id) }}" class="btn btn-primary">Add </a></td>
                        </tr>
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
