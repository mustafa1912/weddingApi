<?php

namespace App\Http\Livewire\Team;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;

class TeamComponent extends Component
{
    use WithFileUploads;
    public $image,$name,$job,$links,$team_id;
    public function render()
    {
        $teams=Team::get();
        return view('livewire.team.team-component',compact('teams'));
    }
    protected function rules(){
        return
            [
                'name'=>'required',
                'job'=>'required',
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
        $this->image='';
        $this->job='';
        $this->links='';


    }

    public function store(){

        $this->validate();
        $inputImage = '';
        if ($this->image) {
            $inputImage = $this->image->store(auth('web')->user()->name, 'public');
        }
           Team::create([
                'name'=>$this->name,
                'job'=>$this->job,
                'links'=>$this->links,
                'image'=>$inputImage

            ]);
        $this->rest();
        session()->flash('success','تم بنجاح');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function edit($id){
        $team=Team::find($id);
        $this->name=$team->name;
        $this->links=$team->links;
        $this->job=$team->job;
        $this->team_id=$id;

    }
    public function update(){

//dd($this->all());
        Team::where('id',$this->team_id)->update([
                    'name' => $this->name,
                    'job'=>$this->job,
                    'links'=>$this->links,
                ]);
           if($this->image){
               Team::where('id',$this->team_id)->update([
                'image'=>$this->image->store(auth('web')->user()->name, 'public')
               ]);

           }

        $this->dispatchBrowserEvent('close-modal');
        session()->flash('success','تم التعديل بنجاح');
    }



    public function delete($id){

        $this->team_id=$id;
    }

    public function destroy(){
        Team::where('id',$this->team_id)->delete();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('success','تم الحذف بنجاح');
    }

    public function show($id){
        $PortFolios=Team::find($id);
        $this->image=$PortFolios->image;

    }

}
