<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CompanyParse;
use Illuminate\Http\Request;

use Ixudra\Curl\Facades\Curl;

class CompanyParseController extends Controller
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
            $companyparse = CompanyParse::where('name', 'LIKE', "%$keyword%")
                ->orWhere('bank', 'LIKE', "%$keyword%")
                ->orWhere('birthday', 'LIKE', "%$keyword%")
                ->orWhere('business_content', 'LIKE', "%$keyword%")
                ->orWhere('ceo', 'LIKE', "%$keyword%")
                ->orWhere('company_size', 'LIKE', "%$keyword%")
                ->orWhere('corporate_position', 'LIKE', "%$keyword%")
                ->orWhere('corporate_type', 'LIKE', "%$keyword%")
                ->orWhere('empire_code', 'LIKE', "%$keyword%")
                ->orWhere('employee_no', 'LIKE', "%$keyword%")
                ->orWhere('eng_name', 'LIKE', "%$keyword%")
                ->orWhere('fax', 'LIKE', "%$keyword%")
                ->orWhere('industry', 'LIKE', "%$keyword%")
                ->orWhere('market_code', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('share_type', 'LIKE', "%$keyword%")
                ->orWhere('tax_period', 'LIKE', "%$keyword%")
                ->orWhere('tse_code', 'LIKE', "%$keyword%")
                ->orWhere('url', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $companyparse = CompanyParse::paginate($perPage);
        }

        return view('backend.company-parse.index', compact('companyparse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backend.company-parse.create');
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
			'name' => 'required|max:60'
		]);
        $requestData = $request->all();
        
        CompanyParse::create($requestData);

        return redirect('admin/company-parse')->with('flash_message', 'Company added!');
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
        $companyparse = CompanyParse::findOrFail($id);

        return view('backend.company-parse.show', compact('companyparse'));
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
        $companyparse = CompanyParse::findOrFail($id);

        return view('backend.company-parse.edit', compact('companyparse'));
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
			'name' => 'required|max:60'
		]);
        $requestData = $request->all();
        
        $companyparse = CompanyParse::findOrFail($id);
        $companyparse->update($requestData);

        return redirect('admin/company-parse')->with('flash_message', 'Company updated!');
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
        CompanyParse::destroy($id);

        return redirect('admin/company-parse')->with('flash_message', 'Company deleted!');
    }

    public function parse(Request $request)
    {
        $url = $request->input('url');
        $response = Curl::to(config('settings.company_parse_api_host'))
            ->withData(
                [
                    'url' => $url
                ]
            )
            ->get();

        return response()->json([
            'status' => 200,
            'success' => 1,
            'result' => json_decode($response)
        ]);
    }
}
