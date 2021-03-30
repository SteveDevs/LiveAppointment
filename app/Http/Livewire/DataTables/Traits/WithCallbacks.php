<?php

namespace App\Http\Livewire\DataTables\Traits;
namespace App\Http\Livewire\DataTables\Traits;

use Illuminate\Support\Facades\DB;

trait WithCallbacks
{
    public function edited($value, $table, $column, $rowId)
    {
        DB::table($table)
            ->where('id', $rowId)
            ->update([$column => $value]);

        $this->emit('fieldEdited', $rowId);
    }
}
