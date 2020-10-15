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
            if ($customer->type == '1') {
                $customer->type = '電話番号';
            } elseif ($customer->type == '0') {
                $customer->type = 'メールアドレス';
            } elseif ($customer->type == '1,0') {
                $customer->type = '電話番号、メールアドレス';
            } else $customer->type = NULL;

            $customer_array[] = array(
                'ID'  => strval($customer->id),
                '名前'  => $customer->name,
                'メールアドレス'   => $customer->email,
                '電話番号'    => $customer->phone,
                '住所'  => $customer->address,
                '連絡方法'   => $customer->type,
                '性別'   => $customer->gender,
                '内容'   => $customer->message,
                '登録日時'   => $customer->created_at,
            );
        }
        ob_end_clean();
        ob_start();
        Excel::create('お問い合わせ履歴_'.date('Ymd'), function($excel) use ($customer_array){
            $excel->setTitle('お問い合わせ履歴');
            $excel->sheet('お問い合わせ履歴', function($sheet) use ($customer_array){
                $sheet->fromArray($customer_array, null, 'A1', false, false);
            });
        })->download($type);
    }

    function excel() {
        $this->export('xlsx');
    }

    function csv() {
        $this->export('csv');
    }

}

?>
