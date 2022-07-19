<?php

namespace App\Http\Controllers;

use App\Mail;
use App\Guardian;
use Illuminate\Http\Request;
use App\Http\Requests\guardianRequest;
use App\Http\Controllers\guardiansController;
use Illuminate\Foundation\Http\ForRequest;

class guardiansController extends Controller
{
     
        public function index(Mail $mail, Guardian $guardian)//index.blaad
    {
        $parent="guardians";
        return view('posts/index')->with(['maildatum' => $mail->getByLimit(),'guardians' =>$guardian->get()]);
    }
    
        public function show(Mail $mail)
    {
        return view('posts/show')->with(['mail' => $mail]);
    }

        public function create()
    {
        return view('posts/create');
    }
    
        public function store(Request $request, Guardian $guardian , guardianscreate $guardiancreate)
    {
        $input =$request['guardian'];
        $input["user_id"] = \Auth::id();
        $guardian->fill($input)->save();
        return redirect('/guardians/' . $guardian->id );
    }
    
        public function edit(Guardian $guardian)
    {
        return view('posts/edit')->with(['guardian' => $guardian]);
    }
        
        public function update(GuardianRequest $request, Guardian $guardian)
    {
        $input_mail = $request['guardian'];
        $guardian->fill($input_mail)->save();
        
        
        return redirect('/guardians/' . $guardian->id);
    }
 
        public function delete(Mail $guardian)
    {
        $guardian->delete();
        return redirect('/');
    }    
}
