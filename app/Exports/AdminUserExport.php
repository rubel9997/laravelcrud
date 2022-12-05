<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class AdminUserExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{

    public function collection()
    {

        return User::select('id','Name','Username','Email','Created_at','Updated_at')->get();
    }

    public function headings(): array
    {
        return [
            'Sl No',
            'Name',
            'Username',
            'Email',
            'Created at',
            'Updated at',
        ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

}