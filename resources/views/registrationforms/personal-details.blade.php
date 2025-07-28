@extends('layouts.registration-layout')

@section('content')
    <div class="form-step active">
        <div class="pDetails__container">
            <form action="#" method="POST" class="pDetails__form">
                @csrf
                <p class="pDetails__title">PERSONAL DETAILS</p>
                <div id="pDetailsAlert" class="alert alert-danger d-none step2__alert"></div>
                <div class="pDetails__group">
                    <input type="text" name="fname" id="firstName" class="pDetails__input" placeholder="FIRST NAME">
                    <input type="text" name="lname" id="lastName" class="pDetails__input" placeholder="LAST NAME">
                </div>
                <div class="pDetails__group">
                    <select class="selectpicker pDetails__select" name="designation" title="Designation" id="Designation" data-size="3">
                    
                    </select>
                </div>
                <div class="pDetails__group">
                    <input type="text" name="email" id="emailAddress" class="pDetails__input" placeholder="EMAIL">
                    <input type="text" name="contact" id="contactNumber" class="pDetails__input" placeholder="CONTACT NO.">
                </div>
                <!-- <div class="pDetails__group">
                    <select class="selectpicker pDetails__select" data-live-search="true" title="1" id="churchName1" data-size="3">
                    
                    </select>
                    <select class="selectpicker pDetails__select" data-live-search="true" title="2" id="churchName2" data-size="3">
                    
                    </select>
                    <select class="selectpicker pDetails__select" data-live-search="true" title="3" id="churchName3" data-size="3">
                    
                    </select>
                </div> -->
                <p>SPOUSE?</p>
                <div class="pDetails__group">
                    <input type="text" id="spouseFirstName" class="pDetails__input" placeholder="FIRST NAME" disabled>
                    <input type="text" id="spouseLastName" class="pDetails__input" placeholder="LAST NAME" disabled>
                </div>
                <p>KIDS?</p>
                <div class="pDetails__group">
                    <input type="text" name="kname" id="kidFirstName" class="pDetails__input" placeholder="FIRST NAME" disabled>
                    <input type="text" name="klname" id="kidLastName" class="pDetails__input" placeholder="LAST NAME" disabled>
                </div>
            </form>
        </div>
    </div>
@endsection