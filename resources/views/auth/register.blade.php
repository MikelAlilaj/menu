@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf



                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-flag fa-fw"></i>
                            </span>
                            </div>
                            <select class="custom-select{{ $errors->has('type_id') ? ' is-invalid' : '' }}" id="type_id" name="type_id">
                                <option value="" selected>Choose Business Type</option>
                                @foreach($business_types as $br)
                                    @if($br->isActive==1)
                                        <option value="{{ $br->id }}">{{ $br->type_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->has('type_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type_id') }}
                                </div>
                            @endif
                        </div>



                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-flag fa-fw"></i>
                            </span>
                            </div>
                            <select class="custom-select{{ $errors->has('category_id') ? ' is-invalid' : '' }}" id="category_id" name="category_id">
                                <option value="" selected>Choose Business Category</option>
                                @foreach($business_category as $br)
                                    @if($br->isActive==1)
                                        <option value="{{ $br->id }}">{{ $br->category_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category_id') }}
                                </div>
                            @endif
                        </div>










                        <div class="form-group row">
                            <label for="FirstName" class="col-md-4 col-form-label text-md-right">{{ __('FirstName') }}</label>

                            <div class="col-md-6">
                                <input id="FirstName" type="text" class="form-control @error('FirstName') is-invalid @enderror" name="FirstName" value="{{ old('FirstName') }}" required autocomplete="FirstName" autofocus>

                                @error('FirstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="LastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="LastName" type="text" class="form-control @error('LastName') is-invalid @enderror" name="LastName" value="{{ old('LastName') }}" required autocomplete="LastName" autofocus>

                                @error('LastName')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="Business_Name" class="col-md-4 col-form-label text-md-right">{{ __('Business_Name') }}</label>

                            <div class="col-md-6">
                                <input id="Business_Name" type="text" class="form-control @error('Business_Name') is-invalid @enderror" name="Business_Name" value="{{ old('Business_Name') }}" required autocomplete="Business_Name" autofocus>

                                @error('Business_Name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="Business_Description" class="col-md-4 col-form-label text-md-right">{{ __('Business_Description') }}</label>

                            <div class="col-md-6">
                                <input id="Business_Description" type="text" class="form-control @error('Business_Description') is-invalid @enderror" name="Business_Description" value="{{ old('Business_Description') }}" required autocomplete="Business_Description" autofocus>

                                @error('Business_Description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="Business_City" class="col-md-4 col-form-label text-md-right">{{ __('Business_City') }}</label>

                            <div class="col-md-6">
                                <input id="Business_City" type="text" class="form-control @error('Business_City') is-invalid @enderror" name="Business_City" value="{{ old('Business_City') }}" required autocomplete="Business_City" autofocus>

                                @error('Business_City')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="Business_State" class="col-md-4 col-form-label text-md-right">{{ __('Business_State') }}</label>

                            <div class="col-md-6">
                                <input id="Business_State" type="text" class="form-control @error('Business_State') is-invalid @enderror" name="Business_State" value="{{ old('Business_State') }}" required autocomplete="Business_State" autofocus>

                                @error('Business_State')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Business_NUIS" class="col-md-4 col-form-label text-md-right">{{ __('Business_NUIS') }}</label>

                            <div class="col-md-6">
                                <input id="Business_NUIS" type="text" class="form-control @error('Business_NUIS') is-invalid @enderror" name="Business_NUIS" value="{{ old('Business_NUIS') }}" required autocomplete="Business_NUIS" autofocus>

                                @error('Business_NUIS')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="Business_Web" class="col-md-4 col-form-label text-md-right">{{ __('Business_Web') }}</label>

                            <div class="col-md-6">
                                <input id="Business_Web" type="text" class="form-control @error('Business_Web') is-invalid @enderror" name="Business_Web" value="{{ old('Business_Web') }}" required autocomplete="Business_Web" autofocus>

                                @error('Business_Web')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="Business_Phone" class="col-md-4 col-form-label text-md-right">{{ __('Business_Phone') }}</label>

                            <div class="col-md-6">
                                <input id="Business_Phone" type="text" class="form-control @error('Business_Phone') is-invalid @enderror" name="Business_Phone" value="{{ old('Business_Phone') }}" required autocomplete="Business_Phone" autofocus>

                                @error('Business_Phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="Address" type="text" class="form-control @error('Address') is-invalid @enderror" name="Address" value="{{ old('Address') }}" required autocomplete="Address" autofocus>

                                @error('Address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="Location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                            <div class="col-md-6">
                                <input id="Location" type="text" class="form-control @error('Location') is-invalid @enderror" name="Location" value="{{ old('Location') }}" required autocomplete="Location" autofocus>

                                @error('Location')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
