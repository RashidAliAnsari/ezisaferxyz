<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class TestController extends Controller
{

    public function clearCache()
    {
        \Artisan::call('config:clear');
        \Artisan::call('config:cache');
        \Artisan::call('route:clear');
        \Artisan::call('route:cache');
        \Artisan::call('view:clear');
        \Artisan::call('view:cache');
        \Artisan::call('event:clear');
        \Artisan::call('event:cache');
        \Artisan::call('cache:clear');
        \Artisan::call('optimize:clear');
        return 'clear and cached!';
    }

    public function migrate()
    {
        \Artisan::call('migrate', [
            '--force' => true
        ]);
        \Artisan::call('tenants:migrate', [
            '--force' => true
        ]);
        return 'central & tenant migrate done!';
    }

    public function migrateFresh()
    {
        // \Artisan::call('migrate:fresh');
        \Artisan::call('migrate:fresh', [
            '--force' => true
        ]);
        return 'migrate fresh done!';
    }

    public function dbSeed(){
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        User::where('email', 'super.admin@ezisafer.xyz')->delete();
        
        \Artisan::call('db:seed', [
            '--force' => true
        ]);

        // \Artisan::call('db:seed --class=CreateLanguages', [
        //     '--force' => true
        // ]);

        $superAdmin = User::create([
            'name' => 'Mohammad Asri',
            'email' => 'super.admin@ezisafer.xyz',
            'password' => Hash::make('ezisaferInProgress'),
            'verification_code' => Str::random(30)
        ]);

        $roleId = Role::where('slug', 'super-admin')->pluck('id');
        $superAdmin->roles()->attach($roleId);

        return 'Database seeder done!';
    }

    public function createTenant()
    {
        $tenant1 = Tenant::create();
        // $tenant1->domains()->create(['domain' => 'foo.ezisafer.xyz']);
        $tenant1->domains()->create(['domain' => 'foo.ezisafer.test']);

        $tenant2 = Tenant::create();
        // $tenant2->domains()->create(['domain' => 'bar.ezisafer.xyz']);
        $tenant2->domains()->create(['domain' => 'bar.ezisafer.test']);

        $tenant3 = Tenant::create();
        $tenant2->domains()->create(['domain' => 'techos.ezisafer.test']);

        Tenant::all()->runForEach(function () {
            User::factory()->create();
        });

        return 'tenants created';
    }

    public function test()
    {
        return 'test';
    }
}
