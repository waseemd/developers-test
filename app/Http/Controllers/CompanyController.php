<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Asset;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class CompanyController extends Controller
{
    //put behind auth
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = \App\Company::paginate(5);

         return view('company.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
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
        'name'=>'required',
        'email'=> 'required|email',
        'logo' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        'website' => 'required|url'
      ]);
      $company = new Company([
        'name' => $request->get('name'),
        'email'=> $request->get('email'),
        'website'=> $request->get('website')
      ]);
      if($request->hasFile('logo')){
          $image = $request->file('logo');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          Image::make($image)->resize(100, 100)->save( public_path('/storage/' . $filename ) );
          $company->logo = $filename;
      };
      $company->save();
      Mail::to('waseemdawood@gmail.com')->send(new SendMailable($request->get('name')));
      return redirect('/company')->with('success', 'Company has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);

        return view('company.show', compact('company'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);

        return view('company.edit', compact('company'));
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
        $request->validate([
        'name'=>'required',
        'email'=> 'required|email',
        'logo' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        'website' => 'required|url'
      ]);
      $company = Company::find($id);
      $company->name = $request->get('name');
      $company->email = $request->get('email');
      $company->website = $request->get('website');
      if($request->hasFile('logo')){
          $image = $request->file('logo');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          Image::make($image)->resize(100, 100)->save( public_path('/storage/' . $filename ) );
          $company->logo = $filename;
      };
      $company->save();
      return redirect('/company')->with('success', 'Company has been updated');
    }

    /** 
     * Remove the specified resource from storage. Have not enabled this
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $company = Company::find($id);
      $company->delete();
      return redirect('/company')->with('success', 'Company has been deleted');
    }
}
