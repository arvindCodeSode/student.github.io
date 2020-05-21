<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Profile;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('users/index')->with('users',$users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
             'name'=>'required|min:2|alpha_dash',
             'email'=>'required|email|unique:users',
             'class'=>'required|min:2|integer',
             'phoneNumber'=>'required|min:10|integer',
             'dob'=>'required',
             'imageUrl'=>'required|image|max:10000',
             'hobbies'=>'required'
         ]);
         $image=$request->file('imageUrl');
         $new_image=rand().".".$image->getClientOriginalName();
        $form_data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'class'=>$request->class,
            'phoneNumber'=>$request->phoneNumber,
            'dob'=>$request->dob,
            'imageUrl'=>$new_image,
            'hobbies'=>$request->hobbies
        ];
         $users=User::create($form_data);
         if($users){
            return redirect('users/')->with('status',"User added successfully");
         }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users=User::find( $id );
        if($users){
                return view('users.profile',['user'=>$users]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users=User::find( $id );
        if($users){
                return view('users.edit',['user'=>$users]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users=User::find($id);
        if($users){
            $this->validate($request,[
                'name'=>'required|min:2|alpha',
                'email'=>'required|email',
                'class'=>'required|min:2|integer',
                'phoneNumber'=>'required|min:10',
                'dob'=>'required',
                'imageUrl'=>'required|image|max:10000',
                'hobbies'=>'required'
            ]);
            $image=$request->file('imageUrl');
            $new_image=rand().".".$image->getClientOriginalName();
           $users->name=$request->name;
           $users->email=$request->email;
           $users->class=$request->class;
           $users->phoneNumber=$request->phoneNumber;
           $users->dob=$request->dob;
           $users->imageUrl=$request->imageUrl;
           $users->hobbies=$request->hobbies;
            $update=$users->save();
            if($update){
               return redirect('users/')->with('status',"User updated successfully");
            }
        }
        return back()->with('status',"User Not Found"); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users=User::find($id);
        if($users){
            if($users->delete()){
                return back()->with('status',"User deleted successfully"); 
            }
            return back()->with('status',"User Not deleted successfully"); 
        }
        return back()->with('status',"User Not Found"); 
    }
}
