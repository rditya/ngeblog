@extends('layouts.admin')

@section('admin')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Article</h1>
</div>

<div class="col-xl-12 col-md-12 mb-12">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row ">
                <div class="col-md-6 d-inline-block">
                    <h6 class="m-2 font-weight-bold text-primary">All Article</h6>

                </div>
                <div class="col-md-6 d-inline-block">
                    <div class="d-flex justify-content-end">
                        <a href="{{route('tambah-artikel')}}" class="btn btn-primary btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">New Article</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped display" id="dataTable" width="100%" cellspacing="5">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Article</th>
                            <th>Publish</th>
                            <th>Update</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<div id="ConfirmDelete" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header row">
                <div class="col-md-12">
                    
                    <div class="icon-box ">
                        <i class="material-icons ">&#xE5CD;</i>
                    </div>
                </div>
                <div class="col-md-12">
                    <h4 class="modal-title text-center">Delete this Article?</h4>	
                </div>			
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Click Delete for confirm or Cancel for dismiss</p>
			</div>
			<div class="d-flex justify-content-center">
				<button type="button" class="btn btn-info " data-dismiss="modal">Cancel</button>
                <button type="button" 
                onclick="event.preventDefault();
                document.getElementById('deleteItem').submit();" class="btn btn-danger">Delete</button>
                <form id="deleteItem" action="{{route('delete-artikel', $article ?? '' )}}" method="POST">
                    @csrf
                    @method('delete')
                </form>
			</div>
		</div>
	</div>
</div>   


@endsection