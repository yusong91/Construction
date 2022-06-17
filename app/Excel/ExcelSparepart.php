<?php

namespace Vanguard\Excel;
 
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
use Excel;

class ExcelSparepart implements FromCollection, WithHeadings
{
    use Exportable;

    private $spareparts = [];

    public function __construct($data)
    {
        foreach ($data as $item) {
            
            $this->spareparts[] = array($item->name, $item->quantity, $item->unit, '$'.$item->unit_price, '$'.$item->amount);
        }
    }

    public function collection()
    {
        return collect($this->spareparts);
    }

    public function headings(): array
    {
        return [
            'Name',
            'Quantity',
            'Unit',
            'Unit Price',
            'Amount'
        ];
    }
}