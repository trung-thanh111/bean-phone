<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class MailControllers extends Controller
{
    public function sendMail(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'content' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'content' => $request->content,
        ];

        // Kiểm tra và ghi log các giá trị
        Log::info('Email data:', $data);
        if (!$data['email'] || !env('MAIL_FROM_ADDRESS')) {
            return redirect()->route('home.contact')->with('error', 'Email địa chỉ gửi bị thiếu');

        }
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to($data['email'])
                    ->subject('Contact Form Submission');
            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });

        return redirect()->route('home.contact')->with('success', 'Email đã được gửi thành công!');
    }
}
