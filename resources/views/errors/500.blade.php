@extends('errors::minimal')

@section('title', __('Internal Server Error'))
@section('code', '500')
@section('message', __('Internal Server Error'))

@section('error_image')
  <!-- 500 SVG -->
  <svg width="314" height="171" viewBox="0 0 314 171" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M157 10L157 160.999L248 85.999L157 10Z" fill="#EEF2FF" stroke="#FF4D4F" stroke-width="2" />
    <path d="M157 60L157 90" stroke="#FF4D4F" stroke-width="3" stroke-linecap="round" />
    <circle cx="157" cy="60" r="3" fill="#FF4D4F" />
    <rect x="80" y="120" width="150" height="30" rx="5" fill="#EEF2FF" stroke="#1c64f2" stroke-width="2" />
    <path d="M100 150L130 150L130 170L100 170Z" fill="#FF4D4F" />
    <path d="M180 150L210 150L210 170L180 170Z" fill="#FF4D4F" />
  </svg>
@endsection

@section('main_message')
  <h5 class="md:text-xl text-lg leading-8 text-gray-900 font-medium mb-1.5">
    <span class="text-blue-600 font-semibold">@lang('Oops!')</span> @lang('Internal Server Error')
  </h5>
@endsection

@section('sub_message')
  <p class="text-sm text-gray-500">@lang("We're experiencing technical difficulties.")</p>
@endsection
