<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Dictionary;
use Illuminate\Http\Request;

use Event;
use App\Events\DictionaryCreate;
use App\Events\DictionaryUpdate;
use App\Events\DictionaryDelete;

class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $dictionary = Dictionary::where('app_id', 'LIKE', "%$keyword%")
                ->orWhere('surface', 'LIKE', "%$keyword%")
                ->orWhere('value', 'LIKE', "%$keyword%")
                ->orWhere('cat_name', 'LIKE', "%$keyword%")
                ->orWhere('value_type', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $dictionary = Dictionary::paginate($perPage);
        }

        return view('backend.dictionary.index', compact('dictionary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backend.dictionary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'app_id' => 'required'
		]);
        $requestData = $request->all();
        
        $dictionary = Dictionary::create($requestData);

        event(new DictionaryCreate($dictionary));
        return redirect('admin/dictionary')->with('flash_message', 'Dictionary added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $dictionary = Dictionary::findOrFail($id);

        return view('backend.dictionary.show', compact('dictionary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $dictionary = Dictionary::findOrFail($id);

        return view('backend.dictionary.edit', compact('dictionary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'app_id' => 'required'
		]);
        $requestData = $request->all();
        
        $dictionary = Dictionary::findOrFail($id);
        $dictionary->update($requestData);

        event(new DictionaryUpdate($dictionary));
        return redirect('admin/dictionary')->with('flash_message', 'Dictionary updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $dictionary = Dictionary::findOrFail($id);
        Dictionary::destroy($id);

        event(new DictionaryUpdate($dictionary));
        return redirect('admin/dictionary')->with('flash_message', 'Dictionary deleted!');
    }
}
