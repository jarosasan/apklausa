<?php

namespace App\Http\Controllers;

use App\User;
use App\Language;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('name');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAge($id)
    {
        $data = ['id'=> $id];
        return view('birth-day', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createGender($id)
    {
        $data = ['id'=> $id];
        return view('gender', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTest($id)
    {
        $data = ['id'=> $id];
        return view('test', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFinish($id)
    {
        $user= User::findOrFail($id);
        $data = ['user'=> $user];
        return view('fine', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createLang($id)
    {
        $data['lang'] = $lang = Language::all();
        $data['id'] = $id;
        return view('language', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeName(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:users|min:3|max:255',
        ]);
        $user = new User;
        $user = $user->create($validatedData);
        $data = ['id' => $user->id];
        return redirect()->route('createAge', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAge(Request $request, $id)
    {
        $validatedData = $request->validate([
            'year' => 'required|numeric',
            'month' => 'required|numeric',
            'day' => 'required|numeric',
        ]);
        $data['id'] = $id;
        $user = User::findOrFail($id);
        if(checkdate($validatedData['month'], $validatedData['day'], $validatedData['year'])){
            $date = $validatedData['year']."-".$validatedData['month']."-".$validatedData['day'];
            $user->update(['birth_day'=>$date]);
            return redirect()->route('createGender', $data=['user'=>$user]);
        }else{
            $data['errorMessage'] = "Something is wrong with this date field!";
            return view('birth-day', $data);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeGender(Request $request, $id)
    {
        $validatedData = $request->validate([
            'gender' => 'required|string|min:5|max:7',
        ]);
        $data['id'] = $id;
        $user = User::findOrFail($id);
        $user->update(['gender'=>$validatedData['gender']]);
        return redirect()->route('createTest', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTest(Request $request, $id)
    {
        $validatedData = $request->validate([
            'test' => 'required|bool',
        ]);
        $user = User::findOrFail($id);
        if ($validatedData['test'] == 0){
            $user->update(['test'=>$validatedData['test']]);
            return redirect()->route('createFin', $data['user'] = $user);
        }
        if ($validatedData['test'] == 1){
            $user->update(['test'=>$validatedData['test']]);
            return redirect()->route('createLang', $data['id'] = $id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLang(Request $request, $id)
    {
//        dd($request->input('lang'));
        $validatedData = $request->validate([
            'lang.*' => 'required|numeric',
        ]);
        $user = User::findOrFail($id);
        if($validatedData[0]== 0){
            $user->update(['skils'=>$validatedData[0]]);
            return redirect()->route('createFin', $data['user'] = $user);
        }
        $user->update(['skils'=> true]);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
