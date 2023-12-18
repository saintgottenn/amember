<div x-data="
    { 
        init() {
            this.syncStateWithUrl();
            window.addEventListener('popstate', () => {
                this.syncStateWithUrl();
            });
        },
        syncStateWithUrl() {
            const urlParams = new URLSearchParams(window.location.search);
            this.showStepOne = !urlParams.has('step-two');
            this.showStepTwo = urlParams.has('step-two');
        },
        showStepOne: !window.location.search.includes('step-two'),
        showStepTwo: window.location.search.includes('step-two'),
    }
    ">
    <div x-show="showStepOne">
        @livewire('auth.create-account-step-one')
    </div>

    <div x-show="showStepTwo">
        @livewire('auth.create-account-step-two')
    </div>
</div>