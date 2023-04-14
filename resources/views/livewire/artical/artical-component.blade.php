<div>
    <div class="card">
        <div class="card-header">
            <h4>
                <button type="button" class="btn btn-primary float-end"  data-bs-toggle="modal" wire:click="rest()"
                        data-bs-target="#articalModal">
                    Add New artical
                </button>
            </h4>
        </div>
{{--        edit--}}
        <div wire:ignore.self class="modal fade" id="update" tabindex="-1" aria-labelledby="updatePortfolio"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateStudentModalLabel">Edit artical</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="update()">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>category</label>
                                <input type="text" wire:model="category" class="form-control">
                                @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label>address</label>
                                    <input type="text" wire:model="address" class="form-control">
                                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                {{--                            <input type="text" wire:model="category" class="form-control">--}}
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label>notes</label>
                                    <input type="text" wire:model="notes" class="form-control">
                                    @error('notes') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                {{--                            <input type="text" wire:model="category" class="form-control">--}}
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label>date</label>
                                    <input type="date" wire:model="date" class="form-control">
                                    @error('date') <span class="text-danger">{{ $message }}</span> @enderror
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
{{--        delete--}}
        <div wire:ignore.self class="modal fade" id="deleteteam" tabindex="-1" aria-labelledby="deleteStudentModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteStudentModalLabel">Delete artical</h5>
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
                            <h4>artical Photo ?</h4>
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
                    <th>category</th>
                    <th>address</th>
                    <th>notes</th>
                    <th>date</th>
                    <th>image</th>
                    <th>process</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($articals as $artical)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $artical->category }}</td>
                        <td>{{ $artical->address }}</td>
                        <td>{{ $artical->notes }}</td>
                        <td>{{ $artical->date }}</td>
                        <td><img style="width: 50px;height: 50px;"
                                 src="{{asset('public/'.Storage::url($artical->image))}}"></td>

                        <td>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#update"
                                    wire:click="edit({{$artical->id}})" class="btn btn-primary">
                                Edit
                            </button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteteam"
                                    wire:click="delete({{$artical->id}})" class="btn btn-danger">Delete
                            </button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#show"
                                    wire:click="show({{$artical->id}})" class="btn btn-success">
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
    <div wire:ignore.self class="modal fade" id="articalModal" tabindex="-1"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create artical</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    ></button>
                </div>
                <form wire:submit.prevent="store()">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>category</label>
                            <input type="text" wire:model="category" class="form-control">
                            @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label>address</label>
                                <input type="text" wire:model="address" class="form-control">
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            {{--                            <input type="text" wire:model="category" class="form-control">--}}
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label>notes</label>
                                <input type="text" wire:model="notes" class="form-control">
                                @error('notes') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            {{--                            <input type="text" wire:model="category" class="form-control">--}}
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label>date</label>
                                <input type="date" wire:model="date" class="form-control">
                                @error('date') <span class="text-danger">{{ $message }}</span> @enderror
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
</div>


</div>

