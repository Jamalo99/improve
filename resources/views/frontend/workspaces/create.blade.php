@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.workspace.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.workspaces.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_reference_id">{{ trans('cruds.workspace.fields.user_reference') }}</label>
                            <select class="form-control select2" name="user_reference_id" id="user_reference_id" required>
                                @foreach($user_references as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_reference_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user_reference'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user_reference') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.workspace.fields.user_reference_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="owner">{{ trans('cruds.workspace.fields.owner') }}</label>
                            <input class="form-control" type="text" name="owner" id="owner" value="{{ old('owner', '') }}" required>
                            @if($errors->has('owner'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('owner') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.workspace.fields.owner_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection