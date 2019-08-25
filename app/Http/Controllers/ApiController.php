<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\User;
use App\Workout;
use App\User_progress;
use App\Workout_info;

//Resources
use App\Http\Resources\Data as DataResource;
use App\Http\Resources\Workout as WorkoutResource;
use App\Http\Resources\Workout_info as Workout_infoResource;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showWorkouts()
    {
       
        //Get Data
        $data = Workout::all();
        
        //Return data as resource
        return  WorkoutResource::collection($data);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUser($id)
    {
        //Get Data
        $user = User::findOrFail($id);
        
        //Return data as resource
        return  new DataResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveProgress(Request $request, $id)
    {
        $progress = new User_progress;

        $progress->user_id = $id;
        $progress->type = $request->input('type');
        $progress->month = $request->input('month');
        $progress->day = $request->input('day');

        if($progress->save()){

           //Get Data
            $user = User::findOrFail($id);
        
            //Return data as resource
            return  new DataResource($user);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showWorkouts_info()
    {
        //Get Data
        $data = Workout_info::all();
        
        //Return data as resource
        return  Workout_infoResource::collection($data);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
