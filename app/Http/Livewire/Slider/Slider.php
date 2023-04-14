<?php

namespace App\Http\Livewire\Slider;

use Livewire\Component;
use Livewire\WithFileUploads;

class Slider extends Component
{
    use WithFileUploads;
    public $address, $notes, $image, $slider_id;

    public function render()
    {
        $sliders = \App\Models\slider::get();
        return view('livewire.slider.slider', compact('sliders'));
    }

    protected function rules()
    {
        return
            [
                'address' => 'required',
                'image' => 'required|image',
            ];
    }

    protected $messages = [
        'required' => 'هذا الحقل مطلوب.',

    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function rest()
    {
        $this->address = '';
        $this->notes = '';
        $this->image = '';
    }

    public function closeModal()
    {
        $this->rest();
    }

    public function store()
    {

        $this->validate();

        \App\Models\slider::create([
            'address' => $this->address,
            'notes' => $this->notes,
            'image' => $this->image->store(auth('web')->user()->name, 'public'),
        ]);
        $this->rest();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('success', 'تم الحفظ بنجاح');

    }

    public function edit($id)
    {
        $sliders = \App\Models\slider::find($id);
        $this->address = $sliders->address;
        $this->notes = $sliders->notes;

        $this->slider_id = $id;
    }

    public function update()
    {

        $slider = \App\Models\slider::find($this->slider_id);


        $slider->update([
            'address' => $this->address,
            'notes' => $this->notes,

        ]);
        if ($this->image) {
            $slider->update([
                'image' => $this->image->store(auth('web')->user()->name, 'public'),

            ]);
        }

        $this->dispatchBrowserEvent('close-modal');
        session()->flash('success','تم الحفظ بنجاح');


    }

    public function delete($id)
    {
        $sliders = \App\Models\slider::find($id);
        $this->slider_id = $id;
    }

    public function destroy()
    {
        \App\Models\slider::where('id', $this->slider_id)->delete();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('success', 'تم الحذف بنجاح');
    }
    public function show($id){
        $sliders=\App\Models\slider::find($id);
        $this->image=$sliders->image;

    }
}
