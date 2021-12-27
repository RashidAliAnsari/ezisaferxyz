<?php 

namespace App\Services;

use File;
use App\Models\User;
use App\Models\Tenant;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminService
{
    
    private function initilizeSingleTenant($tenantId)
    {
        $tenant = Tenant::with('domains:domain,tenant_id')->where('id', $tenantId)->first();
        tenancy()->initialize($tenant);
        return $tenant;
    }
    
    public function getAllAgencies()
    {
        $users = collect();
        $tenants = Tenant::with('domains:domain,tenant_id')->get();
        
        foreach ($tenants as $key => $tenant) {
            tenancy()->initialize($tenant);
            $tenantUser = User::whereNotNull('agency_name')->first();
            $tenantUser->tenant = $tenant;
            $users->push($tenantUser);
        }
        return $users;
    }
    
    public function AgencyProfile($tenantId)
    {
        $tenant = $this->initilizeSingleTenant($tenantId);
        $tenantUser = User::whereNotNull('agency_name')->first();
        $tenantUser->tenant = $tenant;
        return $tenantUser;
    }
    
    public function ApproveDeclineTenant($tenantId, $status)
    {
        $this->initilizeSingleTenant($tenantId);
        if ($status == 0) {
            User::whereNotNull('agency_name')->update(['is_approved' => 0]);
            return array('type' => 'warning', 'message' => 'Your Agency has ben declined successfully.');
        }
        if ($status == 1) {
            User::whereNotNull('agency_name')->update(['is_approved' => 1]);
            return array('type' => 'success', 'message' => 'Your Agency has ben approved successfully.');
        }
        
    }
    
    public function openJSONFile($code)
    {
        $jsonString = [];
        if(File::exists(base_path('resources/lang/'.$code.'.json'))){
            $jsonString = file_get_contents(base_path('resources/lang/'.$code.'.json'));
            $jsonString = json_decode($jsonString, true);
        }
        return $jsonString;
    }

    public function saveJSONFile($code, $data){
        ksort($data);
        $jsonData = json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        file_put_contents(base_path('resources/lang/'.$code.'.json'), stripslashes($jsonData));
    }
    
    public function languages()
    {
        // $languages = DB::table('languages')->get();
        $languages = Language::all();
        $columns = [];
        $columnsCount = $languages->count();
        
        if($languages->count() > 0){
            foreach ($languages as $key => $language){
                if ($key == 0) {
                    $columns[$key] = $this->openJSONFile($language->code);
                }
                $columns[++$key] = ['data'=>$this->openJSONFile($language->code), 'lang'=>$language->code];
            }
        }
        
        $result = ['languages' => $languages, 'columns' => $columns, 'columnsCount' => $columnsCount];
        return $result;
        
    }

    public function destroyTranslation($key)
    {
        $languages = DB::table('languages')->get();
        if($languages->count() > 0){
            foreach ($languages as $language){
                $data = $this->openJSONFile($language->code);
                unset($data[$key]);
                $this->saveJSONFile($language->code, $data);
            }
        }
    }

    // public function transUpdate(Request $request)
    // {
    //     $data = $this->openJSONFile($request->code);
    //     $data[$request->pk] = $request->value;

    //     $this->saveJSONFile($request->code, $data);
    // }

    public function transUpdate($form)
    {
        $data = $this->openJSONFile('en');
        $data[$form['key']] = $form['value_en'];
        $this->saveJSONFile('en', $data);

        $data = $this->openJSONFile('ms');
        $data[$form['key']] = $form['value_ms'];
        $this->saveJSONFile('ms', $data);

    }

    // public function transUpdateKey(Request $request)
    // {
    //     $languages = DB::table('languages')->get();
    //     if($languages->count() > 0){
    //         foreach ($languages as $language){
    //             $data = $this->openJSONFile($language->code);
    //             if (isset($data[$request->pk])){
    //                 $data[$request->value] = $data[$request->pk];
    //                 unset($data[$request->pk]);
    //                 $this->saveJSONFile($language->code, $data);
    //             }
    //         }
    //     }
    // }

    public function transUpdateKey($preKey, $updatedKey)
    {
        $languages = DB::table('languages')->get();
        if($languages->count() > 0){
            foreach ($languages as $language){
                $data = $this->openJSONFile($language->code);
                if (isset($data[$preKey])){
                    $data[$updatedKey] = $data[$preKey];
                    unset($data[$preKey]);
                    $this->saveJSONFile($language->code, $data);
                }
            }
        }
    }

    public function transEditValuesAgainstSingleKey($updateKey)   // added later
    {
        $record = [];
        $languages = Language::all();
            foreach ($languages as $key => $language){
                $data = $this->openJSONFile($language->code);
                $record[$language->code] = $data[$updateKey];
            }

        return $record;
    }
    
    
}