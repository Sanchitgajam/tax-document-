<x-app-layout>
    <x-slot name="header">
        Add Metadata 
    </x-slot>
    <div class="p-7 bg-white rounded-md shadow-md">
        <h5 style="color: #1a202c">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $ids }}</h5>
    </div>
    <br>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <a class="inline-flex px-4 py-2 mb-4 text-sm font-medium text-white bg-purple-600 rounded-lg border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring" href="{{ url('task_metadata/create/'.$ids) }}">
            Create Metadata
        </a>

        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                        <th class="px-4 py-3">id</th>
                        <th class="px-4 py-3">task_id</th>
                        <th class="px-4 py-3">key</th>
                        <th class="px-4 py-9">value</th>    
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @forelse($metadata as $task)
                        
                        <tr class="text-gray-700">
                             @if($task->task_id  == $ids) 
                            <td class="px-4 py-3 text-sm w-1">
                                {{ $task->id }}
                            </td>
                            <td class="px-4 py-3 text-sm w-1">
                                {{ $task->task_id }}
                            </td>
                            <td class="px-4 py-3 text-sm w-1">
                                {{ $task->key }}
                            </td>
                            <td class="px-4 py-3 text-sm w-1">
                                {{ $task->value }}
                            </td>
                            @endif 

        {{-- <td class="px-4 py-3 text-sm">
             {{-- <a href="{{ url('document_metadata/edit/'.$task->id,['ids'=>$task->document_id]) }}" class="btn btn-success">Edit</a> --}}
         {{-- </td>

       <td class="px-4 py-3 text-sm">
           {{-- <a href="{{ url('document_metadata/delete/'.$task->document_id,['ids'=>$task->id]) }}" class="btn btn-danger">Delete</a> --}}
       {{-- </td> --}}
       
                     </tr>
                    
                    @empty

                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
            </div>
        </div>

    </div>
</x-app-layout>
