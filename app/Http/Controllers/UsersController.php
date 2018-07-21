<?php

namespace App\Http\Controllers;

use App\User;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Cookie::has('id') || !Cookie::has('route')){
            return view('name');
        }else{
            $data['user'] = User::findOrFail(Cookie::get('id'));
            $route = Cookie::get('route');
            return redirect()->route($route , $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAge($id)
    {
        $user= User::findOrFail($id);
        $data = ['user'=> $user];
        return view('birth-day', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createGender($id)
    {
        $user= User::findOrFail($id);
        $data = ['user'=> $user];
        return view('gender', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTest($id)
    {
        $user= User::findOrFail($id);
        $data = ['user'=> $user];
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
        $data['lang'] = Language::all();
        $user= User::findOrFail($id);
        $data['user'] = $user;
        return view('language', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFile($id)
    {
        $user= User::findOrFail($id);
        $data = ['user'=> $user];
        return view('file', $data);
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
        $data['user'] = $user;
        Cookie::queue('id', $user->id, 525600);
        Cookie::queue('route', 'createAge', 525600);
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
        $user = User::findOrFail($id);
        $data['user'] = $user;
        if(checkdate($validatedData['month'], $validatedData['day'], $validatedData['year'])){
            $date = $validatedData['year']."-".$validatedData['month']."-".$validatedData['day'];
            $user->update(['birth_day'=>$date]);
            Cookie::queue('route', 'createGender', 525600);
            return redirect()->route('createGender', $data);
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
        $user = User::findOrFail($id);
        $user->update(['gender'=>$validatedData['gender']]);
        Cookie::queue('route', 'createTest', 525600);
        return redirect()->route('createTest', $data['user'] = $user);
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
            Cookie::queue('route', 'createLang', 525600);
            return redirect()->route('createLang', $data['user'] = $user);
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
        $request->validate([
            'lang.*' => 'required|numeric',
        ]);
        $user = User::findOrFail($id);
        if($request->input('lang')[0]== 0){
            $user->update(['skils'=> false]);
            Cookie::queue('route', 'createFin', 525600);
            return redirect()->route('createFin', $data['user'] = $user);
        }
        $user->update(['skils'=> true]);
        $user->language()->sync($request->input('lang'));
        Cookie::queue('route', 'createFile', 525600);
        return redirect()->route('createFile', $data['user'] = $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->hasFile('file')){
            $request->validate([
                'file' => 'image|mimes:jpeg,png,jpg|max:500',
            ]);
            $file = $request->file->store('public/images');
            $file = basename($file);
            $user->images()->create([
                'file_name' => '/'.$file,
                'user_id' => $id
            ]);
        }
        Cookie::queue('route', 'showUser', 525600);
        return redirect()->route('showUser', $data['user'] = $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $data['user']=$user;
        $lan = $user->language;
        $data['lan']= $lan;
        $img = $user->images;
        $data['image']= $img;
        return view('anketa', $data);
    }
}
