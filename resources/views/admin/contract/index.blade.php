@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles" style="z-index: 0">
            @can('permission_create')
                <div class="col p-0">
                    <a class="btn btn-success" href="{{ route("admin.contract.create") }}">
                        {{ trans('global.add') }} Contract
                    </a>
                </div>
            @endcan
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Contract</a>
                    </li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title row">
                            <div class="col-sm-6">
                                Export Contract
                            </div>
                        </h4>
                        <form method="post" action="{{url('admin/contract/export')}} ">
                            @csrf
                            <div class="form-group">
                                <label class="contract-no">No Kontrak</label>
                                <select name="contract_number[]" class="form-control js-example-basic-select2"
                                        multiple="multiple" id="contract_number">
                                    @foreach($contract as $contracts)
                                        <option value="{{$contracts->id}}">{{$contracts->contract_number}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                                <label for="start_date">Start Date</label>
                                <input type="text" id="start_date" name="start_date" class="form-control date"
                                       value="{{ old('start_date', '') }}">
                                @if($errors->has('start_date'))
                                    <p class="help-block">
                                        {{ $errors->first('start_date') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}">
                                <label for="start_date">End Date</label>
                                <input type="text" id="end_date" name="end_date" class="form-control date"
                                       value="{{ old('end_date', '') }}">
                                @if($errors->has('end_date'))
                                    <p class="help-block">
                                        {{ $errors->first('end_date') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>
                            <div class="form-group">
                                <label>Format</label>
                                <select class="form-control" name="formatData">
                                    <option value="xlsx">Excel</option>
                                    <option value="pdf">Pdf</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary exportData">Export Data</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title row">
                            <div class="col-sm-6">
                                Contract {{ trans('global.list') }}
                            </div>
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th width="10">
                                        No.
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    @can('contract_number_show')
                                        <th>
                                            Nomor Kontrak
                                        </th>
                                    @endcan
                                    @can('start_date_show')
                                        <th>
                                            &nbsp;Tanggal Dimulai
                                        </th>
                                    @endcan
                                    @can('end_date_show')
                                        <th>
                                            &nbsp;Tanggal Berakhir
                                        </th>
                                    @endcan
                                    @can('work_unit_show')
                                        <th>
                                            Satuan Kerja
                                        </th>
                                    @endcan
                                    @can('cpcl_show')
                                        <th>
                                            &nbsp;CPCL
                                        </th>
                                    @endcan
                                    @can('item_position_show')
                                        <th>
                                            &nbsp;Posisi Barang
                                        </th>
                                    @endcan
                                    @can('quality_test_show')
                                        <th>
                                            &nbsp;Uji Mutu
                                        </th>
                                    @endcan
                                    @can('item_receive_show')
                                        <th>
                                            &nbsp;Barang Sudah Diterima
                                        </th>
                                    @endcan
                                    @can('contract_value_show')
                                        <th>
                                            &nbsp;Nilai Kontrak
                                        </th>
                                    @endcan
                                    @can('tax_show')

                                        <th>
                                            &nbsp;Pajak
                                        </th>
                                    @endcan
                                    @can('real_value_show')
                                        <th>
                                            &nbsp;Nilai Real Yang Diterima
                                        </th>
                                    @endcan
                                    @can('billing_progress_show')
                                        <th>
                                            &nbsp;Proses Penagihan
                                        </th>
                                    @endcan
                                    <th>
                                        User Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contract as $key => $contracts)
                                    <tr data-entry-id="{{ $contracts->id }}">
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            @if($contracts->status == 1)
                                                Finished
                                            @else
                                                <button type="submit" class="btn btn-info btn-sm sweet-confirm"
                                                        data-id="{{$contracts->id}}"
                                                        data-name="{{ $contracts->contract_number ?? '' }}">Finish
                                                    Contract
                                                </button>
                                            @endif
                                        </td>
                                        @can('contract_number_show')
                                            <td>
                                                {{ $contracts->contract_number ?? '' }}
                                            </td>
                                        @endcan
                                        @can('start_date_show')
                                            <td>
                                                {{ $contracts->start_date ? date('d-m-Y' , strtotime($contracts->start_date)) : '' }}
                                            </td>
                                        @endcan
                                        @can('end_date_show')
                                            <td @if($contracts->end_date) {{ endDateRed($contracts->end_date) }} @endif>
                                                {{ $contracts->end_date ? date('d-m-Y' , strtotime($contracts->end_date)) : '' }}
                                            </td>
                                        @endcan
                                        @can('work_unit_show')
                                            <td>
                                                {{ $contracts->work_unit ?? '' }}
                                            </td>
                                        @endcan
                                        @can('cpcl_show')
                                            <td>
                                                <a href="{{ url('admin/contract/'.$contracts->id.'/cpcl') }}">view/edit
                                                    CPCL</a>
                                            </td>
                                        @endcan
                                        @can('item_position_show')
                                            <td>
                                                {{ $contracts->item_position ?? '' }}
                                            </td>
                                        @endcan
                                        @can('quality_test_show')
                                            <td>
                                                {{ $contracts->quality_test ?? '' }}
                                            </td>
                                        @endcan
                                        @can('item_receive_show')
                                            <td>
                                                {{ $contracts->item_receive ?? '' }}
                                            </td>
                                        @endcan
                                        @can('contract_value_show')
                                            <td>
                                                {{ numberFormat($contracts->contract_value) ?? '' }}
                                            </td>
                                        @endcan
                                        @can('tax_show')
                                            <td>
                                                {{ numberFormat($contracts->tax) ?? '' }}
                                            </td>
                                        @endcan
                                        @can('real_value_show')
                                            <td>
                                                {{ numberFormat($contracts->real_value) ?? '' }}
                                            </td>
                                        @endcan
                                        @can('billing_progress_show')
                                            <td>
                                                Cek list: <br>

                                                @if($contracts->billing_progress != 'null')
                                                    @foreach(json_decode($contracts->billing_progress) as $billing)
                                                        - {{$billing == 'doku' ? "Verifikasi Dokumen & Bast" : $billing}}
                                                        <br>
                                                    @endforeach
                                                @endif
                                            </td>
                                        @endcan
                                        <td>
                                            <a class="btn btn-xs btn-primary"
                                               href="{{ route('admin.contract.show', $contracts->id) }}">
                                                {{ trans('global.view') }}
                                            </a>

                                            <a class="btn btn-xs btn-info"
                                               href="{{ route('admin.contract.edit', $contracts->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        document.querySelector('.sweet-confirm').onclick = function () {
            let id = $(this).data('id')
            swal({
                title: 'Are you sure to finish this contract ( ' + $(this).data('name') + ')?',
                type: 'info',
                showCancelButton: !0,
                confirmButtonColor: '#F5A3E3',
                confirmButtonText: 'Yes, confirm!!',
                closeOnConfirm: !1
            }, function () {
                $.ajax({
                    url: "{{url('admin/contract')}}/" + id,
                    type: 'POST',
                    data: { _token: "{{csrf_token()}}", status: 1, _method: 'PUT' },
                    success: function (data) {
                        swal('Success !!', 'Contract Already Finish !!', 'success')
                        location.reload()
                    }
                })

            })
        }
    </script>
@endsection
