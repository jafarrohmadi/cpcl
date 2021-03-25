@extends('layouts.admin')
@section('content')

    <div class="container-fluid">
        <div class="row page-titles" style="z-index: 0">
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ url('admin/contract') }}">Contract</a></li>
                    <li class="breadcrumb-item active">Create Contract</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ trans('global.create') }} Contract</h4>
                        <form action="{{ route("admin.contract.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{ $errors->has('contract_number') ? 'has-error' : '' }}">
                                <label for="contract_number">Nomor Kontrak *</label>
                                <input type="text" id="contract_number" name="contract_number" class="form-control"
                                       value="{{ old('contract_number', '') }}" required>
                                @if($errors->has('contract_number'))
                                    <p class="help-block">
                                        {{ $errors->first('contract_number') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                                <label for="start_date">Tanggal Dimulai</label>
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
                                <label for="start_date">Tanggal Berakhir</label>
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
                            <div class="form-group {{ $errors->has('work_unit') ? 'has-error' : '' }}">
                                <label for="work_unit">Satuan Kerja</label>
                                <input type="text" id="work_unit" name="work_unit" class="form-control"
                                       value="{{ old('work_unit', '') }}">
                                @if($errors->has('work_unit'))
                                    <p class="help-block">
                                        {{ $errors->first('work_unit') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('item_position') ? 'has-error' : '' }}">
                                <label for="item_position">Posisi Barang</label>
                                <input type="text" id="item_position" name="item_position" class="form-control"
                                       value="{{ old('item_position', '') }}">
                                @if($errors->has('item_position'))
                                    <p class="help-block">
                                        {{ $errors->first('item_position') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('quality_test') ? 'has-error' : '' }}">
                                <label for="item_position">Uji Mutu</label>
                                <input type="text" id="quality_test" name="quality_test" class="form-control"
                                       value="{{ old('quality_test', '') }}">
                                @if($errors->has('quality_test'))
                                    <p class="help-block">
                                        {{ $errors->first('quality_test') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('item_receive') ? 'has-error' : '' }}">
                                <label for="item_receive">Barang Sudah Diterima</label>
                                <input type="text" id="item_receive" name="item_receive" class="form-control"
                                       value="{{ old('item_receive', '') }}">
                                @if($errors->has('item_receive'))
                                    <p class="help-block">
                                        {{ $errors->first('item_receive') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('contract_value') ? 'has-error' : '' }}">
                                <label for="contract_value">Nilai Kontrak</label>
                                <input type="number" id="contract_value" name="contract_value" class="form-control"
                                       value="{{ old('contract_value', '') }}">
                                @if($errors->has('contract_value'))
                                    <p class="help-block">
                                        {{ $errors->first('contract_value') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('tax') ? 'has-error' : '' }}">
                                <label for="tax">Pajak</label>
                                <input type="number" id="tax" name="tax" class="form-control"
                                       value="{{ old('tax', '') }}">
                                @if($errors->has('tax'))
                                    <p class="help-block">
                                        {{ $errors->first('tax') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('real_value') ? 'has-error' : '' }}">
                                <label for="tax">Nilai Real Yang Diterima</label>
                                <input type="number" id="real_value" name="tax" class="form-control"
                                       value="{{ old('real_value', '') }}">
                                @if($errors->has('real_value'))
                                    <p class="help-block">
                                        {{ $errors->first('real_value') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('billing_progress') ? 'has-error' : '' }}">
                                <label for="tax">Proses Penagihan</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="billing_progress[]" value="doku">Verifikasi Dokumen &
                                        Bast</label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="billing_progress[]" value="SPP">SPP</label>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="billing_progress[]" value="SPM">SPM</label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="billing_progress[]" value="SP2D">SP2D</label>
                                </div>

                                @if($errors->has('billing_progress'))
                                    <p class="help-block">
                                        {{ $errors->first('billing_progress') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>
                            <div>
                                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
