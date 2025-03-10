@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))

@section('error_image')
  <!-- 429 SVG (Shield + Stop Sign) -->
  <svg width="314" height="171" viewBox="0 0 314 171" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M157 20C219 20 257 80 257 150H57C57 80 95 20 157 20Z" fill="#EEF2FF" stroke="#1c64f2" stroke-width="2" />
    <circle cx="157" cy="150" r="30" fill="white" stroke="#1c64f2" stroke-width="2" />
    <path d="M157 100L157 120" stroke="#1c64f2" stroke-width="3" />
    <circle cx="157" cy="100" r="5" fill="#1c64f2" />
    <path d="M130 50L174 50L174 94L130 94Z" fill="#FF4D4F" />
  </svg>
@endsection

@section('main_message')
  <h5 class="md:text-xl text-lg leading-8 text-gray-900 font-medium mb-1.5">
    <span class="text-blue-600 font-semibold">@lang('Oops!')</span> @lang('Too Many Requests')
  </h5>
@endsection

@section('sub_message')
  <p class="text-sm text-gray-500">@lang("You've exceeded your request limit. Try again later.")</p>
@endsection
