<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\task_metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class TasksController extends Controller
{
    public function index()
    {
        // task_show
        abort_if(Gate::denies('task_view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tasks = Task::paginate();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        abort_if(Gate::denies('task_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);

        Auth::user()->tasks()->create([
            'team_id' => Auth::user()->currentTeam->id,
            'name' => $request->name,
        ]);

        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        //
    }

    public function edit($id)
    {
        abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data =  Task::find($id);
        return view('tasks.edit',compact('data'));

    }

    public function update(Request $request,$id)
    {
        abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = Task::find($id);
        $data->name = $request->input('name');
        $data->update();
            return redirect('/tasks')->with('status',"data updated");
    }

    public function destroy($id)
    {

        abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = Task::find($id);
        $data->delete();
        return redirect('tasks');
    }


        ///metadata start here
    public function metataskcreate($id)
    {        
        return view('tasks.metataskcreate',compact('id'));
    }

    public function metataskindex($id)
    {        
        // dd($id);
        $metadata = task_metadata::paginate();
        $ids = $id;
        return view('tasks.metataskindex',compact('metadata','ids'));

    }

    public function metastore(Request $request,$id)
    {
        // dd($id);
        $metadata = new task_metadata();
        $metadata->task_id = $request->metaid;
        $metadata->key = $request->metakey;
        $metadata->value = $request->metavalue;
        $metadata->save();
        $ids = $id;
        // return view('tasks.metataskindex',compact('metadata','ids'));
        return redirect()->route('metataskindex',['id'=>$ids]);
    }
}
