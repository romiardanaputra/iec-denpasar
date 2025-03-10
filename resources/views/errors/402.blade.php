@extends('errors::minimal')

@section('title', __('Payment Required'))
@section('code', '402')
@section('message', __('Payment Required'))

@section('error_image')
  <!-- 402 SVG (Payment Lock + Coin) -->
  <svg width="314" height="171" viewBox="0 0 314 171" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M157 20C219 20 257 80 257 150H57C57 80 95 20 157 20Z" fill="#EEF2FF" stroke="#1c64f2" stroke-width="2" />
    <circle cx="157" cy="150" r="30" fill="white" stroke="#1c64f2" stroke-width="2" />
    <path d="M157 100L157 120" stroke="#1c64f2" stroke-width="3" />
    <circle cx="157" cy="100" r="5" fill="#1c64f2" />
    <path d="M140 70L174 70L174 114L140 114Z" fill="#FFD700" /> <!-- Coin -->
    <path d="M157 70L157 114" stroke="#1c64f2" stroke-width="2" stroke-linecap="round" /> <!-- Lock -->
  </svg>
@endsection

@section('main_message')
  <h5 class="md:text-xl text-lg leading-8 text-gray-900 font-medium mb-1.5">
    <span class="text-blue-600 font-semibold">@lang('Oops!')</span> @lang('Payment Required')
  </h5>
@endsection

@section('sub_message')
  <p class="text-sm text-gray-500">@lang('This service requires payment to continue.')</p>
@endsection
