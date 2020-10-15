<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class ExportController extends Controller
{

    function export($type)
    {
        $customer_data = DB::table('contacts')->get()->toArray();
        $customer_array[] = array('ID','名前', 'メールアドレス', '電話番号', '住所', '連絡方法', '性別', '内容','登録日時');
        foreach($customer_data as $customer)
        {
            $customer_array[] = array(
                'ID'  => strval($customer->id),
                '名前'  => $customer->name,
                'メールアドレス'   => $customer->email,
                '電話番号'    => $customer->phone,
                '住所'  => $customer->address,
                '連絡方法'   => $customer->type,
                '性別'   => $customer->gender,
                '内容'   => $customer->message,
                '登録日時'   => $customer->created_at

            );
        }
        Excel::create('Customer Data', function($excel) use ($customer_array){
            $excel->setTitle('Customer Data');
            $excel->sheet('Customer Data', function($sheet) use ($customer_array){
                $sheet->fromArray($customer_array, null, 'A1', false, false);
            });
        })->download($type);
    }

    function excel() {
        $this->export('xls');
    }

    function csv() {
        $this->export('csv');
    }

}

?>
