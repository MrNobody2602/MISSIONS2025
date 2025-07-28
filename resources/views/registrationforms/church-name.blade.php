@extends('layouts.registration-layout')

@section('content')
<div class="form-step active">
    <div class="church__container">
        <form action="" method="POST" class="churchName__form">
            @csrf
            <p class="churchForm__title">SEARCH OR INPUT YOUR CHURCH NAME HERE!</p>
            <div id="churchAlert" class="alert alert-danger d-none step1__alert"></div>
            <div class="churchSelect__group">
                <select class="selectpicker church__select" name="churchName" data-live-search="true" title="CHURCH NAME" id="churchName" data-size="3">
                    @foreach ($churches as $church)
                        <option value="{{ $church->churchname }}" {{ old('churchName') == $church->churchname ? 'selected' : '' }}>
                            {{ $church->churchname }}
                        </option>
                    @endforeach
                </select>
                <select class="selectpicker church__select" name="churchAddress" data-live-search="true" title="CHURCH ADDRESS" id="churchAddress" data-size="3">
                    @foreach ($churches as $church)
                        <option value="{{ $church->churchaddress }}" {{ old('churchAddress') == $church->churchaddress ? 'selected' : '' }}>
                            {{ $church->churchaddress }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="addChurch__link">
                <label>Church isn't on the list?</label>
                <a href="{{ route('church.add') }}" class="addChurch__button">Add my church</a>
            </div>
        </form>
    </div>
</div>
@endsection