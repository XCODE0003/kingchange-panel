<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Service\Easybit\getData as easybitData;

class easybitInfoWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $total_users = User::count();
        $easybit_info = (new easybitData())->index();

        return [
            Stat::make('Всего пользователей', $total_users),
            Stat::make('Объем обмена за текущий месяц', $easybit_info['exchangeVolume'] . ' USDT'),
            Stat::make('Наши комиссии на основе уровня аккаунта', $easybit_info['accountFee']),
            Stat::make('Дополнительная комиссия API, установленная вами', $easybit_info['apiExtraFee']),
            Stat::make('Общая комиссия для ваших пользователей', $easybit_info['totalFee']),
            Stat::make('Уровень аккаунта', $easybit_info['accountLevel']),
            Stat::make('Базовая комиссия', $easybit_info['current_fee'] . '%'),
            Stat::make('Текущая комиссия', $easybit_info['current_extra_fee'] . '%'),
            Stat::make('Полная комиссия', $easybit_info['total_fee'] . '%'),
        ];
    }
}
