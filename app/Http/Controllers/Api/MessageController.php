<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\EmailNotificationAdmin;
use App\Mail\WelcomeUser;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $newEmail = new Message();
            $newEmail->name = $data['firstName'] . ' ' . $data['lastName'];
            $newEmail->message = $data['message'];
            $newEmail->email = $data['email'];
            $newEmail->phone = $data['phone'];
            $newEmail->reply = intval($data['reply']);

            if (!isset($newEmail) || !$newEmail) {
                abort(500, 'Errore durante l\'invio della mail');
            }

            $newEmail->save();

            $email = new EmailNotificationAdmin($newEmail);
            Mail::to('info@future-plus.it')->send($email);

            $email = new WelcomeUser($newEmail);
            Mail::to($data['email'])->send($email);

            return response()->json([
                'success' => true,
                'email'   => $newEmail
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => 'errore durante la creazione dell\'email: ' . $e->getMessage()]);
        }
    }

    
}
