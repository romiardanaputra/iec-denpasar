<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description">
    <title>Kursus Bahasa Inggris di Denpasar | IEC Denpasar</title>
    <meta name="description"
      content="IEC Denpasar menyediakan kursus bahasa Inggris profesional untuk anak, remaja, dan dewasa di Denpasar. Mulai dari program dasar hingga persiapan TOEFL.">
    <meta name="keywords"
      content="kursus bahasa inggris denpasar, les bahasa inggris denpasar, kursus toefl denpasar, kursus ielts denpasar, iec denpasar">
    <link rel="canonical" href="https://iecdps.com/kursus-bahasa-inggris-denpasar">

    <meta property="og:title" content="Kursus Bahasa Inggris di Denpasar | IEC Denpasar">
    <meta property="og:description"
      content="Belajar bahasa Inggris di IEC Denpasar dengan berbagai program kursus untuk anak, remaja, dan dewasa.">
    <meta property="og:image" content="https://iecdps.com/images/banner-kursus.jpg">
    <meta property="og:url" content="https://iecdps.com/kursus-bahasa-inggris-denpasar">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Kursus Bahasa Inggris di Denpasar | IEC Denpasar">
    <meta name="twitter:description"
      content="Daftar kursus bahasa Inggris di IEC Denpasar untuk semua tingkatan. Mulai dari program dasar hingga persiapan TOEFL.">
    <meta name="twitter:image" content="https://iecdps.com/images/banner-kursus.jpg">

    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/luvi-ui.css', 'resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    <main class="antialiased">
      {{ $slot }}
    </main>
  </body>
</html>
