<?php

namespace App\Http\Controllers\Supervisor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Course;
use Mail;
use Config;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->input('type') == 'trainee') {
            $users = User::trainee()->get();
            return view('supervisor.users.trainee.index', compact('users'));
        }
        if ($request->input('type') == 'supervisor') {
            $users = User::supervisor()->get();
            return view('supervisor.users.supervisors.index', compact('users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supervisor.users.trainee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $plainPassword = str_random(10);
        $input['password'] = bcrypt($plainPassword);
        $user = new User();
        if ($user->validate($input)) {
            $user = User::create($input);
            Mail::send('emails.confirmation', ['user' => $user, 'plainPassword' => $plainPassword], function ($message) use ($user, $plainPassword) {
                $message->from(Config::get('global.defaultMail'), Config::get('global.appName'));
                $message->to($user->email, $user->name)->subject('Account created!');
            });
            return redirect()->action('Supervisor\UsersController@index', ['type' => 'trainee']);
        } else {
            return redirect()->back()->withErrors($user->errors());
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
        $supervisor = User::with('courses')->find($id);
        return view('supervisor.users.supervisors.show', compact('supervisor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $userId)
    {
        $supervisor = user::find($userId);
        if ($request->input('type') != 'trainee') { 
            $this->authorize('edit', $supervisor);
        }        
        return view('supervisor.users.supervisors.edit', compact('supervisor'));
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
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255'
        ]);
        $this->authorize('edit', $user);
        $user->update($request->all());
        return redirect('/home');
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
