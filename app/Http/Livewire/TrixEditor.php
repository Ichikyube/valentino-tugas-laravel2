<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TrixEditor extends Component
{
    public $value;
    public $trixId;

    public function upload()
    {
        if($this->hasFile('file')) {
            //get filename with extension
            $filenamewithextension = $this->file('file')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $this->file('file')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $this->file('file')->storeAs('public/uploads', $filenametostore);

            // you can save image path below in database
            $path = asset('storage/uploads/'.$filenametostore);

            echo $path;
            exit;
        }
    }
    public function store()
    {
        echo $this->input('content');
    }


    public function mount($value = ''){
        $this->value = $value;
        $this->trixId = 'trix-' . uniqid();
    }

    public function render()
    {
        return view('livewire.trix-editor');
    }
}
