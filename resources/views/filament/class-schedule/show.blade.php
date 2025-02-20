<x-filament::page>
  <x-filament::card>
    <h2 class="text-xl font-bold">Detail Jadwal Kelas</h2>
    <div class="mt-4">
      <p><strong>Nama Program:</strong> {{ $record->program->name }}</p>
      <p><strong>Nama Buku:</strong> {{ $record->book->book_name }}</p>
      <p><strong>Kode Jam Kelas:</strong>
        {{ $record->time ? "{$record->time->time_code} ({$record->time->time_start} - {$record->time->time_end})" : '-' }}
      </p>
      <p><strong>Kode Hari Kelas:</strong>
        {{ $record->day ? "{$record->day->day_code} ({$record->day->day_name})" : '-' }}</p>
      <p><strong>Kode Kelas:</strong> {{ $record->class_code }}</p>
      <p><strong>Dibuat Pada:</strong> {{ $record->created_at->format('d M Y H:i') }}</p>
    </div>
  </x-filament::card>
</x-filament::page>
