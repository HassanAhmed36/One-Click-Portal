<!--Page header-->
<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title"><span class="font-weight-normal text-muted ms-2">Designations</span></h4>
    </div>
    <div class="page-rightheader ms-md-auto">
        <div class="d-flex align-items-end flex-wrap my-auto end-content breadcrumb-end">
            <div class="btn-list">
                <a href="#" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#newtaskmodal"><i
                        class="feather feather-plus fs-15 my-auto me-2"></i>Add New Designations</a>
            </div>
        </div>
    </div>
</div>
<!--End Page header-->
<!-- Row -->
<div class="row">
    <div class="col-xl-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header  border-0">
                <h4 class="card-title">All Registered Designations</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom text-center" id="responsive-datatable">
                        <thead>
                        <tr>
                            <th class="border-bottom-0">S.No</th>
                            <th class="border-bottom-0">Designation Name</th>
                            <th class="border-bottom-0">Created At</th>
                            <th class="border-bottom-0">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Designations as $Designation)
                            <tr>
                                <td>{{ $Designation->id }}</td>
                                <td class="">{{ $Designation->Designation_Name }}</td>
                                <td class="">{{ $Designation->created_at }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('Delete.Designation', ['Role_ID' => $Designation->id]) }}" class="action-btns1 mx-2" data-bs-toggle="tooltip"
                                           data-bs-placement="top" title="Delete Designation"><i
                                                class="feather feather-trash-2 btn btn-danger"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="newtaskmodal">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="{{ route('Post.Designation') }}" method="POST" class="needs-validation was-validated">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Designation</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Add Designation</label>
                                <input class="form-control" placeholder="Enter a Department" name="Designation_Name" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">Add Designation</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- New Task Modal -->
