<?php

namespace App\Http\Controllers;

use App\hleps;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\HelpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class helpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('help');
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
    public function store(HelpRequest $request)
    {


        Mail::send('mail1', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'send_for'=> $request->get('send_for') ,
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('sramalzamzami@gmail.com', 'Admin')->subject($request->get('subject'));
        });

        /** @var TYPE_NAME $request */
        hleps::create($request->all());

        return back()->with('success', 'لقد تلقينا رسالتك ونود أن نشكرك على مراسلتنا.سيتم مراجعه رسالتك عزيزي الزائر بقى على تواصل معنا. نحن هنا لمساعدتك');


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
