<section>
    <div class="container">
        <div class="d-flex justify-content-between py-4">
            <p class="h3">Top Interpreter</p>
            <a href="{{ route('partner.index') }}">View More<i class="bi bi-arrow-right mx-1"
                    aria-hidden="true"></i></a>
        </div>
        <div class="row" id="list-partner">
            @forelse ($partners as $partner)
                <div class="col-md-3 col-6">
                    <div class="person-card mb-4">
                        <div class="position-relative img-hover-zoom ">
                            <a class="person-contact" href="#">
                                <span class="badge badge rounded-pill bg-light text-dark h5"><i
                                        class="bi bi-chat-dots-fill text-secondary mx-1" aria-hidden="true"></i>
                                    Contact</span>
                            </a>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#modalPerson{{ $partner->id }}">
                                <img src="{{ $partner->image->url ?? asset('assets/img/default.png') }}" alt="...">
                                <div class="overlay"></div>
                            </a>
                        </div>
                        <div class="person-detail">
                            <h2 class="text-white person-title">{{ $partner->name }}</h2>
                            <div class="mb-2">
                                <span class="small text-white">
                                    <i class="bi bi-geo-alt mx-1" aria-hidden="true"></i>
                                    {{ $partner->detail->city . ', ' . $partner->detail->province }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @include('components.modal-partner', ['partner' => $partner])
            @empty

            @endforelse
        </div>
    </div>
</section>
