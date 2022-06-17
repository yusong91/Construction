<?php

namespace Vanguard\Excel;
 
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
use Excel;

class ExcelInventory implements FromCollection, WithHeadings
{
    use Exportable;

    private $nventories = [];

    public function __construct($data)
    {
        foreach ($data as $item) {
            
            $this->nventories[] = array($item->name, $item->parent_category->value ?? "", $item->parent_warehouse->name ?? "", $item->quantity, $item->unit,  '$'.$item->price, '$'. ($item->price + $item->quantity), $item->purchased_date ? getDateFormat($item->purchased_date) : '', $item->menufacture, $item->vender);
        }
    }

    public function collection()
    {
        return collect($this->nventories);
    }

    public function headings(): array
    {
        return [
            'Name',
            'Category',
            'Warehouse',
            'Quantity',
            'Unit',
            'Unit Price',
            'Amount',
            'Purchased Date',
            'Menufacture',
            'Vender'
        ];
    }
}