@extends('layouts.app')

@section('title', __('Detail of Parseds'))

@section('content')
        <div class="page-body">
                <div class="container-fluid">
                    <div class="page-header" style="margin-top: 5px">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>{{ __('Parseds') }}</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('parseds.index') }}">{{ __('Parseds') }}</a>
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
                                        <table class="table table-hover table-striped">
                                            <tr>
                                        <td class="fw-bold">{{ __('Device') }}</td>
                                        <td>{{ $parsed->device ? $parsed->device->dev_eui : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Rawdata') }}</td>
                                        <td>{{ $parsed->rawdata ? $parsed->rawdata->dev_eui : '' }}</td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Frame Id') }}</td>
                                            <td>{{ $parsed->frame_id }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Temperature') }}</td>
                                            <td>{{ $parsed->temperature }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Humidity') }}</td>
                                            <td>{{ $parsed->humidity }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Period') }}</td>
                                            <td>{{ $parsed->period }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Rssi') }}</td>
                                            <td>{{ $parsed->rssi }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Snr') }}</td>
                                            <td>{{ $parsed->snr }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Battery') }}</td>
                                            <td>{{ $parsed->battery }}</td>
                                        </tr>
                                            <tr>
                                                <td class="fw-bold">{{ __('Created at') }}</td>
                                                <td>{{ $parsed->created_at->format('d/m/Y H:i') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">{{ __('Updated at') }}</td>
                                                <td>{{ $parsed->updated_at->format('d/m/Y H:i') }}</td>
                                            </tr>
                                        </table>
                                    </div>

                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
@endsection
