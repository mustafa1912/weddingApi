<div>
    <div class="card">
        <div class="card-header">
            <h4>
                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#priceModal">
                    Add New price
                </button>
            </h4>
        </div>
        <div class="card-body">
            <table class="table table-borderd table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>price</th>
                    <th>discount</th>
                    <th>notes</th>
                    <th>image</th>
                    <th>process</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($prices as $price)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $price->name }}</td>
                        <td>{{ $price->price }}</td>
                        <td>{{ $price->discount }}</td>
                        <td>{{ $price->notes }}</td>
                        <td><img style="width: 50px;height: 50px;"
                                 src="{{asset('public/'.Storage::url($price->image))}}"></td>

                        <td>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#update"
                                    wire:click="edit({{$price->id}})" class="btn btn-primary">
                                Edit
                            </button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteslider"
                                    wire:click="delete({{$price->id}})" class="btn btn-danger">Delete
                            </button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#show"
                                    wire:click="show({{$price->id}})" class="btn btn-success">
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
    <div wire:ignore.self class="modal fade" id="priceModal" tabindex="-1"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create price</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                             ></button>
                </div>
                <form wire:submit.prevent="store()">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>الاسم</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>السعر</label>
                            <input type="text" wire:model="price" class="form-control">
                            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label>الخصم</label>
                                <input type="text" wire:model="discount" class="form-control">
                                @error('discount') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            {{--                            <input type="text" wire:model="category" class="form-control">--}}
                        </div>
                        <div class="mb-3">
                            <label>الصوره</label>
                            <input type="file" wire:model="image"  class="form-control">
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @foreach($inputs as $key=>$input)
                        <div class="mb-3">
                            <label>التفاصيل</label>
                            <input type="text" wire:model="inputs.{{$key}}.notes" class="form-control">

                        </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn bg-success hint--right"
                                        wire:click.prevent="addRow()"
                                        aria-label="اضف صف جديد" id="add">
                                    Add row
                                </button>
                                @if($key !=0)
                                    <button type="button" class="btn bg-danger hint--right"
                                            wire:click.prevent="removeRow({{$key}})"
                                            aria-label="حذف صف جديد" id="add">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                @endif
                            </div>
                         @endforeach

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
    {{--    delete--}}
    <div wire:ignore.self class="modal fade" id="deleteslider" tabindex="-1" aria-labelledby="deleteStudentModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStudentModalLabel">Delete Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroy">
                    <div class="modal-body">
                        <h4>Are you sure you want to delete this data ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
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
                            <label>السعر</label>
                            <input type="text" wire:model="price" class="form-control">
                            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label>الخصم</label>
                                <input type="text" wire:model="discount" class="form-control">
                                @error('discount') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            {{--                            <input type="text" wire:model="category" class="form-control">--}}
                        </div>
                        <div class="mb-3">
                            <label>الصوره</label>
                            <input type="file" wire:model="image"  class="form-control">
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @foreach($inputs as $key=>$input)
                            <div class="mb-3">
                                <label>التفاصيل</label>
                                <input type="text" wire:model="inputs.{{$key}}.notes" class="form-control">

                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn bg-success hint--right"
                                        wire:click.prevent="addRow()"
                                        aria-label="اضف صف جديد" id="add">
                                   Add row
                                </button>
                                @if($key !=0)
                                    <button type="button" class="btn bg-danger hint--right"
                                            wire:click.prevent="removeRow({{$key}})"
                                            aria-label="حذف صف جديد" id="add">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                @endif
                            </div>
                        @endforeach

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
                        <h4>price Photo ?</h4>
                    </div>
                    <div class="modal-body" style="text-align: center">

                        <img style=" width: 400px;height:400px;" src="{{asset('public/'.Storage::url($image))}}">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

