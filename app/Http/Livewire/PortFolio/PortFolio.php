<?php

namespace App\Http\Livewire\PortFolio;

use Livewire\Component;
use Livewire\WithFileUploads;

class PortFolio extends Component
{

    use WithFileUploads;
    public $main_address,$category,$image,$portfolio_id,$date;
    public function render()
    {
        $portfolios=\App\Models\Portfolio::get();
        $categouries=\App\Models\Categoury::get();
        return view('livewire.port-folio.port-folio',compact('portfolios','categouries'));
    }
    protected function rules(){
        return
            [
                'main_address'=>'required',
                'image'=>'required|image',
                'category'=>'required',
            ];
    }

    protected $messages = [
        'required' => 'هذا الحقل مطلوب.',

    ];
    public function mount(){
        $this->date=date('Y-m-d');
    }
    public function updated($fields){
        $this->validateOnly($fields);
    }

    public function rest(){
        $this->main_address='';
        $this->image='';
        $this->category='';
        $this->date=date('Y-m-d');
    }
    public function closeModal(){
        $this->rest();
    }

    public function store(){
       // dd($this->main_address);
         if($this->date){
        $this->validate();
        \App\Models\Portfolio::create([
            'main_address'=>$this->main_address,
            'category'=>$this->category,
            'date'=>$this->date,
            'image'=>$this->image->store(auth('web')->user()->name,'public'),
        ]);
        $this->rest();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('success','تم الحفظ بنجاح');
              }
         else{
             \App\Models\Portfolio::create([
                 'main_address'=>$this->main_address,
                 'category'=>$this->category,
                 'date'=>date('Y-m-d'),
                 'image'=>$this->image->store(auth('web')->user()->name,'public'),
             ]);
             $this->rest();
             $this->dispatchBrowserEvent('close-modal');
             session()->flash('success','تم الحفظ بنجاح');
         }
    }
    public function edit($id){
        $PortFolios=\App\Models\Portfolio::find($id);
        $this->main_address=$PortFolios->main_address;
        $this->category=$PortFolios->category;
        $this->date=$PortFolios->date;
        $this->image=$PortFolios->image;
        $this->portfolio_id=$id;
    }
    public function update(){
        $Portfolio= \App\Models\Portfolio::find($this->portfolio_id);
        $Portfolio->update([
            'main_address'=>$this->main_address,
            'category'=>$this->category,
            'date'=>$this->date,
        ]);

        if ($this->image) {
            $Portfolio->update([
                'image' => $this->image->store(auth('web')->user()->name, 'public'),

            ]);
        }



            $this->dispatchBrowserEvent('close-modal');
            session()->flash('success','تم الحفظ بنجاح');
        }



    public function delete($id){
        $PortFolios=\App\Models\Portfolio::find($id);
        $this->portfolio_id=$id;
    }

    public function destroy(){
        \App\Models\Portfolio::where('id',$this->portfolio_id)->delete();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('success','تم الحذف بنجاح');
    }

    public function show($id){
        $PortFolios=\App\Models\Portfolio::find($id);
        $this->image=$PortFolios->image;

    }

}
