<div>
    <div class="card">
        <div class="card-header">
            <h4>
                <button type="button" class="btn btn-primary float-end" wire:click="refesh" data-bs-toggle="modal"
                        data-bs-target="#categouryModal">
                    Add categoury
                </button>
            </h4>
        </div>
        <div class="card-body">
            <table class="table table-borderd table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>

                    <th>process</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($categouries as $categoury)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $categoury->name }}</td>

                        <td>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#update"
                                    wire:click="edit({{$categoury->id}})" class="btn btn-primary">
                                Edit
                            </button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                    wire:click="delete({{$categoury->id}})"  class="btn btn-danger">Delete
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
    <div wire:ignore.self class="modal fade" id="categouryModal" tabindex="-1"
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
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel"
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
                <form wire:submit.prevent="update()">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>الاسم</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
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

{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</div>

