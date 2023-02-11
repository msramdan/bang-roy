@extends('layouts.app')

@section('title', __('Create Devices'))

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
                                {{ __('Create') }}
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
                            <form action="{{ route('devices.store') }}" method="POST">
                                @csrf
                                @method('POST')

                                @include('devices.include.form')

                                <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>

                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        const options_temp = '<option value="" selected disabled>-- Select --</option>';

        $('#instance-id').change(function() {
            $('#cluster-id').html(options_temp);
            if ($(this).val() != "") {
                getCluster($(this).val());
            }
            // onValidation('provinsi')
        })

        function getCluster(cluster_id) {
            let url = '{{ route('api.cluster', ':id') }}';
            url = url.replace(':id', cluster_id)
            $.ajax({
                url,
                method: 'GET',
                beforeSend: function() {
                    $('#cluster-id').prop('disabled', true);
                },
                success: function(res) {
                    const options = res.data.map(value => {
                        return `<option value="${value.id}">${value.cluster_name}</option>`
                    });
                    $('#cluster-id').html(options_temp + options)
                    $('#cluster-id').prop('disabled', false);
                },
                error: function(err) {
                    $('#cluster-id').prop('disabled', false);
                    alert(JSON.stringify(err))
                }

            })
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#div-dev-addr').hide();
            $('#dev-app-s-key').hide();
            $('#div-nwk-s-key').hide();
            $('#dev-mac-version').hide();
        });

        $(function() {
            $('#dev-type').change(function() {
                if (this.value == 'abp-type') {
                    $('#div-dev-addr').show();
                    $('#dev-app-s-key').show();
                    $('#div-nwk-s-key').show();
                    $('#dev-mac-version').hide();
                    $('#dev-addr').attr("required", true);
                    $('#app-s-key').attr("required", true);
                    $('#nwk-s-key').attr("required", true);
                    $('#mac-version').removeAttr('required');
                    $('#auth-type').val('abp');
                } else {
                    $('#div-dev-addr').hide();
                    $('#dev-app-s-key').hide();
                    $('#div-nwk-s-key').hide();
                    $('#dev-mac-version').show();
                    $('#dev-addr').removeAttr('required');
                    $('#app-s-key').removeAttr('required');
                    $('#nwk-s-key').removeAttr('required');
                    $('#mac-version').attr("required", true);
                    $('#auth-type').val('otaa');
                }
            });
        });
    </script>
@endpush
