<?php

namespace App\Http\Livewire\Setting;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompanySetting extends Component
{ use WithFileUploads;
    public $name,
        $image,
        $address,
        $notes,
        $links,
        $tel,
        $email,
         $setting_id;

    public function render()
    {   $setting=\App\Models\CompanySetting::first();
        return view('livewire.setting.company-setting',compact('setting'));
    }
    public function mount(){

        $setting=\App\Models\CompanySetting::first();
        if($setting){
            $this->name=$setting->name;
            $this->address=$setting->address;
            $this->links=$setting->links;
            $this->tel=$setting->tel;
            $this->notes=$setting->notes;
            $this->email=$setting->email;
            $this->setting_id=$setting->id;
            $this->image=$setting->image;
        }

        //dd($this->setting_id);
    }

    protected function rules(){
        return
            [
                'name'=>'required',
                'email'=>'required',
            ];
    }

    protected $messages = [
        'required' => 'هذا الحقل مطلوب.',

    ];

    public function updated($fields){
        $this->validateOnly($fields);
    }



    public function store(){
            $this->validate();
       /// dd($this->all());
        $inputImage='';
        if($this->image){
            $inputImage=$this->image->store(auth('web')->user()->name,'public');
        }
\App\Models\CompanySetting::updateOrCreate([],
    [
        'name'=>$this->name,
        'image'=>$inputImage,
        'address'=>$this->address,
        'links'=>$this->links,
        'tel'=>$this->tel,
        'notes'=>$this->notes,
        'email'=>$this->email,
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),

    ]);
    session()->flash('success','تم الحفظ بنجاح');
    }
    public function show(){

        $setting=\App\Models\CompanySetting::first();
        $this->image=$setting->image;

    }
}
