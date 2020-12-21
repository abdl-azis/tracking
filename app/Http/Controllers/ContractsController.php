<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Contract_history;
use App\Models\Contract_doc;
use File;
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
        $contracts= Contract::with('client')->simplePaginate(5);
        // $clients= Client::all();
        return view('contracts.v_list', compact('contracts'));
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
          'sign_date' => 'required',
          'filename' => 'required|mimes:pdf,xlx,csv,doc,docx',
          ]);

        if($request->file()){
        $filename = time().'.'.$request->filename->getClientOriginalName();  
        $contract = Contract::create($request->all());
        Contract_doc::create([
        'filename' => $filename,
        'contract_id' => $contract->id,
        ]);
        $request->filename->move(public_path('docs'), $filename);
        }
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
        $filename = Contract_doc::all();
        $clients= Client::all();
        return view('contracts.v_edit', compact('contract', 'clients', 'filename'));
    }
    public function ammend(Contract $contract)
    {
        //
        $contracts= Contract::with('doc')->get();
        $filename = Contract_doc::all();
        $clients= Client::all();
        return view('contracts.v_ammend', compact('contract', 'clients', 'filename'));
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
    
        
        $docada = $request->file();
        $docs= Contract_doc::all();
        
        
         foreach($docs as $doc){
         if($doc->filename==$contract->doc->filename){
         
          $contract_id= $doc->contract_id;
          $filename= $doc->filename;
            }
        }
         if($docada){
          File::delete(public_path('docs/'.$filename));
          $filename = time().'.'.$request->filename->getClientOriginalName();
          $request->filename->move(public_path('docs'), $filename);
         }

        $form_data = array(
        'filename' => $filename,
        'contract_id' => $contract->id,
        );
        Contract_doc::where('contract_id', $contract->id)->update($form_data);
        return redirect('/contracts')->with('status', 'Data Success Change!');
      
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
        $docada = $request->file();
        $docs= Contract_doc::all();
        
         foreach($docs as $doc){
         if($doc->filename==$contract->doc->filename){
         
          $contract_id= $doc->contract_id;
          $filename= $doc->filename;
            }
        }
         if($docada){
          File::delete(public_path('docs/'.$filename));
          $filename = time().'.'.$request->filename->getClientOriginalName();
          $request->filename->move(public_path('docs'), $filename);
         }

        $form_data = array(
        'filename' => $filename,
        'contract_id' => $contract->id,
        );
        Contract_doc::where('contract_id', $contract->id)->update($form_data);
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
            $filename= $doc->filename;
        }
        if($contract->id==$contract_id){
            if(File::exists(public_path('docs/'.$filename))){
                File::delete(public_path('docs/'.$filename));           
            }
        }
        Contract::destroy($contract->id);
        return redirect('/contracts')->with('status', 'Success Deleting Data!');
    }
}