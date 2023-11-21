@extends('layouts.app')

@section('title', __('Detail of Products'))

@section('content')
        <div class="page-body">
                <div class="container-fluid">
                    <div class="page-header" style="margin-top: 5px">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>{{ __('Products') }}</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('products.index') }}">{{ __('Products') }}</a>
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
                                            <td class="fw-bold">{{ __('Nama') }}</td>
                                            <td>{{ $product->nama }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Harga') }}</td>
                                            <td>{{ $product->harga }}</td>
                                        </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Photo') }}</td>
                                        <td>
                                            @if ($product->photo == null)
                                            <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Photo"  class="rounded" width="200" height="150" style="object-fit: cover">
                                            @else
                                                <img src="{{ asset('storage/uploads/photos/' . $product->photo) }}" alt="Photo" class="rounded" width="200" height="150" style="object-fit: cover">
                                            @endif
                                        </td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Keterangan') }}</td>
                                            <td>{{ $product->keterangan }}</td>
                                        </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Categoryproduct') }}</td>
                                        <td>{{ $product->categoryproduct ? $product->categoryproduct->category_name : '' }}</td>
                                    </tr>
                                            <tr>
                                                <td class="fw-bold">{{ __('Created at') }}</td>
                                                <td>{{ $product->created_at->format('d/m/Y H:i') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">{{ __('Updated at') }}</td>
                                                <td>{{ $product->updated_at->format('d/m/Y H:i') }}</td>
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
