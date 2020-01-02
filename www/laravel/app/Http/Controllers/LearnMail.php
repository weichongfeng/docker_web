<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LearnMail extends Controller
{
    public function send()
    {
        // Mail::to('1181488349@qq.com')
        Mail::send('emails.orders.shipped',['name'=>'测试邮件'],function($message){ 
            $to = '1181488349@qq.com'; $message ->to($to)->subject('邮件测试'); 
            }); 
            // 返回的一个错误数组，利用此可以判断是否发送成功
            return dd(Mail::failures());
        // return $this->view('emails.shipped');
    }
}
