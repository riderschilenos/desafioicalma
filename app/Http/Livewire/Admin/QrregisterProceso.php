<?php

namespace App\Http\Livewire\Admin;

use App\Models\Qrregister;
use Livewire\Component;

class QrregisterProceso extends Component
{   
    

    public function mount(Qrregister $qrregister){

    $this->qrregister=$qrregister;
    
    }

    public function render()
    {
        return view('livewire.admin.qrregister-proceso');
    }

    public function procesomas(Qrregister $qrregister){

        
        if($qrregister->proceso<6){
            $qrregister->proceso=$qrregister->proceso+1;
            $qrregister->save();
            $this->qrregister=$qrregister;
            return redirect()->route('admin.qrregister.index');
        }else{
            return redirect()->route('admin.qrregister.index');
        }
       

    }
    public function procesomenos(Qrregister $qrregister){

        
        if($qrregister->proceso>1){
            $qrregister->proceso=$qrregister->proceso-1;
            $qrregister->save();
            $this->qrregister=$qrregister;
            return redirect()->route('admin.qrregister.index');
        }
       

    }
}
