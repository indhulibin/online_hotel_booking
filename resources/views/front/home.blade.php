@extends('front.layout.app')
@section('main_content')

    <div class="slider">
        <div class="slide-carousel owl-carousel">

            @foreach($slide_all as $item)
                <div class="item" style="background-image:url({{ asset('uploads/'.$item->photo) }});">
                    <div class="bg"></div>
                    <div class="text">
                        <h2>{{ $item->heading }}</h2>
                        <p>
                            {!! $item->text !!}
                        </p>
                        <div class="button">
                            <a href="{{$item->button_url}}">{{ $item->button_text }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
     
 
    <div class="search-section">
        <div class="container">
            <form action="{{ route('cart_submit') }}" method="post">
                @csrf
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select name="room_id" class="form-select">
                                    <option value="">Select Room</option>
                                    @foreach($room_all as $itemRoom)
                                    <option value="{{ $itemRoom->id }}">{{ $itemRoom->name }}</option>
                                    @endforeach  
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="Checkin & Checkout" readonly>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="number" name="adult" class="form-control" min="1" max="30" placeholder="Adults">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="number" name="children" class="form-control" min="0" max="30" placeholder="Children">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <div class="home-feature">
        <div class="container">
            <div class="row">
                @foreach($feature_all as $itemFeature)
                    <div class="col-md-3">
                        <div class="inner">
                            <div class="icon"><i class="{{ $itemFeature->icon }}"></i></div>
                            <div class="text">
                                <h2>{{ $itemFeature->heading }}</h2>
                                <p>
                                    {{ $itemFeature->text }}
                                </p>
                            </div>
                        </div>
                    </div>  
                @endforeach          
            </div>
        </div>
    </div>



    <div class="home-rooms">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main-header">Rooms and Suites</h2>
                </div>
            </div>
            <div class="row">
                @foreach($room_all as $itemRoom)
                @if($loop->iteration>4)
                @break;
                @endif
                <div class="col-md-3">
                    <div class="inner">
                        <div class="photo">
                            <img src="{{ asset('uploads/'.$itemRoom->featured_photo) }}" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="{{ route('room',$itemRoom->id) }}">{{ $itemRoom->name }}</a></h2>
                            <div class="price">
                                ${{ $itemRoom->price }}/night
                            </div>
                            <div class="button">
                                <a href="{{ route('room',$itemRoom->id) }}" class="btn btn-primary">See Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="big-button">
                        <a href="{{ route('allrooms') }}" class="btn btn-primary">See All Rooms</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="testimonial" style="background-image: url(uploads/slide2.jpg)">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main-header">Our Happy Clients</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-carousel owl-carousel">
                        @foreach($testimonial_all as $itemTestimonial)
                            <div class="item">
                                <div class="photo">
                                    <img src="{{ asset('uploads/'.$itemTestimonial->photo) }}" alt="">
                                </div>
                                <div class="text">
                                    <h4>{{ $itemTestimonial->name }}</h4>
                                    <p>{{ $itemTestimonial->designation }}</p>
                                </div>
                                <div class="description">
                                    <p>
                                        {!! $itemTestimonial->comment !!}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="blog-item">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main-header">Latest Posts</h2>
                </div>
            </div>
          
            <div class="row">
                @foreach($post_all as $itemPost)
                    <div class="col-md-4">
                        <div class="inner">
                            <div class="photo">
                                <img src="{{ asset('uploads/'.$itemPost->photo) }}" alt="">
                            </div>
                            <div class="text">
                                <h2><a href="{{ route('post',$itemPost->id) }}">{{ $itemPost->heading }}</a></h2>
                                <div class="short-des">
                                    <p>
                                    {!! $itemPost->short_content !!}
                                    </p>
                                </div>
                                <div class="button">
                                    <a href="{{ route('post',$itemPost->id) }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>  
                @endforeach             
            </div>
           
        </div>
    </div>
<!-- Flash error message default-->
@if($errors->any())
@foreach($errors->all() as $error)
    <script>
        iziToast.error({
            title:'',
            position:'topRight',
            message:'{{ $error }}'
        });
    </script>
@endforeach
@endif



{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const bookedDates = @json($booked_dates);
    
        const disabledDates = bookedDates.reduce((acc, date) => {
            if (!acc[date.room_id]) {
                acc[date.room_id] = [];
            }
            acc[date.room_id].push(date.booking_date);
            return acc;
        }, {});
    
        // Initialize date picker without any restrictions
        $('.daterange1').daterangepicker({
            autoUpdateInput: false,  // Ensure input is not auto-populated
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
    
        // Handle room selection change event
        document.querySelector('select[name="room_id"]').addEventListener('change', function() {
            const roomId = this.value;
            const $datePicker = $('.daterange1');
    
            if (roomId && disabledDates[roomId]) {
                $datePicker.daterangepicker({
                    minDate: moment().startOf('day'), // Disable previous dates
                    isInvalidDate: function(date) {
                        return disabledDates[roomId].includes(date.format('DD/MM/YYYY'));
                    },
                    locale: {
                        format: 'DD/MM/YYYY'
                    }
                });
    
               
            } else {
                // Reset the date picker if no room is selected
                $datePicker.daterangepicker({
                    minDate: moment().startOf('day'), // Disable previous dates
                    locale: {
                        format: 'DD/MM/YYYY'
                    }
                });
            }
        });
    });
</script>  --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const bookedDates = @json($booked_dates);
    
        const disabledDates = bookedDates.reduce((acc, date) => {
            if (!acc[date.room_id]) {
                acc[date.room_id] = [];
            }
            acc[date.room_id].push(date.booking_date);
            return acc;
        }, {});
    
        // Initialize date picker without any restrictions
        $('.daterange1').daterangepicker({
            autoUpdateInput: false,  // Ensure input is not auto-populated
            locale: {
                cancelLabel: 'Clear',
                format: 'DD/MM/YYYY'
            },
            minDate: moment().startOf('day')  // Disable previous dates
        });
    
        $('.daterange1').on('apply.daterangepicker', function(ev, picker) {
            const roomId = document.querySelector('select[name="room_id"]').value;
            const startDate = picker.startDate.format('DD/MM/YYYY');
            const endDate = picker.endDate.format('DD/MM/YYYY');
    
            if (roomId && disabledDates[roomId]) {
                const unavailableDates = disabledDates[roomId];
    
                // Check if any date in the selected range is unavailable
                let isUnavailable = false;
                for (let date = picker.startDate.clone(); date.isSameOrBefore(picker.endDate); date.add(1, 'days')) {
                    if (unavailableDates.includes(date.format('DD/MM/YYYY'))) {
                        isUnavailable = true;
                        break;
                    }
                }
    
                if (isUnavailable) {
                    alert("One or more dates in the selected range are unavailable. Please choose different dates.");
                    $(this).val('');  // Clear the input field
                } else {
                    $(this).val(startDate + ' - ' + endDate);
                }
            } else {
                $(this).val(startDate + ' - ' + endDate);
            }
        });
    
        $('.daterange1').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');  // Clear the input field on cancel
        });
    
        // Handle room selection change event
        document.querySelector('select[name="room_id"]').addEventListener('change', function() {
            const roomId = this.value;
            const $datePicker = $('.daterange1');
    
            if (roomId && disabledDates[roomId]) {
                $datePicker.daterangepicker({
                
                    minDate: moment().startOf('day'), // Disable previous dates
                    isInvalidDate: function(date) {
                        return disabledDates[roomId].includes(date.format('DD/MM/YYYY'));
                    },
                    locale: {
                        cancelLabel: 'Clear',
                        format: 'DD/MM/YYYY'
                    }
                });
            } else {
                // Reset the date picker if no room is selected
                $datePicker.daterangepicker({
                   
                    minDate: moment().startOf('day'), // Disable previous dates
                    locale: {
                        cancelLabel: 'Clear',
                        format: 'DD/MM/YYYY'
                    }
                });
            }
    
            // Ensure the date range input remains empty on room selection change
            $datePicker.val('');
        });
    });
    </script>

<script>
    $(function() {
        $('.daterange1').daterangepicker({
            autoUpdateInput: false,  // Ensure input is not auto-populated
            locale: {
                format: 'DD/MM/YYYY'
            },
            minDate: moment().startOf('day'), // Disable previous days
            // Add additional options as needed
        });
    });
</script>
@endsection