<div>
    <div class="card">
        <div class="card-header">
            <h4>
                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#sliderModal">
                    Add New PortFolio
                </button>
            </h4>
        </div>
        <div class="card-body">
            <table class="table table-borderd table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Address</th>
                    <th>category</th>
                    <th>date</th>
                    <th>image</th>
                    <th>process</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($portfolios as $portfolio)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $portfolio->main_address }}</td>
                        <td>{{ $portfolio->category }}</td>
                        <td>{{ $portfolio->date }}</td>
                        <td><img style="width: 50px;height: 50px;"
                                 src="{{asset('public/'.Storage::url($portfolio->image))}}"></td>

                        <td>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#update"
                                    wire:click="edit({{$portfolio->id}})" class="btn btn-primary">
                                Edit
                            </button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteslider"
                                    wire:click="delete({{$portfolio->id}})" class="btn btn-danger">Delete
                            </button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#show"
                                    wire:click="show({{$portfolio->id}})" class="btn btn-success">
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
    <div wire:ignore.self class="modal fade" id="sliderModal" tabindex="-1"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            wire:click="closeModal"></button>
                </div>
                <form wire:submit.prevent="store()">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>العنوان</label>
                            <input type="text" wire:model="main_address" class="form-control">
                            @error('main_address') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>التصنيف</label>
                            <select  wire:model="category" class='form-control'>
                                <option value="" hidden>اختر التصنيف</option>
@foreach($categouries as $categoury)
                                <option value="{{$categoury->name}}">{{$categoury->name}}</option>
@endforeach
                            </select>
{{--                            <input type="text" wire:model="category" class="form-control">--}}
                            @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>الصوره</label>
                            <input type="file" wire:model="image" accept="image/*" class="form-control">
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>التاريخ</label>
                            <input type="date" wire:model="date" class="form-control">
                            @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                                data-bs-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{--    delete--}}
    <div wire:ignore.self class="modal fade" id="deleteslider" tabindex="-1" aria-labelledby="deleteStudentModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStudentModalLabel">Delete Slider</h5>
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
    <div wire:ignore.self class="modal fade" id="update" tabindex="-1" aria-labelledby="updatePortfolio"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStudentModalLabel">Edit Portfolio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                            aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="update()">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>العنوان</label>
                            <input type="text" wire:model="main_address" class="form-control">
                            @error('main_address') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>التصنيف</label>
                            <select  wire:model="category">
                                <option value="" >اختر التصنيف</option>
                                @foreach($categouries as $categoury)
                                <option value="{{$categoury->name}}">{{$categoury->name}}</option>
@endforeach
                            </select>
                            {{--                            <input type="text" wire:model="category" class="form-control">--}}
                            @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>الصوره</label>
                            <input type="file" accept="image/*" wire:model="image" class="form-control">
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>التاريخ</label>
                            <input type="date" wire:model="date" class="form-control">
                            @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                                data-bs-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save</button>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                            aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <h4>portFolio Photo ?</h4>
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

</div>
