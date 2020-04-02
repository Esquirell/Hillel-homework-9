<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Illuminate\Http\Request;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costs = Cost::all();
        return view('costs.index', compact('costs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('costs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'sum' => 'required',
                'source' => 'required',
                'comment' => 'required'
            ]);
            $cost = new Cost();
            $cost->sum = $request->get('sum');
            $cost->source = $request->get('source');
            $cost->comment = $request->get('comment');
            $cost->save();
            return redirect(route('costs.index'));
        } catch (\Exception $e) {
            return redirect(route('costs.create'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cost = Cost::findOrFail($id);
        return view('costs.show', compact('cost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cost = Cost::findOrFail($id);
        return view('costs.edit', compact('cost'));
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
        try {
            $this->validate($request, [
                'sum' => 'required',
                'source' => 'required',
                'comment' => 'required'
            ]);
            $cost = Cost::findOrFail($id);
            $cost->sum = $request->get('sum');
            $cost->source = $request->get('source');
            $cost->comment = $request->get('comment');
            $cost->save();
            return redirect(route('s.show', [cost=> $id]));
        } catch (\Exception $e) {
            return redirect(route('costs.edit', [cost=> $id]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cost = Cost::findOrFail($id);
        $cost->delete();
        return redirect(route('costs.index'));
    }
}
