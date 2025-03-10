@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))

@section('error_image')
  <!-- 401 SVG -->
  <svg width="314" height="171" viewBox="0 0 314 171" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M157 20C219 20 257 80 257 150H57C57 80 95 20 157 20Z" fill="#EEF2FF" stroke="#1c64f2" stroke-width="2" />
    <circle cx="157" cy="150" r="30" fill="white" stroke="#1c64f2" stroke-width="2" />
    <path d="M127 120L187 40M187 120L127 40" stroke="#FF4D4F" stroke-width="4" stroke-linecap="round" />
  </svg>
@endsection

@section('main_message')
  <h5 class="md:text-xl text-lg leading-8 text-gray-900 font-medium mb-1.5">
    <span class="text-blue-600 font-semibold">@lang('Oops!')</span> @lang('Unauthorized')
  </h5>
@endsection

@section('sub_message')
  <p class="text-sm text-gray-500">@lang('You need to sign in to access this page.')</p>
@endsection
