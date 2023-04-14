<?php

namespace App\Http\Livewire\Categoury;

use Livewire\Component;

class Categoury extends Component
{ public $name,$categoury_id;
    public function render()
    {  $categouries=\App\Models\Categoury::get();
        return view('livewire.categoury.categoury',compact('categouries'));
    }
    protected function rules()
    {
        return
            [
                'name' => 'required',

            ];
    }

    protected $messages = [
        'required' => 'هذا الحقل مطلوب.',

    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    function refesh()
    {
        $this->name = '';

    }

    function store()
    {

        \App\Models\Categoury::create([
            'name' => $this->name,


        ]);
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('success', 'تم الحفظ بنجاح');
    }

    function edit($id)
    {
        $categoury= \App\Models\Categoury::find($id);
        $this->name = $categoury->name;
        $this->categoury_id=$id;


    }

    function update()
    {
        $categoury = \App\Models\Categoury::find($this->categoury_id);
        $categoury->update([
            'name' => $this->name,


        ]);

        $this->refesh();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('success', 'تم الحفظ بنجاح');
    }
    function delete($id){


        $this->categoury_id = $id;

    }function destroy(){
        $categoury = \App\Models\Categoury::find($this->categoury_id);
        $categoury->delete();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('error', 'تم الحذف بنجاح');
    }


}
