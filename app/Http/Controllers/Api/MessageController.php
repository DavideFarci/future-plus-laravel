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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $newEmail = new Message();
            $newEmail->firstName = $data['firstName'];
            $newEmail->lastName = $data['lastName'];
            $newEmail->message = $data['message'];
            $newEmail->email = $data['email'];
            $newEmail->phone = $data['phone'];
            $newEmail->reply = $data['reply'];

            if (!isset($newEmail) || !$newEmail) {
                abort(500, 'Errore durante l\'invio della mail');
            }

            $newEmail->save();

            $email = new EmailNotificationAdmin($newEmail);
            Mail::to('test@dashboardristorante.it')->send($email);

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
