<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentsExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    public function __construct(public Collection $records)
    {
        //
    }

    public function collection()
    {
        return $this->records;
    }

    public function map($record): array
    {
        return [
            $record->id,
            $record->name,
            $record->email,
            $record->class->name,
            $record->section->name,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Class',
            'Section',
        ];
    }
}
