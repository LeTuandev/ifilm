<div class="modal fade" id="cinemasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" class="update-or-create">
                @csrf
                <div class="modal-body">
                    <div>
                        <label for="cinemaName" class="label-cinema">Cinema Name</label>
                        <input type="text" name="name" class="form-control bg-light border-0 small" placeholder="Cinema Name..." aria-label="Search" aria-describedby="basic-addon2" id="cinemaName">
                    </div>
                    <div class="mt-5">
                        <label for="address" class="label-address">Address</label>
                        <input type="text" name="address" class="form-control bg-light border-0 small" placeholder="Address ..." aria-label="Search" aria-describedby="basic-addon2" id="address">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="d-none btn btn-sm shadow-sm btn-save" type="submit"><i class="fa fa-download" aria-hidden="true"></i>Save</button>
                    <button  class="d-none btn btn-sm shadow-sm btn-add" type="submit"><i class="fas fa-solid fa-plus"></i> Create new</button>
                </div>
            </form>
        </div>
    </div>
</div>
