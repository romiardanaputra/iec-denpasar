<x-filament::page>
  <x-slot name="header">
    <x-filament::header.heading>
      {{ __('Dashboard') }}
    </x-filament::header.heading>
  </x-slot>

  <x-filament::form wire:submit.prevent="applyFilters">
    <x-filament::form.section :schema="$this->getFiltersFormSchema()" />
    <x-filament::button type="submit" form="filters-form">
      {{ __('Apply Filters') }}
    </x-filament::button>
  </x-filament::form>

  <x-filament::widgets :widgets="$this->getWidgets()" />
</x-filament::page>
