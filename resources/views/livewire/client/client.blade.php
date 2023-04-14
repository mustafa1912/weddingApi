<div>
    <div class="card">
        <div class="card-header">
            <h4>
                <button type="button" class="btn btn-primary float-end" wire:click="refesh" data-bs-toggle="modal"
                        data-bs-target="#clientModal">
                    Add New client
                </button>
            </h4>
        </div>
        <div class="card-body">
            <table class="table table-borderd table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>address</th>
                    <th>notes</th>
                    <th>image</th>
                    <th>process</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($clients as $client)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->address }}</td>
                        <td>{{ $client->notes }}</td>
                        <td><img style="width: 50px;height: 50px;"
                                 src="{{asset('public/'.Storage::url($client->image))}}"></td>

                        <td>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#update"
                                    wire:click="edit({{$client->id}})" class="btn btn-primary">
                                Edit
                            </button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteslider"
                                    wire:click="delete({{$client->id}})"  onclick="return confirm('Are you sure you want to delete?');"class="btn btn-danger">Delete
                            </button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#show"
                                    wire:click="show({{$client->id}})" class="btn btn-success">
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
{{--            <div>--}}
{{--                                                {{ $clients->links() }}--}}
{{--            </div>--}}
        </div>
    </div>
    {{--    add --}}
    <div wire:ignore.self class="modal fade" id="clientModal" tabindex="-1"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create price</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            wire:click="closeModal"></button>
                </div>
                <form wire:submit.prevent="store" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>الاسم</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label>العنوان</label>
                                <input type="text" wire:model="address" class="form-control">
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>الصوره</label>
                            <input type="file" wire:model="image" accept="image/*"  class="form-control">
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                            <div class="mb-3">
                                <label>التفاصيل</label>
                                <input type="text" wire:model="notes" class="form-control">

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
{{--    <div wire:ignore.self class="modal fade" id="deleteslider" tabindex="-1" aria-labelledby="deleteStudentModalLabel"--}}
{{--         aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-lg">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="deleteStudentModalLabel">Delete Slider</h5>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"--}}
{{--                            aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <form wire:submit.prevent="delete({{$clint_id}})">--}}
{{--                    <div class="modal-body">--}}
{{--                        <h4>Are you sure you want to delete this data ?{{$clint_id}}</h4>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-secondary"--}}
{{--                                data-bs-dismiss="modal">Close</button>--}}
{{--                        <button type="submit" class="btn btn-primary">Yes! Delete</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--        Edit--}}

    <div wire:ignore.self class="modal fade" id="update" tabindex="-1" aria-labelledby="updatePortfolio"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStudentModalLabel">Edit Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                            aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="update({{$clint_id}})">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>الاسم</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label>العنوان</label>
                                <input type="text" wire:model="address" class="form-control">
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>الصوره</label>
                            <input type="file" wire:model="image"  class="form-control">
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                            <div class="mb-3">
                                <label>التفاصيل</label>
                                <input type="text" wire:model="notes" class="form-control">

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

{{--    Show Photo--}}
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
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</div>

