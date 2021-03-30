<?php 
namespace App\Traits;
use DB;

trait EnumValue
{
    public function getEnumColumnValues($table, $column)
    {
        $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type ;

        preg_match('/^enum\((.*)\)$/', $type, $matches);

        $enum_values = array();
        foreach( explode(',', $matches[1]) as $value )
        {
          $v = trim( $value, "'" );
          $enum_values = array_add($enum_values, $v, $v);
        }
        return $enum_values;
    }

}