<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PastPapersResource\Pages;
use App\Filament\Resources\PastPapersResource\RelationManagers;
use App\Filament\Resources\PastPapersResource\RelationManagers\SubjectRelationManager;
use App\Filament\Resources\SubjectResource\RelationManagers\PastPaperRelationManager;
use App\Models\GradeClass;
use App\Models\PastPapers;
use App\Models\Subject;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PastPapersResource extends Resource
{
    protected static ?string $model = PastPapers::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Paper Details')->schema([
                    TextInput::make('title'),
                    DatePicker::make('year'),
                    TextInput::make('price'),
                    Select::make('subjectId')->options(Subject::all()->pluck('name' , 'id'))->label('Subject'),
                    Select::make('classId')->options(GradeClass::all()->pluck('name' , 'id'))->label('Grade'),
                    FileUpload::make('paper_url')->disk('public')->directory('papers')->label("Paper"),
                ])->columns(2),



            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('price'),
                TextColumn::make('paper_url'),

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
            SubjectRelationManager::class

            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPastPapers::route('/'),
            'create' => Pages\CreatePastPapers::route('/create'),
            'edit' => Pages\EditPastPapers::route('/{record}/edit'),
        ];
    }
}
