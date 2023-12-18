<?php

namespace App\Http\Controllers\Voyager;

use App\Models\Tool;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::orderBy('created_at', 'desc')->get();

        foreach($packages as $package) {
            $included = json_decode($package->tools_included, true);
            
            if($included) {
                $processedIncludes = Tool::whereIn('id', $included)->get();

                $package['tools_included'] = $processedIncludes;
            }
        }

        return view("voyager::packages.index", compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tools = Tool::orderBy('created_at', 'desc')->get();

        return view("voyager::packages.create", compact('tools'));
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'tools_included' => 'required|array',
        ]);

        $package = new Package();
        $package->name = $request->name;
        $package->description = $request->description;
        $package->price = $request->price;
        $package->tools_included = json_encode($request->tools_included);

        $package->save();

        return redirect()->route('admin.packages.index');
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
        $package = Package::find($id);
        $tools = Tool::orderBy('created_at', 'desc')->get();

        return view("voyager::packages.edit", compact('package', 'tools'));
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'tools_included' => 'required|array',
        ]);

        $package = Package::find($id);
        $package->name = $request->name;
        $package->description = $request->description;
        $package->price = $request->price;
        $package->tools_included = json_encode($request->tools_included);

        $package->save();

        return redirect()->route('admin.packages.index');
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
