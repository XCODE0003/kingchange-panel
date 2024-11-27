<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticlesResource\Pages;
use App\Filament\Resources\ArticlesResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticlesResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Статьи';
    protected static ?string $title = 'Статья';
    protected static ?string $modelLabel = 'Статья';
    protected static ?string $pluralLabel = 'Статьи';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make([
                    Forms\Components\Tabs::make('Tabs')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('EN')
                            ->schema([
                                Forms\Components\TextInput::make('title_en')
                                    ->label('Заголовок EN')
                                    ->required(),
                                Forms\Components\TextInput::make('subtitle_en')
                                    ->label('Подзаголовок EN'),
                                Forms\Components\RichEditor::make('content_en')
                                    ->label('Контент EN')
                                    ->required(),
                                Forms\Components\TextInput::make('metatitle_en')
                                    ->label('Meta Title EN'),
                                Forms\Components\TextInput::make('metadescription_en')
                                    ->label('Meta Description EN'),
                                Forms\Components\FileUpload::make('image_en')
                                    ->label('Изображение EN')
                                    ->image(),
                            ]),
                        Forms\Components\Tabs\Tab::make('RU')
                            ->schema([
                                Forms\Components\TextInput::make('title_ru')
                                    ->label('Заголовок RU')
                                    ->required(),
                                Forms\Components\TextInput::make('subtitle_ru')
                                    ->label('Подзаголовок RU'),
                                Forms\Components\RichEditor::make('content_ru')
                                    ->label('Контент RU')
                                    ->required(),
                                Forms\Components\TextInput::make('metatitle_ru')
                                    ->label('Meta Title RU'),
                                Forms\Components\TextInput::make('metadescription_ru')
                                    ->label('Meta Description RU'),
                                Forms\Components\FileUpload::make('image_ru')
                                    ->label('Изображение RU')
                                    ->image(),
                            ]),
                        Forms\Components\Tabs\Tab::make('UA')
                            ->schema([
                                Forms\Components\TextInput::make('title_ua')
                                    ->label('Заголовок UA')
                                    ->required(),
                                Forms\Components\TextInput::make('subtitle_ua')
                                    ->label('Подзаголовок UA'),
                                Forms\Components\RichEditor::make('content_ua')
                                    ->label('Контент UA')
                                    ->required(),
                                Forms\Components\TextInput::make('metatitle_ua')
                                    ->label('Meta Title UA'),
                                Forms\Components\TextInput::make('metadescription_ua')
                                    ->label('Meta Description UA'),
                                Forms\Components\FileUpload::make('image_ua')
                                    ->label('Изображение UA')
                                    ->image(),
                            ]),
                    ]),
                ])->columnSpanFull(),
                Forms\Components\DatePicker::make('date')
                    ->label('Дата')
                    ->native(false)
                    ->default(now())
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_en')
                    ->label('Заголовок EN'),
                Tables\Columns\TextColumn::make('title_ru')
                    ->label('Заголовок RU'),
                Tables\Columns\TextColumn::make('title_ua')
                    ->label('Заголовок UA'),
                Tables\Columns\ImageColumn::make('image_en')
                    ->label('Изображение EN'),
                Tables\Columns\ImageColumn::make('image_ru')
                    ->label('Изображение RU'),
                Tables\Columns\ImageColumn::make('image_ua')
                    ->label('Изображение UA'),
                Tables\Columns\TextColumn::make('date')
                    ->label('Дата'),
            ])
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticles::route('/create'),
            'edit' => Pages\EditArticles::route('/{record}/edit'),
        ];
    }
}
