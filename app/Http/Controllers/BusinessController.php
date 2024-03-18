<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

use Auth;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.add-business');
    }  
    
    /**
    * Search
    */
   public function search(Request $request)
   {

        $validated = $request->validate([  'search' => 'required'    ]    );

        $search = $request->input('search');
        $results = Business::where('title', 'like', "%$search%")
                   ->orWhere('code', '=', $search)
                   ->orWhere('vat_code', '=', $search)
                   ->limit(10)->get();

        return view('welcome', compact('results'));
   }


    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       $validated = $request->validate([
        'title' => 'required|max:255',
        'code' => 'required|integer|unique:businesses|max:2147483647',
        'vat_code' => 'nullable',
        'phone' => 'required',
        'address' => 'required|max:255',
        'email' => 'required|email',
        'activity' => 'required|max:255',
        'manager' => 'required|max:255'
        ]
       );


       Business::create([
        'title' => request('title'),
        'code' => request('code'),
        'vat_code' => request('vat_code'),
        'phone' => request('phone'),
        'email' => request('email'),
        'address' => request('address'),
        'activity' => request('activity'),
        'manager' => request('manager'),
        'user_id' => Auth::id()
       ]);

       return redirect('/all');
    }

    /**
     * Display the specified resource.
     */
    public function show(Business $business)
    {
        
        return view('pages.show-business', compact('business'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business)
    {
        if($business->user_id != Auth::id()){
            abort(403);
        }

        return view('pages.edit-business', compact('business'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Business $business)
    {
        if($business->user_id != Auth::id()){
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|max:255',
            'code' => 'required|integer|max:2147483647',
            'vat_code' => 'nullable',
            'phone' => 'required',
            'address' => 'required|max:255',
            'email' => 'required|email',
            'activity' => 'required|max:255',
            'manager' => 'required|max:255'
            ]
           );
    
           Business::where('id', $business->id)->update(
              [
                'title' => request('title'),
                'code' => request('code'),
                'vat_code' => request('vat_code'),
                'phone' => request('phone'),
                'email' => request('email'),
                'address' => request('address'),
                'activity' => request('activity'),
                'manager' => request('manager')
               ]
            );
    
           return redirect('/business/'.$business->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $business)
    {

        if($business->user_id == Auth::id()){
            $business->delete();
            return redirect('/all');
        }
        else{
            abort(403);
        }

    }
}
