<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Missions Registration')</title>
    <link rel="icon" type="image" href="{{ asset('assets/img/WINBC1.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
    <body>
        <main class="layout__container">
            <header class="layout__title">
                <h1 class="layout__title-1">PRESS ON IN MISSIONS 2025</h1>
            </header>

            <div class="progress__bar">
                <div class="step active" data-step="1">
                    <span class="step__indicator"></span>
                    <span class="step__description">STEP 1</span>
                    <span class="step__label">CHURCH</span>
                </div>
                <div class="progress__line"></div>
                    <div class="step" data-step="2">
                        <span class="step__indicator"></span>
                        <span class="step__description">STEP 2</span>
                        <span class="step__label">PERSONAL DETAILS</span>
                    </div>
                <div class="progress__line"></div>
                    <div class="step" data-step="3">
                        <span class="step__indicator"></span>
                        <span class="step__description">STEP 3</span>
                        <span class="step__label">ACCOMMODATION</span>
                    </div>
                <div class="progress__line"></div>
                    <div class="step" data-step="4">
                        <span class="step__indicator"></span>
                        <span class="step__description">STEP 4</span>
                        <span class="step__label">TRANSPORTATION</span>
                    </div>
                <div class="progress__line"></div>
                    <div class="step" data-step="5">
                        <span class="step__indicator"></span>
                        <span class="step__description">STEP 5</span>
                        <span class="step__label">COMPLETE</span>
                    </div>
            </div>

            <div id="form-container">
                @yield('content')
            </div>

            <div class="button__group">
                <button type="button" class="back__btn" onclick="javascript:void(0);" id="back__btn" disabled>back</button>
                <button type="button" class="next__btn" onclick="javascript:void(0);" id="next__btn">next</button>
            </div>
        </main>
        <script src="{{ asset('assets/vendor/jquery/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap-select.min.js') }}"></script>
        <script>
            document.addEventListener('change', function(e) {
                if (e.target && e.target.matches('#churchName')) {
                    localStorage.setItem('churchName', e.target.value);
                }
                if (e.target && e.target.matches('#churchAddress')) {
                    localStorage.setItem('churchAddress', e.target.value);
                }
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function(){
                const nextBtn = document.getElementById('next__btn');
                const backBtn = document.getElementById('back__btn');
                const steps = document.querySelectorAll('.step');
                const formContainer = document.getElementById('form-container');
                let currentStep = 1;
                initSelect2Fields();
                updateTitle(currentStep);

                const formRoutes = [
                    '{{ route('churchNameForm') }}',
                    '{{ route('personalDetailsForm') }}',
                    '{{ route('accomodationForm') }}',
                    '{{ route('transportationForm') }}',
                    '{{ route('confirmation') }}'
                ];

                function updateTitle(step){
                    const titles = {
                        1: 'Step 1: Input your church name',
                        2: 'Step 2: Personal Details',
                        3: 'Step 3: Accomodation',
                        4: 'Step 4: Transportation',
                        5: 'Step 5: Confirmation'
                    };
                    document.title = titles[step] || 'Registration';
                }

                nextBtn.addEventListener('click', function(){
                    if(currentStep <= steps.length){
                        const currentForm = formContainer.querySelector('form');

                        if(currentStep === 1){
                            const churchName = document.getElementById('churchName')?.value;
                            const churchAddress = document.getElementById('churchAddress')?.value;
                            const alertDiv = document.getElementById('churchAlert');

                            alertDiv.innerHTML = '';

                            // if(!churchName){
                            //     alertDiv.classList.remove('d-none');
                            //     alertDiv.innerHTML = 'Please select your Church Name.';
                            //     setTimeout(() => {
                            //         alertDiv.classList.add('d-none');
                            //     }, 2000);
                            //     return;
                            // }

                            // if (!churchAddress) {
                            //     alertDiv.classList.remove('d-none');
                            //     alertDiv.innerHTML = 'Please select your Church Address.';
                            //     setTimeout(() => {
                            //         alertDiv.classList.add('d-none');
                            //     }, 2000);
                            //     return;
                            // }

                            alertDiv.classList.add('d-none');
                        }

                        if(currentStep === 2){
                            const firstName = document.getElementById('firstName')?.value;
                            const lastName = document.getElementById('lastName')?.value;
                            // const designation = document.getElementById('Designation')?.value;
                            // const emailAddress = document.getElementById('emailAddress')?.value;
                            // const contactNumber = document.getElementById('contactNumber')?.value;
                            const alertDiv = document.getElementById('pDetailsAlert');

                            alertDiv.innerHTML = '';

                            if(!firstName){
                                alertDiv.classList.remove('d-none');
                                alertDiv.innerHTML = 'First name is empty.';
                                setTimeout(() => {
                                    alertDiv.classList.add('d-none');
                                }, 2000);
                                return
                            }

                            if(!lastName){
                                alertDiv.classList.remove('d-none');
                                alertDiv.innerHTML = 'Last name is empty.';
                                setTimeout(() => {
                                    alertDiv.classList.add('d-none');
                                }, 2000);
                                return
                            }

                            alertDiv.classList.add('d-none');
                        }

                        if(currentForm && !currentForm.checkValidity()){
                            currentForm.reportValidity();
                            return;
                        }

                        if(currentStep < steps.length){
                            steps[currentStep - 1].classList.remove('active');
                            steps[currentStep - 1].classList.add('completed');
                            currentStep++;
                            steps[currentStep - 1].classList.add('active');
                            loadForm(currentStep);
                            updateTitle(currentStep);

                            backBtn.disabled = false;
                            if(currentStep === steps.length){
                                nextBtn.textContent = 'SUBMIT';
                            }
                        } else {
                            if(currentForm){
                                currentForm.submit();
                            } else {
                                formContainer.innerHTML = '<p class="pages__title">Registration Complete!</p>';
                                setTimeout(() => {
                                    window.location = "{{ route('home') }}";
                                }, 1000);
                            }
                        }
                    }
                });

                backBtn.addEventListener('click', function(){
                    if (currentStep > 1){
                        steps[currentStep - 1].classList.remove('active');
                        currentStep--;
                        steps[currentStep - 1].classList.remove('completed');
                        steps[currentStep - 1].classList.add('active');
                        loadForm(currentStep);
                        updateTitle(currentStep);

                        backBtn.disabled = currentStep === 1;
                        nextBtn.textContent = 'next';
                    }
                });

                function updateProgressBar(){
                    steps.forEach(step => {
                        const stepNumber = parseInt(step.getAttribute('data-step'));
                        step.classList.toggle('active', stepNumber === currentStep);
                        if (currentStep === 5 && stepNumber === 5){
                            step.classList.add('completed');
                        } else {
                            step.classList.toggle('completed', stepNumber < currentStep);
                        }
                    });
                }

                function initSelect2Fields() {
                    $('.selectpicker').selectpicker();
                }

                function loadForm(step){
                    fetch(formRoutes[step - 1],{
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'text/html'
                        }
                    })
                    .then(response => response.text())
                    .then(data => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(data, 'text/html');
                        const content = doc.querySelector('#form-container')?.innerHTML || data;
                        formContainer.innerHTML = content;
                        setTimeout(() => {
                            const storedName = localStorage.getItem('churchName');
                            const storedAddress = localStorage.getItem('churchAddress');

                            if (storedName) {
                                const nameSelect = document.querySelector('#churchName');
                                if (nameSelect) {
                                    nameSelect.value = storedName;
                                    $(nameSelect).selectpicker('refresh');
                                }
                            }

                            if (storedAddress) {
                                const addressSelect = document.querySelector('#churchAddress');
                                if (addressSelect) {
                                    addressSelect.value = storedAddress;
                                    $(addressSelect).selectpicker('refresh');
                                }
                            }
                        }, 50); 
                        updateProgressBar();
                        initSelect2Fields();
                    })
                    .catch(error => {
                        console.error('Error loading form:', error);
                        formContainer.innerHTML = '<p>Error loading form. please try again.</p>';
                    });
                }
            });
        </script>
        @stack('scripts')
    </body>