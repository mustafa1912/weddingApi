<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{

    public $email,$password;
    public function render()
    {
        return view('livewire.admin.login');
    }
    protected function rules(){
        return
            [
                'email'=>'required|exists:users,email',
                'password'=>'required|min:5',
            ];
    }

    protected $messages = [
        'email.required' => 'هذا الحقل مطلوب.',
        'email.exists' => 'هذا الايميل ليس صحيح.',
        'password.required' => 'هذا الحقل مطلوب.',
        'password.min' => 'الباسورد يجب الا يقل عن 5 احرف او 5 ارقام',
    ];

    public function updated($fields){
        $this->validateOnly($fields);
    }


    public function login(){

        $this->validate();
        $email = $this->email;
        $password = $this->password;
        $credentials = ['email'=>$email, 'password'=>$password];

        if(auth('web')->attempt($credentials)){
            $flash=  session()->flash('success','مرحبا ' . auth('web')->user()->name  );
            return  redirect()->route('dashboard')->with($flash);

        }
        if(Hash::check($password,auth('web')->attempt(['password'=>$password]))){
            session()->flash('error','الباسورد ليس صحيح 😕');
        }
        else{
            $flash=  session()->flash('error','الباسورد ليس صحيح 😕 ');
            return  redirect()->route('admin.login')->with( $flash);
        }

    }

}
