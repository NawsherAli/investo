<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Driver;
class DriversTable extends Component
{
    
    use WithPagination;

    public function render()
    {
        $drivers = Driver::paginate(1); // Adjust the pagination as needed
        return view('livewire.drivers-table', compact('drivers'));
    }
   
}
