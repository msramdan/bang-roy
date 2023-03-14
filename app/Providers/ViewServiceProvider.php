<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['users.create', 'users.edit'], function ($view) {
            return $view->with(
                'roles',
                Role::select('id', 'name')->get()
            );
        });


        View::composer(['tickets.create', 'tickets.edit', 'parseds.create', 'parseds.edit'], function ($view) {
            return $view->with(
                'devices',
                \App\Models\Device::select('id', 'dev_eui')->get()
            );
        });

        View::composer(['parseds.create', 'parseds.edit'], function ($view) {
            return $view->with(
                'rawdatas',
                \App\Models\Rawdata::select('id', 'dev_eui')->get()
            );
        });

        View::composer(['instances.create', 'instances.edit', 'kabkots.create', 'kabkots.edit'], function ($view) {
            return $view->with(
                'provinces',
                \App\Models\Province::select('id', 'provinsi')->get()
            );
        });

        View::composer(['instances.create', 'instances.edit', 'kecamatans.create', 'kecamatans.edit'], function ($view) {
            return $view->with(
                'kabkots',
                \App\Models\Kabkot::select('id', 'kabupaten_kota')->get()
            );
        });

        View::composer(['instances.create', 'instances.edit', 'kelurahans.create', 'kelurahans.edit'], function ($view) {
            return $view->with(
                'kecamatans',
                \App\Models\Kecamatan::select('id', 'kecamatan')->get()
            );
        });

        View::composer(['instances.edit'], function ($view) {
            return $view->with(
                'kelurahans',
                \App\Models\Kelurahan::select('id', 'kelurahan')->get()
            );
        });

        View::composer(['maintenances.create', 'maintenances.edit'], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

        View::composer(['clusters.create', 'clusters.edit', 'devices.create', 'devices.edit', 'maintenances.create', 'maintenances.edit', 'devices.*'], function ($view) {
            return $view->with(
                'instances',
                \App\Models\Instance::select('id', 'instance_name')->get()
            );
        });

        View::composer(['devices.create', 'devices.edit'], function ($view) {
            return $view->with(
                'subnets',
                \App\Models\Subnet::select('id', 'subnet')->get()
            );
        });

        View::composer(['devices.create', 'devices.edit'], function ($view) {
            return $view->with(
                'clusters',
                \App\Models\Cluster::select('id', 'cluster_name', 'cluster_kode')->get()
            );
        });


        View::composer(['latest-datas.create', 'latest-datas.edit'], function ($view) {
            return $view->with(
                'devices',
                \App\Models\Device::select('id', 'dev_eui')->get()
            );
        });

        View::composer(['latest-datas.create', 'latest-datas.edit'], function ($view) {
            return $view->with(
                'rawdatas',
                \App\Models\Rawdata::select('id', 'dev_eui')->get()
            );
        });
    }
}
