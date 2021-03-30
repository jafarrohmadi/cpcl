@extends('layouts.admin')
@section('content')

    <div class="container-fluid">
        <div class="row page-titles" style="z-index: 0">
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/contract') }}">Contract</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.cpcl.index', [$contractId]) }}">CPCL</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ trans('global.create') }} CPCL</h4>
                        <form action="{{ route("admin.cpcl.store", [$contractId]) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="contract_id" value="{{$contractId}}">
                            @can('cpcl_province_create')
                                <div class="form-group {{ $errors->has('province') ? 'has-error' : '' }}">
                                    <label for="province">Provinsi</label>
                                    <input type="text" id="province" name="province" class="form-control"
                                           value="{{ old('province', '') }}">
                                    @if($errors->has('province'))
                                        <p class="help-block">
                                            {{ $errors->first('province') }}
                                        </p>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('global.role.fields.title_helper') }}
                                    </p>
                                </div>
                            @endcan
                            @can('cpcl_districts_create')
                                <div class="form-group {{ $errors->has('districts') ? 'has-error' : '' }}">
                                    <label for="province">Kabupaten</label>
                                    <input type="text" id="districts" name="districts" class="form-control"
                                           value="{{ old('districts', '') }}">
                                    @if($errors->has('districts'))
                                        <p class="help-block">
                                            {{ $errors->first('districts') }}
                                        </p>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('global.role.fields.title_helper') }}
                                    </p>
                                </div>
                            @endcan
                            @can('cpcl_sub_district_create')
                                <div class="form-group {{ $errors->has('sub_district') ? 'has-error' : '' }}">
                                    <label for="province">Kecamatan</label>
                                    <input type="text" id="sub_district" name="sub_district" class="form-control"
                                           value="{{ old('sub_district', '') }}">
                                    @if($errors->has('sub_district'))
                                        <p class="help-block">
                                            {{ $errors->first('sub_district') }}
                                        </p>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('global.role.fields.title_helper') }}
                                    </p>
                                </div>
                            @endcan
                            @can('cpcl_village_create')
                                <div class="form-group {{ $errors->has('village') ? 'has-error' : '' }}">
                                    <label for="province">Desa</label>
                                    <input type="text" id="village" name="village" class="form-control"
                                           value="{{ old('village', '') }}">
                                    @if($errors->has('village'))
                                        <p class="help-block">
                                            {{ $errors->first('village') }}
                                        </p>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('global.role.fields.title_helper') }}
                                    </p>
                                </div>
                            @endcan
                            @can('cpcl_farmers_group_name_create')
                                <div class="form-group {{ $errors->has('village') ? 'has-error' : '' }}">
                                    <label for="province">Nama Kelompok Tani / Gapoktan</label>
                                    <input type="text" id="farmers_group_name" name="farmers_group_name"
                                           class="form-control"
                                           value="{{ old('farmers_group_name', '') }}">
                                    @if($errors->has('farmers_group_name'))
                                        <p class="help-block">
                                            {{ $errors->first('farmers_group_name') }}
                                        </p>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('global.role.fields.title_helper') }}
                                    </p>
                                </div>
                            @endcan
                            @can('cpcl_chairman_farmers_group_name_create')
                                <div
                                    class="form-group {{ $errors->has('chairman_farmers_group_name') ? 'has-error' : '' }}">
                                    <label for="province">Ketua Kelompok Tani / Gapoktan</label>
                                    <input type="text" id="chairman_farmers_group_name"
                                           name="chairman_farmers_group_name"
                                           class="form-control"
                                           value="{{ old('chairman_farmers_group_name', '') }}">
                                    @if($errors->has('chairman_farmers_group_name'))
                                        <p class="help-block">
                                            {{ $errors->first('chairman_farmers_group_name') }}
                                        </p>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('global.role.fields.title_helper') }}
                                    </p>
                                </div>
                            @endcan
                            @can('cpcl_nik_create')
                                <div class="form-group {{ $errors->has('nik') ? 'has-error' : '' }}">
                                    <label for="nik">NIK</label>
                                    <input type="number" id="nik" name="nik" class="form-control"
                                           value="{{ old('nik', '') }}">
                                    @if($errors->has('nik'))
                                        <p class="help-block">
                                            {{ $errors->first('nik') }}
                                        </p>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('global.role.fields.title_helper') }}
                                    </p>
                                </div>
                            @endcan
                            @can('cpcl_phone_number_create')
                                <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
                                    <label for="phone_number">No. HP</label>
                                    <input type="number" id="phone_number" name="phone_number" class="form-control"
                                           value="{{ old('phone_number', '') }}">
                                    @if($errors->has('phone_number'))
                                        <p class="help-block">
                                            {{ $errors->first('phone_number') }}
                                        </p>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('global.role.fields.title_helper') }}
                                    </p>
                                </div>
                            @endcan
                            @can('cpcl_area_ha_create')
                                <div class="form-group {{ $errors->has('area_ha') ? 'has-error' : '' }}">
                                    <label for="area_ha">Luas HA</label>
                                    <input type="number" id="area_ha" name="area_ha" class="form-control"
                                           value="{{ old('area_ha', '') }}">
                                    @if($errors->has('area_ha'))
                                        <p class="help-block">
                                            {{ $errors->first('area_ha') }}
                                        </p>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('global.role.fields.title_helper') }}
                                    </p>
                                </div>
                            @endcan
                            @can('cpcl_fertilizer_create')
                                @if($contract->unit_fertilizer != 'LITER')
                                    <div class="form-group {{ $errors->has('zakorkg') ? 'has-error' : '' }}">
                                        @if($contract->unit_fertilizer == 'KG')
                                            <label for="zakorkg">ZAK</label>
                                        @else
                                            <label for="zakorkg">KG</label>
                                        @endif
                                        <input type="number" id="zakorkg" name="zakorkg" class="form-control"
                                               value="{{ old('zakorkg', '') }}">
                                        @if($errors->has('zakorkg'))
                                            <p class="help-block">
                                                {{ $errors->first('zakorkg') }}
                                            </p>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('global.role.fields.title_helper') }}
                                        </p>
                                    </div>
                                @endif
                                <div class="form-group {{ $errors->has('fertilizer') ? 'has-error' : '' }}">
                                    <label
                                        for="fertilizer">{{ (new \App\Models\Contract)->getFertilizer($contract->type_of_fertilizer)  }}
                                        ({{ $contract->unit_fertilizer }})
                                    </label>
                                    <input type="number" id="fertilizer" name="fertilizer"
                                           class="form-control"
                                           value="{{ old('fertilizer', '') }}">
                                    @if($errors->has('fertilizer'))
                                        <p class="help-block">
                                            {{ $errors->first('fertilizer') }}
                                        </p>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('global.role.fields.title_helper') }}
                                    </p>
                                </div>
                            @endcan
                            @can('cpcl_scan_bast_create')
                                <div class="form-group {{ $errors->has('scan_bast') ? 'has-error' : '' }}">
                                    <label for="scan_bast">Scan BAST/Surat Jalan/Open Camera/ KTP</label><br>
                                    <input type="file" id="scan_bast" name="scan_bast"
                                           value="{{ old('scan_bast', '') }}">
                                    @if($errors->has('scan_bast'))
                                        <p class="help-block">
                                            {{ $errors->first('scan_bast') }}
                                        </p>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('global.role.fields.title_helper') }}
                                    </p>
                                </div>
                            @endcan
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
