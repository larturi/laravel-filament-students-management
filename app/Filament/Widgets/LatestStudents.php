<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestStudents extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Student::query()
                    ->latest()
                    ->with('class', 'section')
                    ->limit(5)
            )
            ->paginated(false)
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('class.name')->badge(),
                TextColumn::make('section.name')->badge(),
                TextColumn::make('created_at')->since(),
            ]);
    }
}
