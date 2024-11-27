<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Filament\Notifications\Notification;
use App\Service\Easybit\getData as easybitData;
use App\Service\Easybit\setData;

class ChangeFee extends Widget
{
    public $extra_fee;

    public $data;
    protected static string $view = 'filament.widgets.change-fee';

    public function mount()
    {
        $this->data = (new easybitData())->index();
        $this->extra_fee = $this->data['current_extra_fee'];
    }

    public function changeFee()
    {
        if(!is_numeric($this->extra_fee)) {
            Notification::make()
                ->title('Комиссия должна быть числом')
                ->danger()
                ->send();
            return;
        }
        if($this->extra_fee > 100) {
            Notification::make()
                ->title('Комиссия не может быть больше 100%')
                ->danger()
                ->send();
            return;
        }
    
        $this->data = (new setData())->index($this->extra_fee);
        Notification::make()
            ->title('Комиссия успешно обновлена')
            ->success()
            ->send();
    }
}
