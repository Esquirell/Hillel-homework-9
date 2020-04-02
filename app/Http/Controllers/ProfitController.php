<?php

namespace App\Http\Controllers;

use App\Models\Profit;
use Illuminate\Http\Request;

class ProfitController extends Controller
{

    public function index()
    {
        $profits = Profit::all();
        return view('profits.index', compact('profits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profits.create');
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
            $profit = new Profit();
            $profit->sum = $request->get('sum');
            $profit->source = $request->get('source');
            $profit->comment = $request->get('comment');
            $profit->save();
            return redirect(route('profits.index'));
        } catch (\Exception $e) {
            return redirect(route('profits.create'));
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
        $profit = Profit::findOrFail($id);
        return view('profits.show', compact('profit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profit = Profit::findOrFail($id);
        return view('profits.edit', compact('profit'));
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
            $profit = Profit::findOrFail($id);
            $profit->sum = $request->get('sum');
            $profit->source = $request->get('source');
            $profit->comment = $request->get('comment');
            $profit->save();
            return redirect(route('profits.show', ['profit'=> $id]));
        } catch (\Exception $e) {
            return redirect(route('profits.edit', ['profit'=> $id]));
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
        $profit = Profit::findOrFail($id);
        $profit->delete();
        return redirect(route('profits.index'));
    }
}
