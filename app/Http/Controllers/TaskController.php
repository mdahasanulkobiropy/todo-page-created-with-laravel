<?php

namespace App\Http\Controllers;

use App\Models\TagTask;
use App\Models\Task;
use App\Models\TaskUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //store method
    public function store(Request $request){


        // dd($request->all());

        $request->validate([
            'title' => 'required',
            'dueDate' => 'required',
            'description' =>'required',
            'user_id' => 'required|array|min:1',
            'tag_id' => 'required|array|min:1',
        ]);


        $task = new Task();

        $task->title = $request->title;
        $task->dueDate = $request->dueDate;
        $task->description = $request->description;
        $task->save();

        foreach ($request->user_id as $user_id){

            $task_user =new TaskUser();
            $task_user->user_id = $user_id;
            $task_user->task_id = $task->id;
            $task_user->save();
        }

        // dd($request->tag_id);
        foreach ($request->tag_id as $tag_id){

           $tag_task = new TagTask();

           $tag_task->tag_id = $tag_id;
           $tag_task->task_id = $task->id;

           $tag_task->save();
        }

        return back()->with('storeMessage', 'Task Successfully Store');

    }

    //update method
    public function update(Request $request, $id){

        // dd($request->all());

        $validate = $request->validate([
            'uptitle' => 'required',
            'updueDate' => 'required',
            'updescription' =>'required',
            'upuser_id' => 'required|array|min:1',
            'uptag_id' => 'required|array|min:1',
        ]);





        $task =Task::find($id);

        $task->title = $request->uptitle;
        $task->dueDate = $request->updueDate;
        $task->description = $request->updescription;
        $task->save();

        TagTask::where('task_id', $task->id)->get()->each->delete();
        TaskUser::where('task_id', $task->id)->get()->each->delete();


        foreach ($request->upuser_id as $user_id){

            $task_user = new TaskUser();
            $task_user->user_id = $user_id;
            $task_user->task_id = $task->id;
            $task_user->save();
        }

        // dd($request->tag_id);

        foreach ($request->uptag_id as $tag_id){

           $tag_task = new TagTask();
           $tag_task->tag_id = $tag_id;
           $tag_task->task_id = $task->id;

           $tag_task->save();
        }

        return back()->with('message', 'Task Successfully Update');

    }


    //delete method
    public function delete($id){

        $task = Task::find($id);

        $task->delete();
        return back();
    }

    //forcedelete method

    public function forcedelete($id){

        $task = Task::onlyTrashed()->find($id);

        $task_user = TaskUser::where('task_id', $task->id)->get()->each->forcedelete();
        $tag_task = TagTask::where('task_id', $task->id)->get()->each->forcedelete();
        $task->forcedelete();

        return back();
    }


    //restore method

    public function restore($id){

        $task = Task::onlyTrashed()->find($id);
        $task->restore();

        return back();
    }


    //complete method

    public function complete($id){

        $task = Task::find($id);
        $task->cstatus = '1';
        $task->save();

        return back();
    }

    //incomplete method
    public function incomplete($id){

        $task = Task::find($id);
        $task->cstatus = '0';
        $task->save();

        return back();
    }

    //important method

    public function important($id){

        $task = Task::find($id);

        $task->imstatus = '1';
        $task->save();

        return back();

    }
    public function unimportant($id){

        $task = Task::find($id);

        $task->imstatus = '0';
        $task->save();

        return back();

    }
}
