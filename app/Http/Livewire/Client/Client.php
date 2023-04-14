<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Livewire\WithFileUploads;

class Client extends Component
{

    use WithFileUploads;
    public $name, $address, $image, $notes, $clint_id;

    public function render()
    {

        $clients = \App\Models\Client::get();
        return view('livewire.client.client', compact('clients'));
    }

    protected function rules()
    {
        return
            [
                'name' => 'required',
                'image' => 'required|image',
                'address' => 'required',
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
        $this->address = '';
        $this->notes = '';
        $this->image = '';
    }

    function store()
    {
        $inputImage = '';
        if ($this->image) {
            $inputImage = $this->image->store(auth('web')->user()->name, 'public');
        }
        \App\Models\Client::create([
            'name' => $this->name,
            'address' => $this->address,
            'notes' => $this->notes,
            'image' => $inputImage

        ]);
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('success', 'تم الحفظ بنجاح');
    }

    function edit($id)
    {
        $clint = \App\Models\Client::find($id);
        $this->name = $clint->name;
        $this->address = $clint->address;
        $this->notes = $clint->notes;
        $this->clint_id = $clint->id;

    }

    function update($id)
    {
        $client = \App\Models\Client::find($id);
        $client->update([
            'name' => $this->name,
            'address' => $this->address,
            'notes' => $this->notes,

        ]);
        if ($this->image) {
            $client->update([
                'image' => $this->image->store(auth('web')->user()->name, 'public'),

            ]);
        }
        $this->refesh();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('success', 'تم الحفظ بنجاح');
    }
    function delete($id){

        $client = \App\Models\Client::find($id);
        $this->clint_id = $client->id;
        $client->delete();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('error', 'تم الحذف بنجاح');
    }function show($id){

        $client = \App\Models\Client::find($id);
        $this->image = $client->image;

        $this->dispatchBrowserEvent('close-modal');
        session()->flash('error', 'تم الحذف بنجاح');
    }
}
