<div>
    <div class="card">
        <div class="card-header">
            <h4>
                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" wire:click="rest()"
                        data-bs-target="#teamModal">
                    Add New team
                </button>
            </h4>
        </div>
        <div wire:ignore.self class="modal fade" id="update" tabindex="-1" aria-labelledby="updatePortfolio"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateStudentModalLabel">Edit team</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="update()">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>الاسم</label>
                                <input type="text" wire:model="name" class="form-control">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label>الوظيفه</label>
                                    <input type="text" wire:model="job" class="form-control">
                                    @error('job') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                {{--                            <input type="text" wire:model="category" class="form-control">--}}
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label>مواقع التواصل</label>
                                    <input type="text" wire:model="links" class="form-control">
                                    @error('links') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                {{--                            <input type="text" wire:model="category" class="form-control">--}}
                            </div>
                            <div class="mb-3">
                                <label>الصوره</label>
                                <input type="file" wire:model="image"  class="form-control">
                                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div wire:ignore.self class="modal fade" id="deleteteam" tabindex="-1" aria-labelledby="deleteStudentModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteStudentModalLabel">Delete team</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                                aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="destroy">
                        <div class="modal-body">
                            <h4>Are you sure you want to delete this data ?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal"
                                    data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Yes! Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{--    Edit--}}
        {{--Show Photo--}}
        <div wire:ignore.self class="modal fade" id="show" tabindex="-1" aria-labelledby="deleteStudentModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteStudentModalLabel">Delete Slider</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <h4>team Photo ?</h4>
                        </div>
                        <div class="modal-body" style="text-align: center">

                            <img style=" width: 400px;height:400px;" src="{{asset('public/'.Storage::url($image))}}">

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal"
                                    data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-borderd table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>job</th>
                    <th>links</th>
                    <th>image</th>
                    <th>process</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($teams as $team)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->job }}</td>
                        <td>{{ $team->links }}</td>
                        <td><img style="width: 50px;height: 50px;"
                                 src="{{asset('public/'.Storage::url($team->image))}}"></td>

                        <td>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#update"
                                    wire:click="edit({{$team->id}})" class="btn btn-primary">
                                Edit
                            </button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteteam"
                                    wire:click="delete({{$team->id}})" class="btn btn-danger">Delete
                            </button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#show"
                                    wire:click="show({{$team->id}})" class="btn btn-success">
                                   show Photo
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No Record Found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div>
                {{--                                {{ $teachers->links() }}--}}
            </div>
        </div>
    </div>
    {{--    add --}}
    <div wire:ignore.self class="modal fade" id="teamModal" tabindex="-1"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create team</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            ></button>
                </div>
                <form wire:submit.prevent="store()">
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-12 col-md-4 mb-3">
                            <label>الاسم</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12 col-md-4  mb-3">
                            <div class="mb-3">
                                <label>الوظيفه</label>
                                <input type="text" wire:model="job" class="form-control">
                                @error('job') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            {{-- <input type="text" wire:model="category" class="form-control">--}}
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="mb-3">
                                <label>لينكات</label>
                                <input type="text" wire:model="links" class="form-control">
                                @error('links') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            {{--                            <input type="text" wire:model="category" class="form-control">--}}
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label>الصوره</label>
                            <input type="file" wire:model="image"  class="form-control">
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                </div>

            </div>
        </div>
    </div>


</div>

