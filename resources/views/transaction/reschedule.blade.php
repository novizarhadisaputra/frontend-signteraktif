@extends('layouts.frontend')
@section('content')
    <section class="my-5">
        <div class="container">
            <a href="{{ route('partner.index') }}" class="font-light-blue mb-4 d-block"><i
                    class="bi bi-arrow-left mr-1"></i> Back to
                Interpreter list</a>
            <h1 class="mb-4">Make appointment</h1>
            <form class="row" action="{{ route('transaction.store') }}" method="POST">
                @csrf
                <div class="col-md-3">
                    <label class="form-label">Interpreter</label>
                    <div class="person-card mb-4">
                        <div class="position-relative img-hover-zoom ">
                            <a class="person-contact" href="#">
                                <span class="badge badge rounded-pill bg-light text-dark h5"><i
                                        class="bi bi-chat-dots-fill text-secondary mx-1" aria-hidden="true"></i>
                                    Contact</span>
                            </a>
                            <img src="{{ $partner->image->url ?? asset('assets/img/default.png') }}" alt="...">
                            <div class="overlay"></div>
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
                <div class="col-md-3">
                    <label class="form-label">Select Date</label>
                    <div class="card  mb-3">
                        <div class="card-body">
                            <div id="selectDate"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Select Time</label>
                    <div class="accordion mb-3" id="accordionTime">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button" id="btnCollapseDate" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true"
                                    aria-controls="collapse1">
                                    {{ date('d F Y', strtotime(request()->input('date'))) }}
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1"
                                data-bs-parent="#accordionTime">
                                <div class="accordion-body">
                                    <div class="mb-3">
                                        <label for="selectTime" class="form-label">Times</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-transparent text-secondary"><i
                                                    class="bi bi-clock"></i></span>
                                            <select type='text' class="form-select" id='selectTime'>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display: none">
                    <div class="mb-3">
                        <label for="totalPrice" class="form-label">Total Price</label>
                        <input class="form-control" name="total_price" id="totalPrice" value="0">
                    </div>
                </div>
                <div style="display: none">
                    <div class="mb-3">
                        <label for="totalPaid" class="form-label">Total Price</label>
                        <input class="form-control" name="total_paid" id="totalPaid" value="0">
                    </div>
                </div>
                <div style="display: none">
                    <div class="mb-3">
                        <label for="paymentMethod" class="form-label">Payment Method</label>
                        <input class="form-control" name="payment_method_id" id="paymentMethod" value="3">
                    </div>
                </div>
                <div style="display: none">
                    <div class="mb-3">
                        <label for="paymentMethod" class="form-label">Details</label>
                        <input class="form-control" name="details" id="details" value="">
                    </div>
                </div>
                {{-- {
                    "total_price": 0,
                    "total_paid": 0,
                    "payment_method_id": 3,
                    "transaction_status_id": 1,
                    "voucher_id": "",
                    "details": [
                        {
                            "schedule_id": 70,
                            "user_id": 4,
                            "total_price": 0,
                            "total_paid": 0,
                            "voucher_id": ""
                        }
                    ]
                } --}}
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Add message</label>
                        <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="13"></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-end ">
                    <button type="submit" class="btn btn-primary">Set Appointment</button>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/vendor/bootstrap-datetimepicker/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <script>
        fetch(`{{ route('partner.schedules', ['id' => $partner->id]) }}`)
            .then(response => response.json())
            .then(schedules => {
                const enabledDates = schedules.map(s => {
                    let split = s.date.split('-');
                    let date = `${split[1]}/${split[2]}/${split[0]}`
                    return moment(new Date(date))
                })
                $('#selectDate').datetimepicker({
                    defaultDate: moment(new Date("{{ date('m/d/Y', strtotime(request()->input('date'))) }}")),
                    inline: true,
                    format: 'L',
                    useCurrent: false,
                    enabledDates,
                    multidateSeparator: ',',
                    icons: {
                        time: "bi bi-clock text-secondary",
                        date: "bi bi-calendar text-secondary",
                        up: "bi bi-chevron-up text-secondary",
                        down: "bi bi-chevron-down text-secondary",
                        previous: 'bi bi-chevron-left text-secondary',
                        next: 'bi bi-chevron-right text-secondary',
                        today: 'bi bi-screenshot text-secondary',
                        clear: 'bi bi-trash text-secondary',
                        close: 'bi bi-remove text-secondary'
                    }
                });

                $("#selectDate").on("change.datetimepicker", function(e) {
                    let date = moment(e.date._d).format('YYYY-MM-DD');
                    window.location =
                        `{{ route('transaction.form.order', ['partnerId' => $partner->id]) }}?date=${date}`;
                });

                $("#selectTime").change(function() {
                    if ($(this).val() != '') {
                        // console.log(`$(this).val()`, $(this).val())
                        let data = [{
                            "schedule_id": $(this).val(),
                            "user_id": `{{ $partner->id }}`,
                            "total_price": $('#totalPrice').val(),
                            "total_paid": $('#totalPrice').val(),
                            "voucher_id": ""
                        }];
                        $('#details').val(JSON.stringify(data));
                    } else {
                        $('#details').val('');
                    }
                });

                // selectTime

                fetchSchedules(`{{ request()->input('date') }}`)
            });



        function generateOptionTimes(times) {
            let html = `<option value="">Choose Time</option>`;
            times.forEach(element => {
                html =
                    `${html}<option value="${element.id}">${moment(element.date).format('DD MMM YYYY')} ${element.time_start} - ${element.time_end}</option>`;
            });
            $('#selectTime').html(html);
        }

        function fetchSchedules(date) {
            let url = `{{ route('partner.schedules', ['id' => $partner->id]) }}`;
            fetch(`${url}?date=${date}`)
                .then(res => res.json())
                .then(times => {
                    generateOptionTimes(times)
                });
        }
    </script>
@endsection
