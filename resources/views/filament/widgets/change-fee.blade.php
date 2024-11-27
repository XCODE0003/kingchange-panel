<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-medium">Комиссия сервиса</h2>
            </div>

            <x-filament::modal>
                <x-slot name="trigger">
                    <x-filament::button>
                        Изменить комиссию
                    </x-filament::button>
                </x-slot>

                <x-slot name="heading">
                    Изменение комиссии
                </x-slot>

                <form wire:submit="changeFee">
                    <label class="fi-wi-stats-overview-stat-label text-sm font-medium text-gray-500 dark:text-gray-400" for="extra_fee">Комиссия (%) </label>
                    <x-filament::input.wrapper >
                        <x-filament::input wire:model="extra_fee" />
                    </x-filament::input.wrapper>
                    <x-filament::button  type="submit" class="mt-3">
                        Сохранить
                    </x-filament::button>
                </form>
            </x-filament::modal>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
