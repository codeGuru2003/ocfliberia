@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ $title }}</div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('sponsors.update', ['id' => $sponsor->id ]) }}">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name')
                            is-invalid @enderror "
                            value="{{ $sponsor->name }}"
                        />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control @error('email')
                            is-invalid
                            @enderror"
                            value="{{ $sponsor->email }}"
                         />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Contact</label>
                        <input type="text" name="contact" class="form-control @error('contact')
                            is-invalid
                            @enderror"
                            value="{{ $sponsor->contact }}"
                        />
                        @error('contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="custom-control custom-checkbox mb-4">
                        @if ($sponsor->is_active == true)
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" checked />
                        @else
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" />
                        @endif
                        <label class="custom-control-label" for="is_active">
                            Is Active
                        </label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Update</button> | <a href="{{ route('sponsors.index') }}" class="btn btn-info">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
