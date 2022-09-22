@extends('pages.homepage')
@section('title', 'Display weather')
@section('pages')
<div class="sub-container">
    <form>
        <div class="mb-3">
            <label for="location" class="form-label">Location:</label>
            <input type="input" class="form-control" id="location" aria-describedby="apikey-help">
            <div id="apikey-help" class="form-text">Example inputs are: Manila, london, etc.</div>
        </div>
        <div class="dropdown d-grid gap-2 mb-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Select Day/s
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="dayDropDown">
                <li class="dropdown-item" data-value="1day">1 Day </li>
                <li class="dropdown-item" data-value="5day">5 Days</li>
            </ul>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="button" class="btn btn-primary" id="submitLocation">Submit</button>
        </div>
    </form>
    <div class="insertIframe">

    </div>
</div>
@endsection