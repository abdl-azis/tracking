<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Contract_history;
use App\Models\Contract_doc;
use File;
use Illuminate\Support\Facades\DB;
class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $contracts= Contract::all();
        $contracts= Contract::with('client')->get();
        // $clients= Client::all();
        return view('contracts.v_index', compact('contracts'));
        //return $contracts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         //$contract_doc = Contract_doc::all(); 
         $clients= Client::all();
         return view('contracts.v_create_contract', compact('clients'));
       
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
          'name' => 'required',
          'client_id' => 'required',
          'cont_num' => 'required',
         // 'sign_date' => 'required',
          //'filename' => 'required|mimes:pdf,xlx,csv,doc,docx',
          ]);

        $contract = Contract::create($request->all());
        $files = $request->file('filename');
        if($files){
        foreach ($files as $file) {
             $filename = time().'.'.$file->getClientOriginalName();  
             Contract_doc::create([
            'filename' => $filename,
             'contract_id' => $contract->id,
             ]);
             $file->move(public_path('docs'), $filename);
        }
        //
        }
        // if($request->file()){
        // $filename = time().'.'.$request->filename->getClientOriginalName();  
        // Contract_doc::create([
        // 'filename' => $filename,
        // 'contract_id' => $contract->id,
        // ]);
        // $request->filename->move(public_path('docs'), $filename);
        // }
         return redirect('/contracts')->with('status', 'Success add Contract!');
    //return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        $contracts= Contract::with('doc')->get();
        $filename =$contract->doc;
        $clients= Client::all();
        return view('contracts.v_show', compact('contract', 'clients', 'filename'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        //
        
        $contracts= Contract::with('doc')->get();
        $filename =$contract->doc;
        $clients= Client::all();
       // return $contracts;
    return view('contracts.v_edit', compact('contract', 'clients', 'filename'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
        $request->validate([
          //'name' => 'required',
          //'client_id' => 'required',
          //'cont_num' => 'required',
          //'volume' => 'required',
          //'filename' => 'required',
          //'sign_date' => 'required',
          //'volume' => 'required',
          //'unit' => 'required',
          //'price' => 'required',
          //'start_date' => 'required',
          //'end_date' => 'required',
        
         ]);
         
        $dataOlds =Contract::all();
        foreach($dataOlds as $dataold){
            if($dataold->id==$contract->id){
            $name= $dataold->name;
            $client_id= $dataold->client_id;
            $cont_num= $dataold->cont_num;
            $sign_date= $dataold->sign_date;
            $volume= $dataold->volume;
            $unit = $dataold->unit;
            $price = $dataold->price;
            $start_date = $dataold->start_date;
            $end_date = $dataold->end_date;
            }
        }
         if($name != null ){
                Contract::where('id', $contract->id)
                ->update([
                'name' => $name,
                ]);
                
         }else{
         Contract::where('id', $contract->id)
                ->update(['name' => $request->name]);
         }
         if($client_id != null ){
                Contract::where('id', $contract->id)
                ->update([
                'client_id' => $client_id,
                ]);
                
         }else{
         Contract::where('id', $contract->id)
                ->update(['client_id' => $request->client_id]);
         }
         if($cont_num != null ){
                Contract::where('id', $contract->id)
                ->update([
                'cont_num' => $cont_num,
                ]);
                
         }else{
         Contract::where('id', $contract->id)
                ->update(['cont_num' => $request->cont_num]);
         }
         if($sign_date != null ){
                Contract::where('id', $contract->id)
                ->update([
                'sign_date' => $sign_date,
                ]);
                
         }else{
         Contract::where('id', $contract->id)
                ->update(['sign_date' => $request->sign_date]);
         }
         if($volume != null ){
                Contract::where('id', $contract->id)
                ->update([
                'volume' => $volume,
                ]);
                
         }else{
         Contract::where('id', $contract->id)
                ->update(['volume' => $request->volume]);
         }
         if ($unit != null) {
             Contract::where('id', $contract->id)
                ->update([
                'unit' => $unit,
                ]);
        }else {Contract::where('id', $contract->id)
                ->update(['unit' => $request->unit]);
        }
         if ($price != null) {
             Contract::where('id', $contract->id)
                ->update([
                'price' => $price,
                ]);
        }else {Contract::where('id', $contract->id)
                ->update(['price' => $request->price]);
        }
        if ($start_date != null) {
             Contract::where('id', $contract->id)
                ->update([
                'start_date' => $start_date,
                ]);
        }else {Contract::where('id', $contract->id)
                ->update(['start_date' => $request->start_date]);
        }
         if ($end_date != null) {
             Contract::where('id', $contract->id)
                ->update([
                'end_date' => $end_date,
                ]);
        }else {Contract::where('id', $contract->id)
                ->update(['end_date' => $request->end_date]);
        }

        $files = $request->file('filename');
        if($files){
        foreach ($files as $file) {
             $filename = time().'.'.$file->getClientOriginalName();  
             Contract_doc::create([
            'filename' => $filename,
             'contract_id' => $contract->id,
             ]);
             $file->move(public_path('docs'), $filename);
        }
     
        }
        
        return redirect('/contracts')->with('status', 'Data Success Change!');
      
    }
    public function ammend(Contract $contract)
    {
        //
        $contracts= Contract::with('doc')->get();
        $filename = $contract->doc;
        $clients= Client::all();
        return view('contracts.v_ammend', compact('contract', 'clients', 'filename'));
    }
    public function upammend(Request $request, Contract $contract)
    {
        //
        $request->validate([
          'name' => 'required',
          'client_id' => 'required',
          'cont_num' => 'required',
          'volume' => 'required',
          //'filename' => 'required',
          'sign_date' => 'required',
          'volume' => 'required',
          'unit' => 'required',
          'price' => 'required',
          'start_date' => 'required',
          'end_date' => 'required',
        
         ]);
        
         Contract::where('id', $contract->id)
                ->update([
                'name' => $request->name,
                'client_id' => $request->client_id,
                'cont_num' => $request->cont_num,
                'volume' => $request->volume,
                'unit' => $request->unit,
                'price' => $request->price,
                'sign_date' => $request->sign_date,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                ]);
        $contract->getOriginal();
        Contract_history::updateOrCreate(['cont_id' => $contract->getOriginal('id')], [
            'cont_id'=>$contract->getOriginal('id'),
            'name'=> $contract->getOriginal('name'),
            'cont_num' => $contract->getOriginal('cont_num'),
            'client_id' => $contract->getOriginal('client_id'),
            'volume' => $contract->getOriginal('volume'),
            'unit' => $contract->getOriginal('unit'),
            'price' => $contract->getOriginal('price'),
            'sign_date' => $contract->getOriginal('sign_date'),
            'start_date' => $contract->getOriginal('start_date'),
            'end_date' => $contract->getOriginal('end_date'),
            'created_at'=>$contract->getOriginal('created_at'),
            'updated_at'=> $contract->getOriginal('updated_at'),

    ]);        

        $files = $request->file('filename');
        if($files){
        foreach ($files as $file) {
             $filename = time().'.'.$file->getClientOriginalName();  
             Contract_doc::create([
            'filename' => $filename,
             'contract_id' => $contract->id,
             ]);
             $file->move(public_path('docs'), $filename);
        }
        
        }
         return redirect('/contracts')->with('status', 'Data Success Change!');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
        $docs= Contract_doc::all();

        foreach($docs as $doc){
            $contract_id= $doc->contract_id;
            $filenames= $doc->filename;
        if($contract->id==$contract_id){
            if(File::exists(public_path('docs/'.$filenames))){
                File::delete(public_path('docs/'.$filenames));           
                }
            }
        }
        Contract::destroy($contract->id);
        return redirect('/contracts')->with('status', 'Success Deleting Data!');
    }
    
     public function destroyDoc(Contract_doc $contract_doc)
    {

       // dd($contract_doc->id);
        $file = Contract_doc::find($contract_doc->id);
        $filename = $contract_doc->filename;
        if(File::exists(public_path('docs/'.$filename))){
            File::delete(public_path('docs/'.$filename));
        }
        Contract_doc::destroy($contract_doc->id);
        //return redirect('/contracts')->with('status', 'Success Deleting Data!');
    } 
}