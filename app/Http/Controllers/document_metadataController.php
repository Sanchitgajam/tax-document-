<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\document_metadata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class document_metadataController extends Controller
{

    public function index(Request $request)
    {
//        dd($request->id);
        $document_id  = $request->id;
        $metadata = document_metadata::paginate();

//        return redirect()->route('document_metadata.index/{}?',['document_id'=>$document_id],['metadata'=>$metadata]);
            return view('document_metadata.index', compact('metadata','document_id'));

    }

    public function create(Request $request)
    {
//        dd($request);


//        $metadata = new document_metadata();
//        $metadata->team_id = Auth::user()->currentTeam->id;
//        $metadata->user_id = Auth::user()->id;
//        $metadata->document_id = $request->id;
//        $metadata->key = $request->key;
//        $metadata->value = $request->value;
//        $metadata->save();
        $document_id  = $request->id;

        $metadata = document_metadata::paginate();
        return view('document_metadata.create', ['id' => $document_id]);
    }

    public function store(Request $request)
    {
//       dd($request);
        $metadata = new document_metadata();
        $metadata->team_id = Auth::user()->currentTeam->id;
        $metadata->user_id = Auth::user()->id;
        $metadata->document_id = $request->id;
        $metadata->key = $request->key;
        $metadata->value = $request->value;
        $metadata->save();

        return redirect()->route('document_metadata.index',['id'=>$request->id]);

//        $request->validate([
//            'name' => ['required', 'string']
//        ]);

//        Auth::user()->tasks()->create([
//            'team_id' => Auth::user()->currentTeam->id,
//            'name' => $request->name,
//        ]);

//        $metadata = document_metadata::create([
//            'team_id' => Auth::user()->currentTeam->id,
//            'user_id' => Auth::user()->id,
//        'document_id' => 5,
//        'key' => $this->key,
//        'value' => $this->value
//        ]);

    }

    public function show(Task $task)
    {
        //
    }

    public function edit(Request $request){
//        dd($request->ids);
        $data = document_metadata::find($request->id);
//        dd($data->key);
        $id = $request->ids;
//        dd($data);
        return view('document_metadata.edit',compact('data','id'));

    }

    public function update(Request $request, $ids)
    {
//        dd($request->ids);
        $data = document_metadata::find($request->ids);
//        dd($data->document_id);
        $data->key = $request->input('key');
        $data->value = $request->input('value');
        $data->update();
        return redirect('document_metadata/'.$request->id);

    }

    public function destroy(Request $request,$id)
    {
//        dd($request->ids);
        $document = document_metadata::find($request->ids);
//        $document_id= $request->id;
        if(!is_null($document)){
            $document->delete();
        }

        return redirect('document_metadata/'.$id);

    }

}
