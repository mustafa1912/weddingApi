<?php

namespace App\Http\Livewire\Price;

use Livewire\Component;
use Livewire\WithFileUploads;

class Price extends Component
{
    use WithFileUploads;
    public $image,$price,$discount,$name,$price_id;
    public $inputs=[['notes'=>'']];


    public function render()
    {  $prices=\App\Models\Price::select('*')->with(['description' => function ($q) {
        $q->select('id', 'price_id', 'notes')
            ->where('id', 'price_id');

               }])->get();

    //dd($prices);
        return view('livewire.price.price',compact('prices'));
    }
    public function addRow(){
        $this->inputs []=['notes'=>''];
    }
    public function removeRow($index){
        unset($this->inputs[$index]);
        $this->inputs=array_values($this->inputs);
    }

    protected function rules(){
        return
            [
                'name'=>'required',
                'price'=>'required',
                'image'=>'required|image',
                'discount'=>'required',
            ];
    }

    protected $messages = [
        'required' => 'هذا الحقل مطلوب.',

    ];

    public function updated($fields){
        $this->validateOnly($fields);
    }

    public function rest(){
        $this->name='';
        $this->price='';
        $this->image='';
        $this->discount='';


    }

    public function store(){

       $this->validate();

        //dd($this->all());
        $price=\App\Models\Price::create([
            'price'=>$this->price,
            'discount'=>$this->discount,
            'image'=>$this->image->store(auth('web')->user()->name,'public'),
        ]);
        foreach ($this->inputs as $key=>$input) {
            \App\Models\description::create([
                'price_id'=>$price->id,
                'notes'=>$input['notes']
            ]);
        };
        $this->inputs=[];
        $this->rest();
        session()->flash('success','تم بنجاح');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function edit($id){
        $Prices=\App\Models\Price::find($id);
        $this->name=$Prices->name;
        $this->price=$Prices->price;
        $this->discount=$Prices->discount;
        $this->price_id=$id;
        foreach ($this->inputs as $key=>$input){
            $this->inputs[$key]['notes']=$Prices->notes;
        }
    }
    public function update(){
        $Portfolio= \App\Models\Price::find($this->price_id);
        foreach ($this->inputs as $key=>$input) {
            if($this->image){
            $Portfolio->update([
                'name' => $this->name,
                'price' => $this->price,
                'discount' => $this->discount,
                'image' => $this->image->store(auth('web')->user()->name, 'public'),
                'notes' => $input['notes']
            ]);
            }
            else{
                $Portfolio->update([
                    'name' => $this->name,
                    'price' => $this->price,
                    'discount' => $this->discount,
                    'notes' => $input['notes']
                ]);
            }
        }
        if ($this->image) {
            $Portfolio->update([
                'image' => $this->image->store(auth('web')->user()->name, 'public'),

            ]);
        }



        $this->dispatchBrowserEvent('close-modal');
        session()->flash('success','تم الحفظ بنجاح');
    }



    public function delete($id){
        $PortFolios=\App\Models\Price::find($id);
        $this->price_id=$id;
    }

    public function destroy(){
        \App\Models\Price::where('id',$this->price_id)->delete();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('success','تم الحذف بنجاح');
    }

    public function show($id){
        $PortFolios=\App\Models\Price::find($id);
        $this->image=$PortFolios->image;

    }


}
