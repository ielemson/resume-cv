<?php

namespace App\Http\Controllers;

use App\Mail\Contactus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactusController extends Controller
{
    
    public function capthcaFormValidate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'captchar' => 'required|captcha'
        ],

        [
            'name.required' => 'Your name is required',
            'email.required' => 'Email is required',
            'message.required' => 'Message is required',
            'captchar.required' => 'Captcha is required',
            'captchar.captcha' => 'Captcha has expired!',
        ]
    );

        if ($validator->fails()) {
            //pass validator errors as errors object for ajax response
                  return response()->json(['errors'=>$validator->errors()]);
                }else{

                   
                        $name = $request->name;
                        $email=$request->email;
                        $message=$request->message;
                  

                    Mail::to('info@ielemson.com')->send(new Contactus($name,$email,$message));

                    return response()->json([
                        'success' => 'Thank you, I will get back to you shortly.'
                    ], 200);

                    // return response()->json(['success'=>"Thank you, I will get back to you shortly."],200);
                }

        
    }
 
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
