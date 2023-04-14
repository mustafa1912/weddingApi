<div>
<form wire:submit.prevent="store()">
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
            {{--                            <input type="text" wire:model="category" class="form-control">--}}
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label>موافع التواصل</label>
                <input type="text" wire:model="links" class="form-control">
                @error('links') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            {{--                            <input type="text" wire:model="category" class="form-control">--}}
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label>التفاصيل</label>
                <input type="text" wire:model="notes" class="form-control">
                @error('notes') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            {{--                            <input type="text" wire:model="category" class="form-control">--}}
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label>التلفون</label>
                <input type="number" wire:model="tel" class="form-control">
                @error('tel') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            {{--                            <input type="text" wire:model="category" class="form-control">--}}
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label>الايميل</label>
                <input type="email" wire:model="email" class="form-control">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
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
<button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#show" wire:click="show()">showPhoto</button>

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
