<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
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
            $feedback = Feedback::where('email', 'LIKE', "%$keyword%")
                ->orWhere('fb', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('create_time', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $feedback = Feedback::paginate($perPage);
        }

        $listStatus = Feedback::getListStatus();

        return view('backend.feedback.index', compact('feedback', 'listStatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view('backend.feedback.create');
        return abort(404);
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
			'email' => 'required'
		]);
        $requestData = $request->all();
        
        Feedback::create($requestData);

        return redirect('admin/feedback')->with('flash_message', 'Feedback added!');
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
        $feedback = Feedback::findOrFail($id);

        return view('backend.feedback.show', compact('feedback'));
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
        $feedback = Feedback::findOrFail($id);
        $listStatus = Feedback::getListStatus();

        return view('backend.feedback.edit', compact('feedback', 'listStatus'));
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
			'email' => 'required'
		]);
        $requestData = $request->all();
        
        $feedback = Feedback::findOrFail($id);
        $feedback->update($requestData);

        $url = $request->only('redirects_to');
        return redirect()->to($url['redirects_to'])->with('flash_message', 'Feedback updated!');
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
        Feedback::destroy($id);

        return redirect('admin/feedback')->with('flash_message', 'Feedback deleted!');
    }
}
