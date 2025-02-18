<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroImageResource\Pages;
use App\Filament\Resources\HeroImageResource\RelationManagers;
use App\Helper\Helper;
use App\Models\HeroImage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Outerweb\FilamentImageLibrary\Filament\Forms\Components\ImageLibraryPicker;

class HeroImageResource extends Resource
{
    protected static ?string $model = HeroImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ImageLibraryPicker::make('images')->multiple()->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('images')->getStateUsing(function ($record) {
                    return Helper::GetImageUrl($record->images[0]);
                })
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
            'index' => Pages\ListHeroImages::route('/'),
            'create' => Pages\CreateHeroImage::route('/create'),
            'edit' => Pages\EditHeroImage::route('/{record}/edit'),
        ];
    }
}
