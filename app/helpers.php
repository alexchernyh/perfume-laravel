<?php 


    use App\Models\Option;

    /**
    * Функция текущего времени относительно часового пояса
    *
    * @format STRING
    * @tz STRING
    * @UTC_offset BOOL
    *
    * @format = 'H:i:s, d.m.Y';
    * @tz = 'Europe/Moscow';
    * @UTC_offset = true, get UTC format offset from date
    *
    **/
    if(!function_exists('get_time_with_UTC_offset')) {
        function get_time_with_UTC_offset($format, $tz, $utc_offset) {
            
            $timestamp = time();
            $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string

            if ($utc_offset) {
                $offset = $dt->getOffset()/60/60;
                $diff = " (UTC" . ($offset > 0 ? "+":"") . $offset . ")";
            } else {
                $diff='';
            }
            
            $dt->setTimestamp($timestamp); 
            return $dt->format($format) . $diff;
        }
    }


    /*Вывод отформатированной суммы без десятичных */ 
    if(!function_exists('formatSum')) {
        function formatSum($sum) {
            return number_format($sum, 0, "", "");
        }
    }

    /*
        Вывод общих данных на сайте
    */

    if(!function_exists('getSiteOptions')) {
        function getSiteOptions($option_name) {
            // $options = Option::all()->toArray();
            
            $option = Option::where('option_name', $option_name)->value('option_value');

            if($option) {
                /*$arr = [];
                foreach ($options as $option) {
                    $arr[$option['option_name']] = $option['option_value'];
                } */
                return $option;   
            }

            return false;
        }    
    }    
    

        
    