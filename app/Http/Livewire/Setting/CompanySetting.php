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
        $facebook,
        $insta,
        $twiter,
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
            $this->facebook=$setting->facebook;
            $this->twiter=$setting->twiter;
            $this->insta=$setting->insta;
//            $this->image=$setting->image;
        }

        //dd($this->setting_id);
    }




    public function store(){

//        dd($this->all());
        $inputImage='';
        if($this->image){
            \App\Models\CompanySetting::updateOrCreate([],
                [
                    'name'=>$this->name,
                    'image'=>$this->image->store(auth('web')->user()->name,'public'),
                    'address'=>$this->address,
                    'links'=>$this->links,
                    'tel'=>$this->tel,
                    'notes'=>$this->notes,
                    'email'=>$this->email,
                    'facebook'=>$this->facebook,
                    'twiter'=>$this->twiter,
                    'insta'=>$this->insta,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),

                ]);
        }
        else{
\App\Models\CompanySetting::updateOrCreate([],
    [
        'name'=>$this->name,
        'address'=>$this->address,
        'links'=>$this->links,
        'tel'=>$this->tel,
        'notes'=>$this->notes,
        'email'=>$this->email,
        'facebook'=>$this->facebook,
        'twiter'=>$this->twiter,
        'insta'=>$this->insta,
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),

    ]);
    }
        session()->flash('success','تم الحفظ بنجاح');

    }
    public function show(){

        $setting=\App\Models\CompanySetting::first();
        $this->image=$setting->image;

    }
}
