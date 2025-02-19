@section('js_custom')
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
  <script>
    document.addEventListener('livewire:navigated', function() {
      console.log('trigered')
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth';
      });
      calendar.render();
    });
  </script>
@endsection

<div>
  <div id="calendar"></div>
</div>
