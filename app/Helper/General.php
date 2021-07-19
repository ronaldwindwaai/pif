<?php

use Illuminate\Support\Facades\DB;

class General
{
    public static function getEnumValues(String $table, String $column): Array
    {
        $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach (explode(',', $matches[1]) as $value) {
            $v = trim($value, "'");
            $enum[] = $v;
        }
        return $enum;
    }

    public static function getMeetingDatesTime(String $dates): Array
    {
        $array_dates = [];

        $array = explode('_',$dates);
        $start_date_time = explode(' ', $array[0]);
        $end_date_time = explode(' ', $array[1]);

        $array_dates = [
            'start_date'    =>  $start_date_time[0],
            'start_time'    =>  $start_date_time[1],
            'end_date'      =>  $end_date_time[0],
            'end_time'      =>  $end_date_time[1],
        ];

        return $array_dates;
    }

    public static function getTableColumnNames(String $table): Array
    {
        return DB::getSchemaBuilder()->getColumnListing($table);
    }
}
