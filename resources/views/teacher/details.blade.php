@extends('layouts.master')

@section('title')
    {{ __('teacher') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ __('manage_teacher') }}
            </h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ __('list_teacher') }}
                        </h4>
                        <div class="row">
                            <div class="col-12">
                                <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table"
                                    data-url="{{ url('teacher_list') }}" data-click-to-select="true"
                                    data-side-pagination="server" data-pagination="true"
                                    data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-toolbar="#toolbar"
                                    data-show-columns="true" data-show-refresh="true" data-fixed-columns="true"
                                    data-trim-on-search="false"
                                    data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                                    data-maintain-selected="true" data-export-types='["txt","excel"]'
                                    data-export-options='{ "fileName": "teacher-list-<?= date('d-m-y') ?>" ,"ignoreColumn":
                                    ["operate"]}'
                                    data-query-params="teacherQueryParams" data-escape="true">
                                    <thead>
                                        <tr>
                                            <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                                {{ __('id') }}</th>
                                            <th scope="col" data-field="no" data-sortable="false">{{ __('no.') }}
                                            </th>
                                            <th scope="col" data-field="user_id" data-sortable="false"
                                                data-visible="false">{{ __('user_id') }}</th>
                                            <th scope="col" data-field="first_name" data-sortable="false">
                                                {{ __('first_name') }}</th>
                                            <th scope="col" data-field="last_name" data-sortable="false">
                                                {{ __('last_name') }}</th>
                                            <th scope="col" data-field="gender" data-sortable="false">
                                                {{ __('gender') }}</th>
                                            <th scope="col" data-field="email" data-sortable="false">
                                                {{ __('email') }}</th>
                                            <th scope="col" data-field="dob" data-sortable="false">
                                                {{ __('dob') }}</th>
                                            <th scope="col" data-field="image"
                                                data-sortable="false"data-formatter="imageFormatter">{{ __('image') }}
                                            </th>
                                            <th scope="col" data-field="qualification" data-sortable="false">
                                                {{ __('qualification') }}</th>
                                            <th scope="col" data-field="current_address" data-sortable="false">
                                                {{ __('current_address') }}</th>
                                            <th scope="col" data-field="permanent_address" data-sortable="false">
                                                {{ __('permanent_address') }}</th>
                                            <th data-escape="false" data-events="teacherActionEvents" scope="col" data-field="operate"
                                                data-sortable="false">{{ __('action') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('edit_teacher') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <form id="editdata" class="editform" action="{{ url('teachers') }}" novalidate="novalidate"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="user_id">
                        <input type="hidden" name="id" id="id">
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('first_name') }} <span class="text-danger">*</span></label>
                                {!! Form::text('first_name', null, ['required', 'placeholder' => __('first_name'), 'class' => 'form-control', 'id' => 'first_name']) !!}

                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('last_name') }} <span class="text-danger">*</span></label>
                                {!! Form::text('last_name', null, ['required', 'placeholder' => __('last_name'), 'class' => 'form-control', 'id' => 'last_name']) !!}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('gender') }} <span class="text-danger">*</span></label>
                                <div class="d-flex">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            {!! Form::radio('gender', 'male', null, ['class' => 'form-check-input edit', 'id' => 'gender']) !!}
                                            {{ __('male') }}
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            {!! Form::radio('gender', 'female', null, ['class' => 'form-check-input edit', 'id' => 'gender']) !!}
                                            {{ __('female') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('email') }} <span class="text-danger">*</span></label>
                                {!! Form::text('email', null, ['required', 'placeholder' => __('email'), 'class' => 'form-control', 'id' => 'email' ,'readonly' => true]) !!}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('mobile') }} <span class="text-danger">*</span></label>
                                {!! Form::number('mobile', null, ['required', 'min' => 1 , 'placeholder' => __('mobile'), 'class' => 'form-control', 'id' => 'mobile']) !!}

                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('image') }}</label><br>
                                {{-- <input type="file" name="image" id="edit_image" class="form-control" placeholder="{{__('image')}}"> --}}
                                <input type="file" name="image" class="file-upload-default" accept="image/png,image/jpeg,image/jpg" />
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="{{ __('image') }}" />
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-theme"
                                            type="button">{{ __('upload') }}</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('dob') }} <span class="text-danger">*</span></label>
                                {!! Form::text('dob', null, ['required', 'placeholder' => __('dob'), 'class' => 'datepicker-popup-no-future form-control', 'id' => 'dob']) !!}
                                <span class="input-group-addon input-group-append">
                                </span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('qualification') }} <span class="text-danger">*</span></label>
                                {!! Form::textarea('qualification', null, ['required', 'placeholder' => __('qualification'), 'class' => 'form-control', 'rows' => 3, 'id' => 'qualification']) !!}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('current_address') }} <span class="text-danger">*</span></label>
                                {!! Form::textarea('current_address', null, ['required', 'placeholder' => __('current_address'), 'class' => 'form-control', 'rows' => 3, 'id' => 'current_address']) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('permanent_address') }} <span class="text-danger">*</span></label>
                                {!! Form::textarea('permanent_address', null, ['required', 'placeholder' => __('permanent_address'), 'class' => 'form-control', 'rows' => 3, 'id' => 'permanent_address']) !!}
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($teacherFields as $row)
                                @if($row->type==="text" || $row->type==="number")
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ ucwords(str_replace('_', ' ', $row->name)) }} {!! ($row->is_required) ? ' <span class="text-danger">*</span></label>': '' !!}</label></label>
                                        <input type="{{$row->type}}" name="{{$row->name}}" id="{{ $row->name }}" placeholder="{{ ucwords(str_replace('_', ' ', $row->name)) }}" class="form-control edit_text_number" {{($row->is_required===1)?"required":''}}>
                                    </div>
                                @endif
                                @if($row->type==="dropdown")
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ ucwords(str_replace('_', ' ', $row->name)) }} {!! ($row->is_required) ? ' <span class="text-danger">*</span></label>': '' !!}</label></label>
                                        <select name="{{ $row->name }}" class="form-control edit_dropdown" id="{{ $row->name }}" {{($row->is_required===1)?"required":''}}>
                                            <option value="">Please Select</option>
                                            @foreach(json_decode($row->default_values) as $options)
                                                @if($options != null)
                                                    <option value="{{$options}}">{{ucfirst($options)}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                @if($row->type==="radio")
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ ucwords(str_replace('_', ' ', $row->name)) }} {!! ($row->is_required) ? ' <span class="text-danger">*</span></label>': '' !!}</label></label>
                                        <br>
                                        <div class="d-flex">
                                            @foreach(json_decode($row->default_values) as $options)
                                                @if($options != null)
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="edit_radio" id="{{$options}}" name="{{$row->name}}" value="{{$options}}" {{($row->is_required===1)?"required":''}}>
                                                            {{ ucfirst($options) }}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @if($row->type==="checkbox")
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{{ ucwords(str_replace('_', ' ', $row->name)) }} {!! ($row->is_required) ? ' <span class="text-danger">*</span></label>': '' !!}</label>
                                    <br>
                                    <div class="col-md-10" id="{{$row->name}}">
                                        @foreach(json_decode($row->default_values) as $options)
                                            @if($options != null)
                                                <div class="checkbox form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="checkbox"  class="edit_checkbox" id="checkbox_{{ $options }}" name="{{ 'checkbox[' . $row->name . '][' . $options . ']' }}" value="{{$options}}"> {{ ucfirst(str_replace('_', ' ', $options)) }}
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                </div>
                                @endif
                                @if($row->type==="textarea")
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ ucwords(str_replace('_', ' ', $row->name)) }} {!! ($row->is_required) ? ' <span class="text-danger">*</span></label>': '' !!}</label></label>
                                        <textarea name="{{$row->name}}" id="{{$row->name}}" cols="10" rows="3" placeholder="{{ ucwords(str_replace('_', ' ', $row->name)) }}" class="form-control edit_textarea" {{($row->is_required===1)?"required":''}}></textarea>
                                    </div>
                                @endif
                                @if($row->type==="file")
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ ucwords(str_replace('_', ' ', $row->name)) }} {!! ($row->is_required) ? ' <span class="text-danger">*</span></label>': '' !!}</label>
                                            <input type="file" name="{{$row->name}}" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="{{ ucwords(str_replace('_', ' ', $row->name)) }}"/>
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-theme" type="button">{{ __('upload') }}</button>
                                                </span>
                                            </div>
                                            <input type="hidden" id="{{$row->name}}-hidden" name="{{$row->name}}"/>
                                            <div id="{{ $row->name }}-div" style="display: none" class="edit_file mt-3">
                                                <a href="" id="{{ $row->name }}" target="_blank" rel="noopener noreferrer">{{ $row->name }}</a>
                                            </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" name="edit_grant_permission" aria-label="Checkbox for following text input" id="edit_permission_chk" class="edit_permission_chk">
                              </div>
                            </div>
                            <label class="form-control" for="edit_permission_chk">
                                {{__('grant_permission_to_manage_students_parents')}}
                            </label>
                        </div>
                        <div class="form-group text-info" style="font-size: 0.8rem;margin-top: -0.3rem">{{__('note_for_permission_of_student_manage')}}</div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-theme" type="submit" value={{ __('submit') }}>
                        <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('cancel') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
