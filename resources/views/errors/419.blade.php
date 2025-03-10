@extends('errors::minimal')

@section('title', __('Session Expired'))
@section('code', '419')
@section('message', __('Session Expired'))

@section('error_image')
  <!-- 419 SVG (Clock with Error) -->
  <svg width="314" height="171" viewBox="0 0 314 171" fill="none" xmlns="http://www.w3.org/2000/svg">
    <circle cx="157" cy="85.5" r="60" fill="#EEF2FF" stroke="#1c64f2" stroke-width="2" />
    <path d="M157 25L157 146" stroke="#1c64f2" stroke-width="3" />
    <path d="M157 85.5L120 58.5" stroke="#1c64f2" stroke-width="3" />
    <path d="M157 85.5L130 85.5" stroke="#1c64f2" stroke-width="3" />
    <path d="M157 85.5L174 114" stroke="#FF4D4F" stroke-width="4" stroke-linecap="round" />
  </svg>
@endsection

@section('main_message')
  <h5 class="md:text-xl text-lg leading-8 text-gray-900 font-medium mb-1.5">
    <span class="text-blue-600 font-semibold">@lang('Oops!')</span> @lang('Session Expired')
  </h5>
@endsection

@section('sub_message')
  <p class="text-sm text-gray-500">@lang('Your session has expired. Please log in again.')</p>
@endsection
