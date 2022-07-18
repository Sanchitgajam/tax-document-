<x-app-layout>
    <x-slot name="header">
        Meta Docs
    </x-slot>
    <div class="p-7 bg-white rounded-md shadow-md">
        <h5 style="color: #1a202c">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $document_id }}</h5>
    </div>
    <br>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <a class="inline-flex px-4 py-2 mb-4 text-sm font-medium text-white bg-purple-600 rounded-lg border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring" href="{{ url('document_metadata/create/'.$document_id) }}">
            Create Metadata
        </a>

        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                        <th class="px-4 py-3">id</th>
                        <th class="px-4 py-3">user_id</th>
                        <th class="px-4 py-3">team_id</th>
                        <th class="px-4 py-3">document_id</th>
                        <th class="px-4 py-3">key</th>
                        <th class="px-4 py-3">value</th>
                        <th class="px-4 py-3">Edit</th>
                        <th class="px-4 py-3">OPERATION</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @forelse($metadata as $task)
                        <tr class="text-gray-700">
                            @if($task->document_id  == $document_id)

                            <td class="px-4 py-3 text-sm w-1">
                                {{ $task->id }}
                            </td>
                            <td class="px-4 py-3 text-sm w-1">
                                {{ $task->user_id }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $task->team_id }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $task->document_id }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $task->key }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $task->value }}
                            </td>

        <td class="px-4 py-3 text-sm">
          {{--           {{ route('document_metadata.delete',['id'=>$document_id]) }}--}}
             <a href="{{ url('document_metadata/edit/'.$task->id,['ids'=>$task->document_id]) }}" class="btn btn-success">Edit</a>
         </td>

       <td class="px-4 py-3 text-sm">
{{--           {{ route('document_metadata.delete',['id'=>$document_id]) }}--}}
           <a href="{{ url('document_metadata/delete/'.$task->document_id,['ids'=>$task->id]) }}" class="btn btn-danger">Delete</a>
       </td>

                            @endif
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
