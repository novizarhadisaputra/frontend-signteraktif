@if (request()->session()->has('error'))
    <div class="toast-container position-absolute" style="z-index: 12; top: 5rem; right:5rem;">
        <div class="toast fade alert-danger show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ request()->session()->get('error') }}
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@elseif (request()->session()->has('success'))
    <div class="toast-container position-absolute" style="z-index: 12; top: 5rem; right:5rem;">
        <div class="toast fade alert-success show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ request()->session()->get('success') }}
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="toast-container position-absolute" style="z-index: 12; top: 5rem; right:5rem;">
        @foreach ($errors->all() as $error)
            <div class="toast fade alert-warning show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ $error }}
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endforeach
    </div>
@endif
