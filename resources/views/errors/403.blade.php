@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __('Forbidden'))

@section('error_image')
  <!-- 403 SVG -->
  <svg width="314" height="171" viewBox="0 0 314 171" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M157 20V150C157 165 142 180 120 180H97C75 180 60 165 60 150V20" stroke="#1c64f2" stroke-width="2"
      fill="none" />
    <circle cx="157" cy="150" r="15" fill="#EEF2FF" stroke="#1c64f2" stroke-width="2" />
    <path d="M157 135V150" stroke="#1c64f2" stroke-width="3" />
    <path d="M120 120L194 46M194 120L120 46" stroke="#FF4D4F" stroke-width="4" stroke-linecap="round" />
  </svg>
@endsection

@section('main_message')
  <h5 class="md:text-xl text-lg leading-8 text-gray-900 font-medium mb-1.5">
    <span class="text-blue-600 font-semibold">@lang('Oops!')</span> @lang('Forbidden')
  </h5>
@endsection

@section('sub_message')
  <p class="text-sm text-gray-500">@lang("You don't have permission to access this page.")</p>
@endsection
