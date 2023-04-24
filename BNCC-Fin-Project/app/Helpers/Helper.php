<?php
    namespace App\Helpers;

    class Helper {
        public static function InvoiceGenerator($model, $throw, $length=4, $prefix){
            $data = $model::orderBy('id', 'desc')->first();
            if(!$data){
                $og_length = $length;
                $last_number = '';
            }else{
                $code = substr($data->$throw, strlen($prefix)+1);
                $actual_last_number = ($code/1)*1;
                $increment_last_num = $actual_last_number+1;
                $last_number_length = strlen($increment_last_num);
                $og_length = $length - $last_number_length;
                $last_number = $increment_last_num;
            }
            $zeros = "";
            for( $i = 0; $i < $og_length; $i++){
                $zeros .= "0";
            }
            return $prefix.'-'.$zeros.$last_number;
        }
        
    }

?>