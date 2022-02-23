<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Category;
use App\Models\Law;
use App\Models\Letter;
use App\Models\StaticPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LetterController extends Controller
{
    
    public function letter(Request $request)
    {
        $id = $request->category;
        $letter = StaticPage::where('status', 1)->where('category', $id)->get(); 
        return view('frontend.letter.index', compact('letter'));
    }
    public function mail(){
        return view('frontend.mail.index');
    }
    public function send(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'content' => 'required'
        ]);

        $data = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'type'=>$request->type,
            'address'=>$request->address,
            'content'=>$request->content
        );

        Mail::to('ktn@nakhchivan.az')->send(new SendMail($data));
        alert()->success('Uğurlu', 'Mesajınız uğurla göndərildi')
            ->showConfirmButton('Tamam', '#3085d6');
        return redirect()->route('frontend.mail');
    }
}
