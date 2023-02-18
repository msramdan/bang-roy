@extends('layouts.app')

@section('title', __('Detail of Devices'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header" style="margin-top: 5px">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ __('Devices') }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('devices.index') }}">{{ __('Devices') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('Detail') }}
                            </li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <tr>
                                        <td class="fw-bold">{{ __('Dev Eui') }}</td>
                                        <td>{{ $device->dev_eui }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Dev Name') }}</td>
                                        <td>{{ $device->dev_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Dev Addr') }}</td>
                                        <td>{{ $device->dev_addr }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Dev Type') }}</td>
                                        <td>{{ $device->dev_type }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Region') }}</td>
                                        <td>{{ $device->region }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Subnet') }}</td>
                                        <td>{{ $device->subnet ? $device->subnet->subnet : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Auth Type') }}</td>
                                        <td>{{ $device->auth_type }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="fw-bold">{{ __('Fcnt') }}</td>
                                        <td>{{ $device->fcnt }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Fport') }}</td>
                                        <td>{{ $device->fport }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Last Seen') }}</td>
                                        <td>{{ $device->last_seen }}</td>
                                    </tr> --}}
                                    <tr>
                                        <td class="fw-bold">{{ __('Branches') }}</td>
                                        <td>{{ $device->instance ? $device->instance->instance_name : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('App Eui') }}</td>
                                        <td>{{ $device->app_eui }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('App Key') }}</td>
                                        <td>{{ $device->app_key }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('App SKey') }}</td>
                                        <td>{{ $device->app_s_key }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Nwk SKey') }}</td>
                                        <td>{{ $device->nwk_s_key }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Support Class B') }}</td>
                                        <td>{{ $device->support_class_b == '1' ? 'false' : 'true' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Support Class C') }}</td>
                                        <td>{{ $device->support_class_c == '1' ? 'false' : 'true' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Mac Version') }}</td>
                                        <td>{{ $device->mac_version }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Cluster') }}</td>
                                        <td>{{ $device->cluster ? $device->cluster->cluster_name : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $device->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $device->updated_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                </table>
                            </div> <br>

                            <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
