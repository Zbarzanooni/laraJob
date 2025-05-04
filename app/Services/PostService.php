<?php

namespace App\Services;

use App\Models\Listing;
use Illuminate\Contracts\Debug\ExceptionHandler;
use PHPUnit\Exception;

class PostService
{
    public function AddPost($request){

        try
        {
            $imgPath = $request->file('image')->store('image', 'public');
            Listing::create([
                'title'      =>$request->title,
                'description'=>$request->description,
                'salary'     =>$request->salary,
                'rolse'      =>$request->rolse,
                'address'    =>$request->address,
                'deadline'   =>$request->date,
                'user_id'    =>auth()->user()->id,
                'image'      =>$imgPath,
                'job_type'   =>$request->job_type

            ]);
        }catch (Exception $exception){
            app()[ExceptionHandler::class]->report($exception);
            return New ResultService(false,message: $exception->getMessage());
        }
        return New ResultService(true);

    }

}
