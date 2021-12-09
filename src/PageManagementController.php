<?php

// namespace App\Http\Controllers;
namespace ComminicationCraft\Pagemanagement;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use ComminicationCraft\Pagemanagement\Page;

class PageManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $name = $request->input('name');
        $status = $request->input('status');

        // $data = Page::orderBy('created_at', 'desc');
        $data = Page::sortable();
        if (isset($name)) {
            $data = $data->where("name", 'like', '%' . $name . '%');
        }
        if (isset($status)) {
            $data = $data->where("status", $status);
        }

        $data = $data->paginate(3);
       // dd($data);
        if (isset($status)) {
            $data = $data->withPath('/page?status=' . $status);
        }
        if (isset($name)) {
            $data = $data->withPath('/page?name=' . $name);
        }
    
        return view('pageManagemnet-package::page-index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pageManagemnet-package::page-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd("hii");

        $request->validate([
            'name' => 'required|max:255|unique:pages',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',

        ]);
        $data = [
            'name' => ucfirst($request->input('name')),
            'title' => ucfirst($request->input('title')),
            'description' => ucfirst($request->input('description')),
            'status' => $request->input('status'),
            'uri' => $request->input('uri'),
        ];

        $insert = Page::create($data);
        return redirect('page')->with('success', 'Page added successfully.');
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
        $data = Page::where('id', $id)->get();

        return view('pageManagemnet-package::page-view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Page::where('id', $id)->get();

        return view('pageManagemnet-package::page-update', compact('data'));
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
        //
        $page = Page::find($id);
        $request->validate([
            'name' => 'required|max:255|unique:pages,name,' . $page->id . 'id',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',

        ]);
        $data = [
            'name' => ucfirst($request->input('name')),
            'title' => ucfirst($request->input('title')),
            'description' => ucfirst($request->input('description')),
            'status' => $request->input('status'),
            'uri' => $request->input('uri'),
        ];


        $page->update($data);
        return redirect('page')->with('success', 'Page updated successfully.');
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

        $data = Page::find($id);

        $data->delete();
        return redirect('page')->with('success', 'Page deleted successfully.');
    }
}
