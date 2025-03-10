@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Page Not Found'))

@section('error_image')
  <!-- 404 SVG (Lost Robot Searching) -->
  <svg width="314" height="171" viewBox="0 0 314 171" fill="none" xmlns="http://www.w3.org/2000/svg">
    <!-- Robot Body -->
    <rect x="120" y="40" width="74" height="70" rx="10" fill="#EEF2FF" stroke="#1c64f2" stroke-width="2" />

    <!-- Robot Arms -->
    <path d="M90 80L105 80C105 80 105 80 105 80" stroke="#1c64f2" stroke-width="3" />
    <path d="M224 80L239 80C239 80 239 80 239 80" stroke="#1c64f2" stroke-width="3" />

    <!-- Robot Head -->
    <circle cx="157" cy="60" r="20" fill="#EEF2FF" stroke="#1c64f2" stroke-width="2" />
    <circle cx="147" cy="60" r="3" fill="#1c64f2" />
    <circle cx="167" cy="60" r="3" fill="#1c64f2" />
    <path d="M157 65L157 70" stroke="#1c64f2" stroke-width="2" />

    <!-- Search Icon -->
    <circle cx="157" cy="120" r="15" fill="#EEF2FF" stroke="#1c64f2" stroke-width="2" />
    <path d="M157 105L157 135" stroke="#1c64f2" stroke-width="3" />
    <circle cx="157" cy="135" r="3" fill="#1c64f2" />

    <!-- Lost Path -->
    <path d="M50 140Q100 100 157 100Q214 100 264 140" stroke="#1c64f2" stroke-width="2" stroke-dasharray="4" />
  </svg>
@endsection

@section('main_message')
  <h5 class="md:text-xl text-lg leading-8 text-gray-900 font-medium mb-1.5">
    <span class="text-blue-600 font-semibold">@lang('Oops!')</span> @lang('Page Not Found')
  </h5>
@endsection

@section('sub_message')
  <p class="text-sm text-gray-500">@lang("The page you're looking for doesn't exist. Let's find a new path!")</p>
@endsection
