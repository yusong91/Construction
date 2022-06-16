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
        //foreach ($suspiciouses as $item) {
            
            $equipment = array('test1'=>'test', 'test2'=>'test');

            $this->equipments[] = $equipment;
        //}
    }

    public function collection()
    {
        return collect($this->equipments);
    }

    public function headings(): array
    {
        return [
            'Name',
            'Song',
        ];
    }
}