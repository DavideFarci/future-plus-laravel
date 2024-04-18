<?php

namespace App\Http\Controllers\Api;

use App\Models\Consumer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsumerController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $check = false;
            $consumers = Consumer::all();
            $oldC;
            foreach ($consumers as $c) {
                if ($c['email'] == $data['email'] ) {
                    $check = true;
                    return response()->json([
                        'success'  => true,
                        'old'      => true,
                        'utente'   => $c
                    ]);
                }
            }
            if (isset($data['new'])){
                $oldC = Consumers::where('email', $data['email'])->get();
                return response()->json([
                    'success'  => true,
                    'old'      => true,
                    'utente'   => $oldC
                ]);
            }else if($check && $data['new']== 'new'){
                $consumer = Consumers::where('email', $data['email'])->get();
                $consumer->firstName = $data['firstName'];
                $consumer->lastName = $data['lastName'];
                $consumer->phone = $data['phone'];
                $consumer->update();     
                return response()->json([
                    'success'  => true,
                    'old'      => 'update',
                    'utente'   => $consumer
                ]);
            }

            $consumer = new Consumer();
            $consumer->firstName = $data['firstName'];
            $consumer->lastName = $data['lastName'];
            $consumer->phone = $data['phone'];
            $consumer->email = $data['email'];
            $consumer->status = 1;
           
            if (!isset($consumer) || !$consumer) {
                abort(500, 'Errore durante l\'invio della mail');
            }  

            $consumer->save();


            // $email = new EmailNotificationAdmin($consumer);
            // Mail::to('info@future-plus.it')->send($email);

            // $email = new WelcomeUser($consumer);
            // Mail::to($data['email'])->send($email);

            return response()->json([
                'success'  => true,
                'old'      => false,
                'utente'   => $consumer
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => 'errore durante la creazione dell\'utente: ' . $e->getMessage()]);
        }
    }
}
