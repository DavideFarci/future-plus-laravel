<?php

namespace App\Http\Controllers\Api;

use App\Models\Consumer;
use App\Models\Custumer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\EmailNotificationAdmin;
use Illuminate\Support\Facades\Storage;

class CustumerController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            //dd($data);
            $arrvar = str_replace('\\', '', $data['consumersData']);
            $body = json_decode($arrvar, true);

            //dd($body[0]['email']);

            $consumer = Consumer::where('email' ,$body[0]['email'])->firstOrFail();
            if (!$consumer){
                return response()->json([
                    'success'  => false,
                    'message'  => 'L\'utente non compare nei primi dati, riprovare da capo'
                ]);
            }
            
            $custumer = new Custumer();
            $custumer->consumer_id = $consumer->id;
            $custumer->c_f = $body[1]['cf'];
            $custumer->pec = $body[1]['pec'];
            $custumer->r_s = $body[1]['r_s'];
            $custumer->p_iva = $body[1]['p_iva'];
            $custumer->address = $body[1]['address'];
            $custumer->city = $body[1]['city'];
            $custumer->district = $body[1]['district'];
            $custumer->type_agency = $body[1]['type_agency'];   //ind. = 1, liber pr = 2, ditta individuale = 3...)
            //c
            $custumer->opening_times = json_encode($body[2][ 'opening_times'] , true) ;
            $custumer->service_times = json_encode($body[2][ 'service_time'] , true) ;
            $custumer->link_menu = $body[3][ 'link_menu'];
            //d
            if ($request->hasFile('image')) {
                $images = $request->file('image');        
                $arrimg = [];
                foreach ($images as $image) { 
                    $path = Storage::put('public/uploads', $image);             
                    array_push($arrimg, $path);
                }    
                $custumer->images_menu = json_encode($arrimg , true);
            }
      
           
            if (!isset($custumer) || !$custumer) {
                abort(500, 'Errore durante l\'invio della mail');
            }  

            $custumer->save();


            $email = new EmailNotificationAdmin($custumer);
            Mail::to('info@future-plus.it')->send($email);

            $email = new WelcomeUser($custumer);
            Mail::to($consumer['email'])->send($email);

            return response()->json([
                'success'  => true,
                'utente'   => $custumer
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => 'errore durante la creazione dell\'utente: ' . $e->getMessage()]);
        }
    }
}
