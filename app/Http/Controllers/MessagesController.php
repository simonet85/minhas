<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Messages;
use App\Mail\ContactMail;
use App\Mail\MessagesMail;
use App\Mail\ReplyMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\MessageNotification;

class MessagesController extends Controller
{
    public function __construct(){
        return $this->middleware(["auth", "role:admin"])->except(["store", "send"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $messages = Messages::select(['id', 'name','subject', 'message', 'email', 'created_at'])
        ->orderBy('created_at', 'desc')
        ->get();
        if ($request->ajax()) {
          return response()->json(['messages' => $messages]);
        }

        return view("dashboard.home",[
            "messages" => $messages,
        ]);
    }

    /**
     * Send message .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function send(Request $request)
     {
        
        // Validation
         $request->validate([
             'email' => 'required|email',
             'reply' => 'required',
         ],[
            'email.required' => "Le champ email est obligatoire",
            'email.email' => "le champ email doit être un email valide",
            'reply.required' => "Le champ message est obligatoire",
         ]);
 
         $from = "nywusov@mailinator.com";
         $to = $request->input('email'); //recipient
         $reply = $request->input('reply');


         /*
         * The message is queued up and we need to set up the queue driver in .env (QUEUE_DRIVER=database)
         * generate a migration that creates this table, run the queue:table && php artisan migrate
         * * And later dispatch using a job : php artisan queue:work --queue=high,default
         * artisan notifications:table , this create notifications table
         */

         Mail::to($to)
             ->queue(new ReplyMessage($from,$to,$reply));
 
         return redirect()->back()->with('success', 'Réponse a été envoyé !');
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

        // Validation
        $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ],[
           'name.required' => "Le champ Nom est obligatoire",
           'subject.required' => "Le champ Objet est obligatoire",
           'email.required' => "Le champ email est obligatoire",
           'email.email' => "le champ email doit être un email valide",
           'message.required' => "Le champ message est obligatoire",
        ]);
 

        $data = [
            "name" => $request->input('name'),
            "subject" => $request->input('subject'),
            "email" => $request->input('email'), //sender
            "message" => $request->input('message')
        ];

        $to = "youremail@example.com"; //recipient

       //Saving message into Database
        $messages = new Messages( $data );
        $messages->save();

        // if ($messages instanceof Messages) {
        //     ddd($request->name,$request->subject, $request->email, $request->message);
        //   }
        // Queueing up data sent by mail
        Mail::to($to)->queue(new ContactMail($request->name, $request->subject,$request->email, $request->message));

        //Get user to be notify
        $user = User::where('email', 'admin@gmail.com')->first();
        
        //Notify the user with payload
       $user->notify(new MessageNotification($request->name,$request->subject, $request->email, $request->message));

        return response()->json(['success' => true,]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show(Messages $messages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit(Messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $message = Messages::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success', 'Message supprimé avec succès.');
    }
}
