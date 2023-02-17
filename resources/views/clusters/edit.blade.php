@extends('layouts.app')

@section('title', __('Edit Clusters'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header" style="margin-top: 5px">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ __('Clusters') }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('clusters.index') }}">{{ __('Clusters') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('Edit') }}
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
                        <form action="{{ route('clusters.update', $cluster->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        @include('clusters.include.form')
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-dark" role="alert">
                                            Data Setting Device Alert Tollerance
                                        </div>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Field</th>
                                                    <th scope="col">Min</th>
                                                    <th scope="col"> Max</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tolerance as $i => $tolerance)
                                                    <tr>
                                                        <td>
                                                            <input type="hidden" name="tolerance_id[]"
                                                                value="{{ $tolerance->id }}">
                                                            <input type="text" required class="form-control"
                                                                name="field_data[]" readonly
                                                                value="{{ $tolerance->field_data }}">
                                                            @error('field_data.0')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="number" required step="any"
                                                                class="form-control" name="min_tolerance[]"
                                                                value="{{ $tolerance->min_tolerance }}">
                                                            @error('min_tolerance.0')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="number" required step="any"
                                                                class="form-control" name="max_tolerance[]"
                                                                value="{{ $tolerance->max_tolerance }}">
                                                            @error('max_tolerance.0')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                                        <div class="form-group mt-3">
                                            <a href="{{ url()->previous() }}"
                                                class="btn btn-secondary">{{ __('Back') }}</a>
                                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
