<?php

namespace App\Http\Controllers;

use App\Models\Task as Task;
use App\Http\Resources\Task as TaskResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * @group Task Management
 * 
 * API to manage task resource
 */
class TaskController extends Controller
{

    private $valid_status = ['in-time','alert','late'];
    private $valid_categories =  ['wait','running','pendency','done','other'];
    /**
     * List all tasks 
     * 
     * Get a list of tasks
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('order', 'ASC')
                     ->orderBy('id', 'DESC')
                     ->paginate(100);

        return TaskResource::collection($tasks);

    }

    /**
     * Update position of the task
     * 
     * Used to move task up/down right and left
     * 
     * @urlParam id int required ID of the task
     * @bodyParam category string required The category of the task. Example: wait
     * @bodyParam order int required The position the task will be placed. Example: 1
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateOrder(Request $request, $id)
    {
        $task = Task::findOrFail( $id );

        $new_category = $request->input('category');


        if(!in_array($new_category, $this->valid_categories)){
            return response()->json([
                'success'=>false, 
                'message'=> "invalid category please use one of [" . implode(" ", $this->valid_categories) . "]"
            ], 405);
        }



        $new_order = $request->input('order');

        $error_message = "";
        $data = [];


        if($task->category == $new_category){
            
            if($task->order != $new_order){

                $data = 'Same';
                $tasksInCategory = Task::where('category', $new_category);

                // check length of tasks
                if(count($tasksInCategory->get())  >= $new_order){

                    DB::beginTransaction();

                    if($new_order < $task->order) {

                        $data = $tasksInCategory->get()->filter(function ($t) use ($new_order, $task)  {
                            return ($t->order >= $new_order) && ($t->order < $task->order); ;
                        });
    
                        foreach($data as $t){
                            DB::table("tasks")->where("id",$t->id)->update([
                                'order' => $t->order + 1,
                            ]);
                        }
                    } else {


                        $data = $tasksInCategory->get()->filter(function ($t) use ($new_order, $task) {
                            return ($t->order <= $new_order) && ($t->order > $task->order);
                        });
    
                        foreach($data as $t){
                            DB::table("tasks")->where("id",$t->id)->update([
                                'order' => $t->order - 1,
                            ]);
                        }
                    }
                    
                    DB::table("tasks")->where("id",$task->id)->update([
                        'order' => $new_order,
                    ]);

                    DB::commit();

                    return response()->json([
                        'success'=>true, 
                        'message'=>'UPDATED! 1 -> ' . $new_order . " " . $task->id
                    ]);
                    
                } else {
                    $error_message = "invalid order";
                }

            } else {
                 $error_message = "it is the same order";
                 
            }
            return response()->json([
                'success'=>false, 
                'message'=> $error_message,            
            ], 400);

        } else {

            $tasksInCategory = Task::where('category', $new_category);

            // check length of tasks
            if(count($tasksInCategory->get())  >= $new_order - 1){

                DB::beginTransaction();

                $data = $tasksInCategory->get()->filter(function ($t) use ($new_order)  {
                    return ($t->order >= $new_order);
                });

                foreach($data as $t){
                    DB::table("tasks")->where("id",$t->id)->update([
                        'order' => $t->order + 1,
                    ]);
                }
               
                DB::table("tasks")->where("id",$task->id)->update([
                    'order' => $new_order,
                    'category' => $new_category, 
                ]);
               
                // updating previous category
                $tasksInPreviousCategory = Task::where('category', $task->category)->get();

                $data = $tasksInPreviousCategory->filter(function ($t) use ($task) {
                    return $t->order > $task->order;
                });

                foreach($data as $t){
                    $inc_order = $t->order - 1;
                    DB::table("tasks")->where("id",$t->id)->update([
                        "order" => $inc_order
                    ]);
                }

                DB::commit();
        
                return response()->json([
                    'success'=>true, 
                    'message'=>'UPDATED X!'
                ]);
                
            } else {
                $error_message = "invalid order";
            }

            return response()->json([
                'success'=>false, 
                'message'=> $error_message
            ], 401);
        }

    }



    /**
     * Create a new task.
     * 
     * Used to create a new task
     * 
     * @bodyParam category string required The category of the task. Defaults to 'wait'. Example: wait
     * @bodyParam time string required The time of the task. Defaults to '1h'. Example: 1h
     * @bodyParam notifications int required The number of notifications of the task. Defaults to 0. Example: 0
     * @bodyParam tag string required The number of tag of the task. Defaults to 'Dev'. Example: Dev
     * @bodyParam code string required The number of code of the task. Defaults to '12345'. Example: 12345
     * @bodyParam title string required The number of title of the task. Defaults to 'Some title'. Example: Some title
     * @bodyParam project string required The number of project of the task. Defaults to 'Company'. Example: Company
     * @bodyParam expected_date date required The number of expected_date of the task. Defaults to '2022-12-31'. Example: 2022-12-31
     * @bodyParam description string required The number of description of the task. Defaults to' Some description'. Example: Some Description
     * @bodyParam expected string required The number of expected of the task. Defaults to '00:30.' Example: 00:30
     * @bodyParam balance string required The number of balance of the task. Defaults to '+00:10'. Example: +00:10
     * @bodyParam status string required The number of status of the task. Defaults to 'in-time'. Example: in-time
     * @bodyParam team string required The number of team of the task. Defaults to '[]'. Example: []
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->category = $request->input('category');
        $task->time = $request->input('time');
        $task->notifications = $request->input('notifications');
        $task->tag = $request->input('tag');
        $task->code = $request->input('code');
        $task->title = $request->input('title');
        $task->project = $request->input('project');
        $task->expected_date = $request->input('expected_date');
        $task->description = $request->input('description');
        $task->expected = $request->input('expected');
        $task->balance = $request->input('balance');
        $task->status = $request->input('status');
        $task->team = $request->input('team');

        if(!in_array($task->category, $this->valid_categories)){
            return response()->json([
                'success'=>false, 
                'message'=> "invalid category please use one of [" . implode(" ", $this->valid_categories) . "]"
            ], 405);
        }
        if(!in_array($task->status, $this->valid_status)){
            return response()->json([
                'success'=>false, 
                'message'=> "invalid status please use one of [" . implode(" ", $this->valid_status) . "]"
            ], 405);
        }

        $maxOrder = DB::table('tasks')
                        ->where('category',$request->input('category'))
                        ->max('order');

        $task->order = ($maxOrder + 1);


        if( $task->save() ){
            return new TaskResource( $task );
        }
    }

    /**
     * Display the specified task
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail( $id );
        return new TaskResource( $task );
    }


    /**
     * Update the specified task.
     * 
     * Update one or multiple attributes of the task.
     * To update the **category** or **order** use the ** /task-order/{id} ** 
     * 
     * @bodyParam time string The time of the task. Defaults to '1h'. Example: 1h
     * @bodyParam notifications int The number of notifications of the task. Example: 0
     * @bodyParam tag string The number of tag of the task. Example: Dev
     * @bodyParam code string The number of code of the task. Example: 12345
     * @bodyParam title string The number of title of the task. Example: Some title
     * @bodyParam project string The number of project of the task. Example: Company
     * @bodyParam expected_date date The number of expected_date of the task. Example: 2022-12-31
     * @bodyParam description string The number of description of the task. Example: Some Description
     * @bodyParam expected string The number of expected of the task. Example: 00:30
     * @bodyParam balance string The number of balance of the task. Example: +00:10
     * @bodyParam status string The number of status of the task. Example: in-time
     * @bodyParam team string The number of team of the task. Example: []
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail( $id );


        foreach ($request->all() as $key => $value) {
            if($key === "category" || $key === "order"){

                if($task->{$key} != $value) {
                    return response()->json([
                        'success'=>false, 
                        'message'=> "please update (category|order) with the /task-order/{id}"
                    ], 405);
                }
            }
            $task->{$key} = $value;
        }

        if(!in_array($task->category, $this->valid_categories)){
            return response()->json([
                'success'=>false, 
                'message'=> "invalid category please use one of [" . implode(" ", $this->valid_categories) . "]"
            ], 405);
        }
        if(!in_array($task->status, $this->valid_status)){
            return response()->json([
                'success'=>false, 
                'message'=> "invalid status please use one of [" . implode(" ", $this->valid_status) . "]"
            ], 405);
        }

    
        if( $task->save() ){
            return new TaskResource( $task );
        }
    }

    /**
     * Remove the specified task.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail( $id );
        if( $task->delete() ){
            return new TaskResource( $task );
        }
    }
}
