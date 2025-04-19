<?php

namespace App\Http\Controllers;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\AllPostsResource;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Task;


use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    /**
     * Получить список задач
     */
    public function index()
    {
        return AllPostsResource::collection(Task::all());
    }


    /**
     * Сохранить новый таск
     */
    public function store(TaskRequest $request)
    {

       $data = $request->all();
       $data['user_id'] = Auth::id();
       Task::create($data);

       return response()->json($data);
    }

    /**
     * Получить конкретный таск
     */
    public function show(string $id)
    {
        $Task = Task::find($id);

        return response()->json($Task);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Удаление определенного таска
     */
    public function destroy(string $id)
    {
        Task::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Success'
        ]);
        //
    }
}
