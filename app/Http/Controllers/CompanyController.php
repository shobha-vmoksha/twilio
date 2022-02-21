<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Validator;
use App\Models\UsersPhoneNumber;
;



class CompanyController extends Controller
{
    //
   public  function index1(){

        return view('dashboard.company.index');
       }
    
      public function profile(){
           return view('dashboard.company.profile');
       }
     public function setting(){
           return view('dashboard.company.setting');
       }

       //list all
       public function index(){
        $users =UsersPhoneNumber::all();
        return view('dashboard.company.pages.index',compact("users"));
    }

//create customer
    public function addcustomer(){
        return view('dashboard.company.pages.createcustomer');
    }

    // public function show()
    // {
    //     $users = UsersPhoneNumber::all();
    //     return view('user.pages.welcome', compact("users"));
    // }

    //add number
    public function storePhoneNumber(Request $request)
    {
        //run validation on data sent in
        $validatedData = $request->validate([
            'phone_number' => 'required|unique:users_phone_number|numeric',
        ]);
        $user_phone_number_model = new UsersPhoneNumber($request->all());
        $user_phone_number_model->save();
        $this->sendMessage('User registration successful!!', $request->phone_number);
        return back()->with(['success' => "{$request->phone_number} registered"]);
        // return redirect()->back()->with('success', 'IT WORKS!');
    }

//send message
    public function sendnotification(Request $request)
    {
        $validatedData = $request->validate([
            'phone_number' => 'required',
            'body' => 'required',
        ]);
        $recipient = $validatedData["phone_number"];
        // iterate over the array of recipients and send a twilio request for each
            $this->sendMessage($validatedData["body"], $recipient);     
        return back()->with(['success' => "Messages on their way!"]);
        
    }

    //edit customer
    
    public function editcustomer($id){
        //dd($request->all());
        $data = UsersPhoneNumber::where('id', $id)->get();
        $data = $data[0];
       // dd($data);
        return view("dashboard.company.pages.editcus", compact('data', 'id'));
    }


    //edited customer
    public function editedcustomer(Request $request,$id){
        //dd($request->all());
         $request->validate([
             'phone_number'=>'required|min:10',
         ]);
        // dd($request->all());
         $editedcustomer = UsersPhoneNumber::find($request->id);
         //dd($editedcustomer->$id);
       //  $editedcustomer->name = $request->name;
       $editedcustomer->phone_number = $request->phone_number;
        // dd($editedcustomer);
         $editedcustomer->save();
         return redirect('company/index')->with('success', 'Customer Updated successfully!');
     }

     //delete
     public function deletecustomer($id){
        // dd($id);
     //    $customerdata = UsersPhoneNumber::find($id);
          $finduser =UsersPhoneNumber::find($id);
          $finduser->delete();
          return redirect('company/index')->with(['warning' => "{$finduser->phone_number} Deleted Successfully"]);
      
         //dd($customerdata->$id);
         // $customerdata->delete();
         // return redirect('/company/index')
         // ->with('success','Customer has been deleted successfully');
 
      }

      //////////////////////////////////////////////////////

    public function sendCustomMessage(Request $request)
    {
        $validatedData = $request->validate([
            'users' => 'required|array',
            'body' => 'required',
        ]);
        $recipients = $validatedData["users"];
        // iterate over the array of recipients and send a twilio request for each
        foreach ($recipients as $recipient) {
            $this->sendMessage($validatedData["body"], $recipient);
        }
        return back()->with(['success' => "Messages on their way!"]);
    }

    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, ['from' => $twilio_number, 'body' => $message]);
    }

    public function sendsms($id){
        //dd($id);
        $data = UsersPhoneNumber::where('id', $id)->get();
        //dd($data);
        $data = $data[0];
      // dd($data);
       return view("dashboard.company.pages.sms", compact('data', 'id'));
    }

  

    //sendmessage
   

    private function sendMessage1($message, $recipient)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipient, ['from' => $twilio_number, 'body' => $message]);
    }

    public function bulksms(){
        return view('user.pages.bulksms');
    }

    public function sendbulksms(Request $request){
        dd($request->all);
        $sid    = env( 'TWILIO_SID' );
        $token  = env( 'TWILIO_TOKEN' );
        $client = new Client( $sid, $token );
        
        $validatedData = $request->validate([
            'phone_number' => 'required|array',
            'body' => 'required',
        ]);
     
 
    
            $numbers_in_arrays = explode( ',' , $request->input( 'phone_number' ) );
 
            $message = $request->input( 'body' );
            $count = 0;
 
            foreach( $numbers_in_arrays as $number )
            {
                $count++;
 
                $client->messages->create(
                    $number,
                    [
                        'from' => env( 'TWILIO_FROM' ),
                        'body' => $message,
                    ]
                );
            }
 
            return back()->with( 'success', $count . " messages sent!" );
               
        
    }



  



  
}
