<?php

namespace Vanguard\Excel;
 
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
use Excel;

class ExcelCustomer implements FromCollection, WithHeadings
{
    use Exportable;

    private $customers = [];

    public function __construct($data)
    {
        foreach ($data as $item) {
            
            $this->customers[] = array($item->company_name, $item->customer_name, $item->customer_phone, $item->email, $item->job, $item->address);
        }
    }

    public function collection()
    {
        return collect($this->customers);
    }

    public function headings(): array
    {
        return [
            'Company Name',
            'Customer Name',
            'Customer Phone',
            'Email',
            'Job',
            'Address'
        ];
    }
}