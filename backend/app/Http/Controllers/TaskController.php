<?php
namespace App\Http\Controllers;
use App\Models\Profile;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller {
    public function index(Profile $profile){
        $this->authorize('view',$profile);
        return response()->json($profile->tasks()->orderBy('start_time')->get());
    }
    public function store(Request $r, Profile $profile){
        $this->authorize('update',$profile);
        $data = $r->validate([
            'title'=>'required|string','start_time'=>'nullable','end_time'=>'nullable',
            'category'=>'nullable|string','repeat'=>'nullable|string','priority'=>'nullable|integer',
            'notes'=>'nullable|string','tags'=>'nullable|array'
        ]);
        $task = $profile->tasks()->create($data);
        return response()->json($task,201);
    }
    public function update(Request $r, Profile $profile, Task $task){
        $this->authorize('update',$profile);
        $task->update($r->all());
        return response()->json($task);
    }
    public function destroy(Profile $profile, Task $task){
        $this->authorize('update',$profile);
        $task->delete();
        return response()->json(null,204);
    }
}