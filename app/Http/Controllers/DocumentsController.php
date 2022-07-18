<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\document_metadata;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use Gate;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class DocumentsController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documents = Document::paginate();

        return view('documents.index', compact('documents'));

    }

//

    public function delete(Request $request){
//        dd($request->id);

        abort_if(Gate::denies('document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document = Document::find($request->id);
        if(!is_null($document)){
            $document->delete();
        }

        $post = document_metadata::where('document_id',$request->id);
        $post->delete();

        return redirect('/documents');
    }



    public function create()
    {
        abort_if(Gate::denies('document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('documents.create');
    }

    public function store(Request $request)
    {

        return redirect()->route('documents.index');
    }

    public function show(Document $task)
    {
        //
    }

    public function edit(Document $task)
    {
        // abort_if(Gate::denies('document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    }

    public function update(Request $request, Document $task)
    {
        //
    }

    public function destroy(Document $document)
    {
        dd($document);
    }

    public  function upload(Request $request)
    {
        abort_if(Gate::denies('document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('azure',$filename,'azure');


            $document = new Document();
            $document->team_id = Auth::user()->currentTeam->id;
            $document->user_id = Auth::user()->id;
            $document->file_path= $this->path($request);
            $document->file_name= $this->name($request);
            $document->file_type=$this->ext($request);
            $document->file_size = $this->size($request);
            $document->save();

        }

    }









    public function name(Request $req)
    {
        $name = $req->file('image')->getClientOriginalName();
        return $name;
    }

    public function path(Request $req)
    {
        $name = $req->file('image')->getClientOriginalName();
        $path = $req->file('image')->storeAs('azure',$name);
        return $path;
    }

    public function size(Request $req)
    {
        return (($req->file('image')->getSize())/1000);
    }

    function ext(Request $req)
    {
        return $req->file('image')->extension();
    }

}
