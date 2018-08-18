<div class="form-group">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name" type="text" id="name" value="{{ old('name')}}" >
    @if ($errors->has('name'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif
</div>
<div class="form-group">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" name="email" type="email" id="email" value="{{ old('email')}}" >
    @if ($errors->has('email'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
</div>
<div class="form-group">
    <label for="password" class="control-label">{{ 'Password' }}</label>
    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" name="password" type="password" id="password" value="{{old('password')}}" >
    @if ($errors->has('password'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('password') }}</strong>
    </span>
    @endif
</div>
<div class="form-group">
    <label for="password_confirmation" class="control-label">{{ 'Password Confirmation' }}</label>
    <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : ''}}" name="password_confirmation" type="password" id="password_confirmation" value="{{old('password_confirmation')}}" >
    @if ($errors->has('password_confirmation'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('password_confirmation') }}</strong>
    </span>
    @endif
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ 'Create' }}">
</div>
