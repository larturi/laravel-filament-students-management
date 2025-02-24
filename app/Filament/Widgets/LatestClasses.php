<?php

namespace App\Filament\Widgets;

use App\Models\Classes;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestClasses extends BaseWidget
{
    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Classes::query()
                    ->latest()
                    ->limit(5)
            )
            ->paginated(false)
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('sections.name')->badge(),
                TextColumn::make('students_count')->counts('students')->badge(),
                TextColumn::make('created_at')->since(),
            ]);
    }
}
