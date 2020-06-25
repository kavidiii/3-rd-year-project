<?php

namespace App\Http\Controllers;
use App\Contact;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        
         
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student');   //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'NIC'=>'required'
        ]);
        $user = auth()->user();
         
        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'user_id'    => $user->id,
            'first_name'       =>   $request->first_name,
            'last_name'        =>   $request->last_name,
             'email'            =>   $user->email,
            'date_of_birth'    =>   $request->date_of_birth,
            'age'     =>   $request->age,
            'phoneno'   =>   $request->phoneno,
            'address'    =>   $request->address,
            'NIC'   =>   $request->NIC,
            'gender'    =>   $request->gender,
            'freeDay'  =>   $request->freeDay,
            'license'   =>   $request->license,
            'image'            =>   $new_name
        );
        Contact::create($form_data);
        return redirect('/contacts')->with('success', 'Contact saved!');
    
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    { 
         
        $contact =DB::table('contacts')->where ('user_id','=',$user_id)->get()->first();
        return view('edit', compact('contact'));     
        // $contact = Contact::findOrFail($user_id);
        // return view('edit', compact('contact'));   
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'NIC'=>'required'
        ]);
             $contact = DB::table('contacts')->where ('user_id','=',$user_id)->get()->first();
            $contact->first_name = $request->get('first_name');
            $contact->last_name =$request->get('last_name');
            $contact->email = $request->get('email');  
            $contact->date_of_birth= $request->get('date_of_birth');
            $contact->age= $request->get('age');
            $contact->phoneno = $request->get('phoneno');
            $contact->address = $request->get('address');
            $contact->NIC = $request->get('NIC');
            $contact->gender= $request->get('gender');
            $contact->freeDay= $request->get('freeDay');
            $contact->license= $request->get('license');
         
        $contact->save();
        return redirect('/admin')->with('success', 'Contact updated !');  //  //
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        // $contact = Contact::find($user_id);
        // $contact->delete();
        DB::table('contacts')->where ('user_id','=',$user_id)->delete();

        return redirect('/admin')->with('success', 'Contact deleted!');  //
    }
}
