@extends('pages.homepage')
@section('title', 'Register api')
@section('pages')
<div class="sub-container">
    <form>
        <div class="mb-3">
            <label for="api_key" class="form-label">Api key</label>
            <input type="input" class="form-control" id="api_key" aria-describedby="apikey-help" value="{{ Session::get('api_key') }}">
            <div id="apikey-help" class="form-text">You can get api key on <a target="_blank" href="https://developer.accuweather.com/packages">this link</a></div>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="button" class="btn btn-primary" id="validateApi">Validate</button>
        </div>

    </form>
</div>
@endsection