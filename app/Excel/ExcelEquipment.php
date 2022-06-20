<?php

namespace Vanguard\Excel;
 
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
use Excel;

class ExcelEquipment implements FromCollection, WithHeadings
{
    use Exportable;

    private $equipments = [];

    public function __construct($data)
    {
        foreach ($data as $item) {    
            $this->equipments[] = array($item->parent_quipment->value ?? "", $item->equipment_id ?? "", $item->parent_brand->value ?? "", $item->purchase_date ? getDateFormat($item->purchase_date) : "", $item->year ?? "");
        }
    }

    public function collection()
    {
        return collect($this->equipments);
    }

    public function headings(): array
    {
        return [
            'Equipment Type',
            'Equipment Id',
            'Brand',
            'Purchased Date',
            'Year'
        ];
    }
}