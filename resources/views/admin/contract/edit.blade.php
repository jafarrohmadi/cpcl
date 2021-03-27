@extends('layouts.admin')
@section('content')

    <div class="container-fluid">
        <div class="row page-titles" style="z-index: 0">
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ url('admin/contract') }}">Contract</a></li>
                    <li class="breadcrumb-item active">Update Contract</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ trans('global.update') }} Contract</h4>
                        <form action="{{ route("admin.contract.update", [$contract->id]) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group {{ $errors->has('contract_number') ? 'has-error' : '' }}">
                                <label for="contract_number">Nomor Kontrak *</label>
                                <input type="text" id="contract_number" name="contract_number" class="form-control"
                                       value="{{ old('contract_number', $contract->contract_number) }}" required>
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
                                <input type="text" id="start_date" name="start_date"
                                       class="form-control complex-colorpicker"
                                       value="{{ old('start_date', $contract->start_date) }}">
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
                                <input type="text" id="end_date" name="end_date"
                                       class="form-control complex-colorpicker"
                                       value="{{ old('end_date', $contract->end_date) }}">
                                @if($errors->has('end_date'))
                                    <p class="help-block">
                                        {{ $errors->first('end_date') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('type_of_fertilizer') ? 'has-error' : '' }}">
                                <label for="type_of_fertilizer">Jenis Pupuk</label>
                                <select name="type_of_fertilizer" id="type_of_fertilizer" class="form-control"
                                        onchange="changeTypeFertilizer(this)">
                                    <option value="1" @if($contract->type_of_fertilizer == "1") selected @endif>Pupuk
                                        NPK
                                    </option>
                                    <option value="2" @if($contract->type_of_fertilizer == "2") selected @endif>Pupuk
                                        POP
                                    </option>
                                    <option value="3" @if($contract->type_of_fertilizer == "3") selected @endif>Pupuk
                                        Dolomit
                                    </option>
                                    <option value="4" @if($contract->type_of_fertilizer == "4") selected @endif>Pupuk
                                        PHC
                                    </option>
                                </select>
                                @if($errors->has('type_of_fertilizer'))
                                    <p class="help-block">
                                        {{ $errors->first('type_of_fertilizer') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('unit_fertilizer') ? 'has-error' : '' }}">
                                <label for="unit_fertilizer">Satuan Pupuk</label>
                                <select name="unit_fertilizer" id="unit_fertilizer" class="form-control"
                                        onchange="changeUnitFertilizer(this)">
                                    @if($contract->type_of_fertilizer == "4")
                                        <option value="LITER"
                                                @if($contract->unit_fertilizer == 'LITER') selected @endif>LITER
                                        </option>
                                    @else
                                        <option value="KG" @if($contract->unit_fertilizer == 'KG') selected @endif>KG
                                        </option>
                                        <option value="ZAK" @if($contract->unit_fertilizer == 'ZAK') selected @endif>
                                            ZAK
                                        </option>
                                    @endif
                                </select>
                                @if($errors->has('unit_fertilizer'))
                                    <p class="help-block">
                                        {{ $errors->first('unit_fertilizer') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('zak_to_kg') ? 'has-error' : '' }} zak_to_kg"
                                 @if($contract->unit_fertilizer != 'ZAK') style="display: none" @endif>
                                <label for="zak_to_kg">KG Ke Zak</label>
                                <input name="zak_to_kg" id="zak_to_kg" class="form-control"
                                       value="{{old('zak_to_kg', $contract->zak_to_kg)}}" type="number">
                                @if($errors->has('zak_to_kg'))
                                    <p class="help-block">
                                        {{ $errors->first('zak_to_kg') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('number_of_row_cpcl') ? 'has-error' : '' }}">
                                <label for="zak_to_kg">Jumlah Row CPCL</label>
                                <input name="number_of_row_cpcl" id="number_of_row_cpcl" class="form-control"
                                       value="{{old('number_of_row_cpcl', $contract->number_of_row_cpcl)}}" min="1" required
                                       type="number">
                                @if($errors->has('number_of_row_cpcl'))
                                    <p class="help-block">
                                        {{ $errors->first('number_of_row_cpcl') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('total_kg_fertilizer') ? 'has-error' : '' }}">
                                <label for="total_kg_fertilizer">Total PUPUK(KG/LITER)</label>
                                <input name="total_kg_fertilizer" id="total_kg_fertilizer" class="form-control"
                                       type="number"
                                       value="{{old('total_kg_fertilizer', $contract->total_kg_fertilizer)}}" min="1" required>
                                @if($errors->has('total_kg_fertilizer'))
                                    <p class="help-block">
                                        {{ $errors->first('total_kg_fertilizer') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.role.fields.title_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('work_unit') ? 'has-error' : '' }}">
                                <label for="work_unit">Satuan Kerja</label>
                                <input type="text" id="work_unit" name="work_unit" class="form-control"
                                       value="{{ old('work_unit', $contract->work_unit) }}">
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
                                       value="{{ old('item_position', $contract->item_position) }}">
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
                                       value="{{ old('quality_test', $contract->quality_test) }}">
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
                                       value="{{ old('item_receive', $contract->item_receive) }}">
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
                                       value="{{ old('contract_value', $contract->contract_value) }}">
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
                                       value="{{ old('tax', $contract->tax) }}">
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
                                <input type="number" id="real_value" name="real_value" class="form-control"
                                       value="{{ old('real_value', $contract->real_value) }}">
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
                                        <input type="checkbox" class="form-check-input" name="billing_progress[]"
                                               value="doku"
                                               @if($contract->billing_progress != 'null' && in_array('doku',json_decode($contract->billing_progress) )) checked @endif>Verifikasi
                                        Dokumen &
                                        Bast</label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="billing_progress[]"
                                               value="SPP"
                                               @if($contract->billing_progress != 'null' && in_array('SPP',json_decode($contract->billing_progress) )) checked @endif>SPP</label>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="billing_progress[]"
                                               value="SPM"
                                               @if($contract->billing_progress != 'null' && in_array('SPM',json_decode($contract->billing_progress) )) checked @endif>SPM</label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="billing_progress[]"
                                               value="SP2D"
                                               @if($contract->billing_progress != 'null' && in_array('SP2D',json_decode($contract->billing_progress) )) checked @endif>SP2D</label>
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
@section('scripts')
    <script>
        function changeTypeFertilizer (data)
        {
            if(data.value == 4) {
                $('#unit_fertilizer').html('')
                $('#unit_fertilizer').append('<option value="LITER">LITER</option>')
            } else {
                $('#unit_fertilizer').html('<option value="KG">KG</option><option value="ZAK">ZAK</option>')
            }
        }

        function changeUnitFertilizer (data)
        {
            if(data.value == 'ZAK') {
                $('.zak_to_kg').show()
            } else {
                $('.zak_to_kg').hide()
            }
        }
    </script>
@endsection
