<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;

class person_controller extends Controller
{
    //
      public function List()
{
    // Fetch all clients from the database in descending order by id
    $clients = Client::orderBy('id', 'desc')->get();

    // Pass them to the view
    return view('admin.person.list', compact('clients'));
}



    public function Add(){
        return view('admin.person.add');
    }

    public function store(Request $request){
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'whatsapp_number' => 'nullable|string|max:15',
            'description' => 'nullable|string',
        ]);

        // Create a new client instance
        Client::create([
            'name' => $request->name,
            'whatsapp_number' => $request->whatsapp_number,
            'description' => $request->description,
        ]);

        // Redirect back with success message
        return redirect()->route('person.list')->with('success', 'Client added successfully!');
    }   


     // ✅ Edit page
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.person.edit', compact('client'));
    }

    // ✅ Update client
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'whatsapp_number' => 'nullable|string|max:15',
            'description' => 'nullable|string',
        ]);

        $client = Client::findOrFail($id);

        $client->update([
            'name' => $request->name,
            'whatsapp_number' => $request->whatsapp_number,
            'description' => $request->description,
        ]);

        return redirect()->route('person.list')->with('success', 'Client updated successfully!');
    }

    // ✅ Delete client
    public function delete($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('person.list')->with('success', 'Client deleted successfully!');
    }
  
}
