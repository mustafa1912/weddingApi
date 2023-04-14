<?php

namespace App\Http\Livewire\Artical;

use App\Models\Artical;
use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArticalComponent extends Component
{
    use WithFileUploads;
    public $category,
        $image,
        $address,
        $notes,
        $date,
        $artical_id;

    public function render()
    {
        $articals=Artical::get();
        return view('livewire.artical.artical-component',compact('articals'));
    }
    public function mount(){
        $this->date=date('Y-m-');
    }

    protected function rules(){
        return
            [
                'category'=>'required',
                'address'=>'required',
            ];
    }

    protected $messages = [
        'required' => 'هذا الحقل مطلوب.',

    ];

    public function updated($fields){
        $this->validateOnly($fields);
    }

    public function rest(){
        $this->image='';
        $this->category='';
        $this->address='';
        $this->notes='';
        $this->date='';
    }

    public function store(){

        $this->validate();
        $inputImage = '';
        if ($this->image) {
            $inputImage = $this->image->store(auth('web')->user()->name, 'public');
        }

        Artical::create([
            'category'=>$this->category,
            'address'=>$this->address,
            'notes'=>$this->notes,
            'date'=>$this->date,
            'image'=>$inputImage

        ]);
        //dd($this->all());
        $this->rest();
        session()->flash('success','تم بنجاح');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function edit($id){
        $Artical=Artical::find($id);
        $this->category=$Artical->category;
        $this->notes=$Artical->notes;
        $this->date=$Artical->date;
        $this->address=$Artical->address;
        $this->artical_id=$id;

    }
    public function update(){

//dd($this->all());
        Artical::where('id',$this->artical_id)->update([
            'category'=>$this->category,
            'address'=>$this->address,
            'notes'=>$this->notes,
            'date'=>$this->date,
        ]);
        if($this->image){
            Artical::where('id',$this->artical_id)->update([
                'image'=>$this->image->store(auth('web')->user()->name, 'public')
            ]);

        }

        $this->dispatchBrowserEvent('close-modal');
        session()->flash('success','تم التعديل بنجاح');
    }



    public function delete($id){

        $this->artical_id=$id;
    }

    public function destroy(){
        Artical::where('id',$this->artical_id)->delete();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('success','تم الحذف بنجاح');
    }

    public function show($id){
        $PortFolios=Artical::find($id);
        $this->image=$PortFolios->image;

    }

}
