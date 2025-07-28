@extends('layouts.component-layout')

@section('content')
<div class="addChurch__container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        <script>
            setTimeout(function() {
                window.location.href = "{{ route('churchNameForm') }}";
            }, 3000);
        </script>
    @endif
    <form action="{{ route('church.store') }}" method="POST" class="addChurch__form">
        @csrf
        <p class="churchForm__title">INPUT YOUR CHURCH NAME AND ADDRESS BELOW!</p>
        <div class="addChurch__group">
            <input type="text" name="chname" class="addChurch__input" placeholder="CHURCH NAME">
            <input type="text" name="chaddress" class="addChurch__input" placeholder="CHURCH ADDRESS">
            <hr>
        </div>
        <div class="btn__group">
            <button type="submit" class="submit__btn">Submit</button>
        </div>
    </form>

    <div class="churchAdd__backBtn">
        <a href="{{ route('churchNameForm') }}">Back to registration</a>
    </div>
</div>
@endsection