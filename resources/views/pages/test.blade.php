@extends('layouts.layout')
@section('content')
@foreach($departures as $departure)
    @if ($loop->last)
        @foreach($departure as $item)

    {{--        {{$item['id'] }} => '{{$item['name'] }}',<br>--}}

        @endforeach
    @endif
@endforeach

<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">Slide 1</div>
        <div class="swiper-slide">Slide 2</div>
        <div class="swiper-slide">Slide 3</div>
        <div class="swiper-slide">Slide 4</div>
        <div class="swiper-slide">Slide 5</div>
        <div class="swiper-slide">Slide 6</div>
        <div class="swiper-slide">Slide 7</div>
        <div class="swiper-slide">Slide 8</div>
        <div class="swiper-slide">Slide 9</div>
        <div class="swiper-slide">Slide 10</div>
        <div class="swiper-slide">Slide 11</div>
        <div class="swiper-slide">Slide 12</div>
        <div class="swiper-slide">Slide 13</div>
        <div class="swiper-slide">Slide 14</div>
        <div class="swiper-slide">Slide 15</div>
    </div>
    <div class="swiper-pagination"></div>
</div>

<style>
    .swiper-slide {
        width: 200px;
        height: 400px;
        background: #ccc;
    }
</style>
@endsection

