<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $client = new Client;
        $client->name = $request->name;
        $client->address = $request->address;
        $client->primary_contact_name = $request->primary_contact_name;
        $client->primary_contact_number = $request->primary_contact_number;
        $client->save();
        return redirect('client')
            ->with('successMessage', "$request->name has been saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('client.show')
            ->with('client', $client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('client.edit')
            ->with('client', $client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->name = $request->name;
        $client->address = $request->address;
        $client->primary_contact_name = $request->primary_contact_name;
        $client->primary_contact_number = $request->primary_contact_number;
        $client->save();
        return redirect('client')
            ->with('successMessage', "$request->name has been updated");
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

    public function delete(Request $request)
    {
        $client_ids = $request->client_id;
        $num_to_delete = count($client_ids);
        \DB::table('clients')->whereIn('id', $client_ids)->delete();
        return redirect('client')
            ->with('successMessage', "$num_to_delete clients has been deleted");
    }
}
