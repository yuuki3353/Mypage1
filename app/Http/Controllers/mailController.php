<?php

namespace App\Http\Controllers;

use App\Mail;
use App\Guardian;
use App\Category;
use App\Schedule;
use Illuminate\Http\Request;
use App\Http\Requests\MailRequest;
use App\Http\Requests\MailSaveRequest;
use App\Http\Controllers\mailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class mailController extends Controller
{
        public function index(Mail $mail, Guardian $guardian)//index.blaad
    {
            $parent="guardians";
            
        
            return view('posts/index')->with([
                'schoolMails' => $mail->mailsForSchool(),
                'parentMails' => $mail->mailsForParent(),
                'guardians' =>$guardian->get()
                ]);
    }
    
        public function show(Mail $mail)
    {
            return view('posts/show')->with(['mail' => $mail]);
    }

        public function create(Category $category,Mail $mail, Guardian $guardian )
    {
             $name=\Route::currentRouteName();
            return view('posts/create')->with(['categories' =>$category->get(),"name"=>$name , 'mail'=>$mail->get() ]);
    }
    
        public function store(Request $request, Mail $mail, Guardian $guardian, Category $category)
    {
            $mail->fill($request->input('mail'))->save();
            return redirect('/');
    }
    
        public function school(Mail $mail)
    {
            return view('posts/school')->with(['mail'=> $mail->get()]);    
    }
    
        public function guardian(Mail $mail)
    {
            return view('posts/guardian')->with(['mail'=> $mail->get()]);
    }
        public function calendar(Mail $mail)
    {
            return view('posts/calendar')->with(['mail'=> $mail->get()]);
    }
        
        public function edit(Mail $mail)
    {
            return view('posts/edit')->with(['mail' => $mail]);
    }
    
    
    
    
    
    
        public function scheduleAdd(Request $request)
    {
        // バリデーション
        $request->validate
        ([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer',
            'event_name' => 'required|max:32',
        ]);

        // 登録処理
       $schedule = new Schedule;
       //日付に変換。JaveScriptのタイムスタンプをミリ秒から秒に変換
       $schedule->start_date = date('Y-m-d', $request->input('start_date')/ 1000);
       $schedule->end_date = date('Y-m-d', $request->input('end_date') / 1000);
       $schedule->event_name =$request->input('event_name');
       $schedule->save();
       
       return;
    }
        public function scheduleGet(Request $request ,Schedule $Schedule)
    {   
            //バリデーション
            $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer',
            ]);
            
            //カレンダー表示期間
             $start_date =date('Y-m-d' , $request->input('start_date') / 1000);
             $end_date =date('Y-m-d' ,$request->input('end_date') /1000);
            
            //登録処理
            return Schedule::query()
            ->select(
            //FullCalendarの型式に合わせる
            'start_date as start',
            'end_date as end',
            'event_name as title',
            // 削除する為にイベントIDを返却
            'id'
            )
            //FullCalendarの表示範囲のみ表示
            ->where('end_date', '>', $start_date)
            ->where('start_date', '<', $end_date)
            ->get();
    }
    
        public function scheduleDelete(Request $request)
    {
            // バリデーション
            $request->validate([
            'id' => 'required|integer'
            ]);

            Schedule::destroy($request->input('id'));
    }

    
    
    
        public function update(MailRequest $request, Mail $mail)
    {
            $input_mail = $request['mail'];
            $mail->fill($input_mail)->save();
        
            return redirect('/mails/' . $mail->id);
    }
 
        public function delete(Mail $mail)
    {
            $mail->delete();
            return redirect('/');
    }
    
    
    
}
/**
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */
