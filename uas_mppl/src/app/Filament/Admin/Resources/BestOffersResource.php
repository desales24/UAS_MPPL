<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BestOffersResource\Pages;
use App\Models\BestOffers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BestOffersResource extends Resource
{
    protected static ?string $model = BestOffers::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Best Offers';
    protected static ?string $modelLabel = 'Best Offer';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nama Menu')
                ->maxLength(255)
                ->required(),

            Forms\Components\TextInput::make('price')
                ->label('Harga')
                ->numeric()
                ->required()
                ->prefix('Rp'),

            Forms\Components\Textarea::make('description')
                ->label('Deskripsi')
                ->rows(4)
                ->maxLength(1000),

            Forms\Components\FileUpload::make('image')
                ->label('Gambar')
                ->image()
                ->directory('best-offers')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->width(60),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Menu')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->money('IDR', true)
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(40)
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diubah')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBestOffers::route('/'),
            'create' => Pages\CreateBestOffers::route('/create'),
            'edit' => Pages\EditBestOffers::route('/{record}/edit'),
        ];
    }
}
