<!-- Modal Person -->
<div class="modal fade" id="modalPerson{{ $partner->id }}" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profil JBI</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="person-card mb-4">
                                <div class="position-relative img-hover-zoom ">
                                    <img src="{{ $partner->image->url ?? asset('assets/img/default.png') }}"
                                        alt="...">
                                    <div class="overlay"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h2 class="display-6 mb-3">{{ $partner->name }}</h2>
                            <p>{{ $partner->detail->description }}</p>
                            <h3>Languages spoken</h3>
                            <div class="py-2">
                                <span class="badge alert-secondary p-2">Bahasa Isyarat Indonesia (BISINDO)</span>
                            </div>
                            <h3>Organizational Affiliation</h3>
                            <div class="py-2">
                                <span
                                    class="badge alert-secondary p-2">{{ $partner->agency->name ?? 'PLJ Daerah Istimewa Yogyakarta' }}</span>
                            </div>

                            <div class="d-flex justify-content-between my-4">
                                <a href="https://api.whatsapp.com/send?phone={{ $partner->detail->phone }}"
                                    class="btn btn-outline-primary w-50 me-3"><i
                                        class="bi bi-chat-dots-fill mx-5 mx-md-1" aria-hidden="true"></i>Contact</a>
                                <a href="{{ route('transaction.form.order', ['partnerId' => $partner->id]) }}?date={{ request()->input('date') }}"
                                    class="btn btn-primary w-50 ms-3">Make appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Person -->
