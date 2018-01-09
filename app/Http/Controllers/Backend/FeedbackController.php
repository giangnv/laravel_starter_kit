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
        $status = $request->get('status');
        $range = $request->get('range');
        $operator = $request->get('operator');
        $id = $request->get('id');
        $perPage = 25;

        if (!is_null($status) || !is_null($keyword) || !is_null($range)
            || (!is_null($operator) && !is_null($id))
            ) {
            $feedback = new Feedback;

            if (!is_null($status)) {
                $feedback = $feedback->where('status', '=', $status);
            }
            
            if (!is_null($keyword)) {
                $feedback = $feedback->where(function ($q) use ($keyword){
                        return $q->where('email', 'LIKE', "%$keyword%")
                            ->orWhere('note', 'LIKE', "%$keyword%")
                            ->orWhere('fb', 'LIKE', "%$keyword%");
                    });
            }

            if (!is_null($range)) {
                $rangeArr = explode(' - ', $range);
                $rangeArr[0] = $rangeArr[0]. ' 00:00:00';
                $rangeArr[1] = $rangeArr[1]. ' 23:59:59';
                $feedback = $feedback->whereBetween('create_time', $rangeArr);
            }
            
            if (!is_null($operator) && !is_null($id)) {
                $feedback = $feedback->where('id', $operator, $id);
            }

            $feedback = $feedback->orderBy('id', 'desc')->paginate($perPage);
        } else {
            $feedback = Feedback::orderBy('id', 'desc')->paginate($perPage);
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
