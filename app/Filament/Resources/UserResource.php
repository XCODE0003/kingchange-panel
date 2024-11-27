<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Пользователи';
    protected static ?string $title = 'Пользователь';
    protected static ?string $modelLabel = 'Пользователь';
    protected static ?string $pluralLabel = 'Пользователи';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('username')
                    ->label('Имя пользователя')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->label('Пароль')
                    ->required()
                    ->password()
                    ->maxLength(255),
                Forms\Components\TextInput::make('referral_id')
                    ->label('Реферальный ID')
                    ->maxLength(255),
                Forms\Components\Select::make('referred_by')
                    ->label('Пригласил')
                    ->options(User::all()->pluck('username', 'id'))
                    ->searchable()
                    ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('username')
                    ->label('Имя пользователя')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('referral_id')
                    ->label('Реферальный ID')
                    ->default('Не указано')
                    ->copyable()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('referrer.username')
                    ->label('Пригласил')
                    ->default('Не указано')
                    ->copyable()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('joined_at')
                    ->label('Дата регистрации')
                    ->dateTime()
                    ->sortable(),
            ])->defaultSort('joined_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
