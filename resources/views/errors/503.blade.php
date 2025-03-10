@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable'))

@section('error_image')
  <!-- 503 SVG -->
  <svg width="314" height="171" viewBox="0 0 314 171" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect x="70" y="30" width="174" height="120" rx="10" fill="#EEF2FF" stroke="#1c64f2" stroke-width="2" />
    <path d="M157 80L157 100" stroke="#1c64f2" stroke-width="3" />
    <circle cx="157" cy="80" r="5" fill="#1c64f2" />
    <path d="M130 50L174 50L174 94L130 94Z" fill="#1c64f2" />
    <path d="M152 72L152 94L130 94L130 72C130 66 136 60 142 60C148 60 154 66 154 72V72" stroke="#EEF2FF"
      stroke-width="2" />
  </svg>
@endsection

@section('main_message')
  <h5 class="md:text-xl text-lg leading-8 text-gray-900 font-medium mb-1.5">
    <span class="text-blue-600 font-semibold">@lang('Oops!')</span> @lang('Service Unavailable')
  </h5>
@endsection

@section('sub_message')
  <p class="text-sm text-gray-500">@lang("We're temporarily unavailable for maintenance.")</p>
@endsection
