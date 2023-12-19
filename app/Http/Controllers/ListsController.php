<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreListsRequest;
use App\Http\Requests\UpdateListsRequest;
use App\Models\Lists;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Auth::user()->lists()->get();
        return view('lists.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListsRequest $request)
    {
        $lists = Auth::user()->lists();
        $lists->create($request->validated());
        return redirect()->route('lists.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get the list without authorization
        $list = Lists::findOrFail($id);
        
        //$lists = Auth::user()->lists()->find($id);
        return view('lists.show', compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lists = Auth::user()->lists()->find($id);
        return view('lists.edit', compact('lists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateListsRequest $request, $id)
    {
        $lists = Auth::user()->lists()->find($id);
        $lists->update($request->validated());
        return redirect()-> route('lists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lists =Auth::user()->lists()->find($id); 
        $lists->delete();
        return redirect()-> route('lists.index');
    }

}
