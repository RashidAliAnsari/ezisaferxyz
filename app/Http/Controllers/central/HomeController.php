<?php

namespace App\Http\Controllers\central;

use session;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use DataTables;

class HomeController extends Controller
{
    protected $adminService;
    
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }
    
    public function home(){
        return view('central.backend.home');
    }
    
    public function showAllAgencies(Request $request)
    {
        $agencies = $this->adminService->getAllAgencies();
        return view('central.backend.users.agencies', compact('agencies'));
        
        // if ($request->ajax()) {
        //     return Datatables::of($agencies)
        //     ->addIndexColumn()
        //     ->addColumn('action', function($row){
        //         $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
        //         return $actionBtn;
        //     })
        //     ->rawColumns(['action'])
        //     ->make(true);
        // }
        // return view('central.backend.users.agencies');
    }
    
    public function AgencyProfile($tenantId)
    {
        $AgencyProfile = $this->adminService->AgencyProfile($tenantId);
        return view('central.backend.users.AgencyProfile', compact('AgencyProfile'));
    }
    
    public function AgencyApprove($tenantId, $status)
    {
        $result = $this->adminService->ApproveDeclineTenant($tenantId, $status);
        $this->realRashidToast($result['message'], $result['type']);
        return redirect()->route('admin.agencies.show');
    }

    // multilingual - translations
    public function getAllLanguages()
    {
        $result = $this->adminService->languages();
        $languages = $result['languages'];
        $columns = $result['columns'];
        $columnsCount = $result['columnsCount'];
        return view('central.backend.languages.languages', compact('languages','columns','columnsCount'));
    }

    public function storeTranslation(Request $request)
    {
        $request->validate([
		    'key' => 'required',
		    'value_en' => 'required',
		    'value_ms' => 'required',
		]);

		$data = $this->adminService->openJSONFile('en');
        $data[$request->key] = $request->value_en;
        $this->adminService->saveJSONFile('en', $data);
		
        $data = $this->adminService->openJSONFile('ms');
        $data[$request->key] = $request->value_ms;
        $this->adminService->saveJSONFile('ms', $data);

        $this->realRashidToast('Your Translation saved successfully!', 'success');
        return back();
    }

    public function destroyTranslation($key)
    {
        $this->adminService->destroyTranslation($key);
        // $this->realRashidToast('Your Translation deleted successfully!', 'success');
        // return back();
        return response()->json(['success' => $key]);
    }

    public function transUpdate(Request $request)
    {
        $this->adminService->transUpdate($request);
        return response()->json(['success'=>'Done!']);
    }

    public function transUpdateKey(Request $request)
    {
        $this->adminService->transUpdateKey($request);
        return response()->json(['success'=>'Done!']);
    }
    
    
}
