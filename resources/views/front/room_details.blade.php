@extends('front.layout.app')
@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Room: {{ $roomDetails->name }}</h2>
            </div>
        </div>
    </div>
</div>


<div class="page-content room-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-12 left">
                
                <div class="room-detail-carousel owl-carousel">

                    <div class="item" style="background-image:url('{{ asset('uploads/'.$roomDetails->featured_photo) }}');">
                        <div class="bg"></div>
                    </div> 

                    @foreach( $roomDetails->rRoomPhoto as $itemphoto)
                    <div class="item" style="background-image:url('{{ asset('uploads/'.$itemphoto->photo) }}');">
                        <div class="bg"></div>
                    </div>
                    @endforeach
                </div>
               
                <div class="description">
                    <p>
                       {!! $roomDetails->description !!}
                    </p>
                    
                </div>

                <div class="amenity">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Amenities</h2>
                        </div>
                    </div>
                    <div class="row">
                        @for ($j = 0; $j < count($existing_amenities); $j++)
                        @php
                            $amenity_value = \App\Models\Amenity::where('id', $existing_amenities[$j])->first();
                        @endphp
                        @if ($amenity_value)
                            <div class="col-lg-6 col-md-12">
                                <div class="item"><i class="fa fa-check-circle"></i> {{ $amenity_value->name }}</div>
                            </div>
                        @endif
                    @endfor
                    </div>
                </div>


                <div class="feature">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Features</h2>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Room Size</th>
                                <td>{{ $roomDetails->size }}</td>
                            </tr>
                            <tr>
                                <th>Number of Beds</th>
                                <td>{{ $roomDetails->total_beds }}</td>
                            </tr>
                            <tr>
                                <th>Number of Bathrooms</th>
                                <td>{{ $roomDetails->total_bathrooms }}</td>
                            </tr>
                            <tr>
                                <th>Number of Balconies</th>
                                <td>{{ $roomDetails->total_balconies }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $roomDetails->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>


            </div>
            <div class="col-lg-4 col-md-5 col-sm-12 right">

                <div class="sidebar-container" id="sticky_sidebar">

                    

                        <div class="widget">
                            <h2>Room Price per Night</h2>
                            <div class="price">
                                ${{  $roomDetails->price }}
                            </div>
                        </div>
                        <div class="widget">
                            <h2>Reserve This Room</h2>
                            <form action="{{ route('cart_submit') }}" method="post">
                                @csrf
                                <input type="hidden" name="room_id" class="form-control" value="{{  $roomDetails->id }}">
                                <div class="form-group mb_20">
                                    <label for="">Check in & Check out</label>
                                    <input type="text" name="checkin_checkout" value="{{ old('checkin_checkout') }}"class="form-control daterange1" placeholder="Check in & Check out">
                                        @if ($errors->has('checkin_checkout'))
                                            <span class="text-danger">{{ $errors->first('checkin_checkout') }}</span>
                                        @endif
                                </div>
                                <div class="form-group mb_20">
                                    <label for="">Adult</label>
                                    <input type="number" name="adult" value="{{ old('adult') }}"class="form-control" min="1" max="30" placeholder="Adults">
                                        @if ($errors->has('adult'))
                                            <span class="text-danger">{{ $errors->first('adult') }}</span>
                                        @endif
                                </div>
                                <div class="form-group mb_20">
                                    <label for="">Children</label>
                                    <input type="number" name="children" class="form-control" min="0" max="30" placeholder="Children">
                                      
                                </div>
                                <button type="submit" class="book-now">Add to Cart</button>
                            </form>
                        </div>

                        

                        <div class="widget">
                            <h2>Total</h2>
                            <div class="totalprice">
                               
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>
</div>

<!-- Include Date Range Picker and jQuery Scripts -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        const pricePerNight = {{ $roomDetails->price }};

        function calculateTotalPrice(startDate, endDate) {
            const start = moment(startDate, 'DD/MM/YYYY');
            const end = moment(endDate, 'DD/MM/YYYY');
            const nights = end.diff(start, 'days');
            return nights * pricePerNight;
        }

        $('input[name="checkin_checkout"]').daterangepicker({
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY',
                cancelLabel: 'Clear'
            },
            minDate: moment().startOf('day')
        });

        $('input[name="checkin_checkout"]').on('apply.daterangepicker', function(ev, picker) {
            const total = calculateTotalPrice(picker.startDate.format('DD/MM/YYYY'), picker.endDate.format('DD/MM/YYYY'));
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            $('.totalprice').text('$' + total);
        });

        $('input[name="checkin_checkout"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            $('.totalprice').text('');
        });
    });
</script>
@endsection