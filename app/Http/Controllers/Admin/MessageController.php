<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();

        return view('admin.email.index', compact('messages'));
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
        // try {
        //     $data = $request->all();

        //     $newEmail = new Email();
        //     $newEmail->firstName = $data['firstName'];
        //     $newEmail->lastName = $data['lastName'];
        //     $newEmail->email = $data['email'];
        //     $newEmail->phone = $data['phone'];
        //     $newEmail->reply = $data['reply'];

        //     $newEmail->save();

        //     return view('admin.email.create')->with('email_success', true);
        // } catch (Exception $e) {
        //     return response()->json(['error' => 'errore durante la creazione dell\'email: ' . $e->getMessage()]); 
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::where('id', $id)->firstOrFail();
        return view('admin.email.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::where('id', $id)->firstOfFail();

        $message->delete();
        return to_route('admin.email.index')->with('delete_success', $message);
    }

    public function restore($id)
    {
        Message::withTrashed()->where('id', $id)->restore();

        $message = Message::find($id);

        return to_route('admin.email.index')->with('restore_success', $message);
    }


    public function trashed()
    {
        $trashedMessages = Message::onlyTrashed()->paginate(10);



        return view('admin.email.trashed', compact('trashedMessages'));
    }

    public function hardDelete($id)
    {
        $message = Message::withTrashed()->find($id);
        $message->forceDelete();

        return to_route('admin.email.trashed')->with('delete_success', $message);
    }
}
