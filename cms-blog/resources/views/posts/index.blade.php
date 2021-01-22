@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <p class="lead m-0">All Posts</p>
                <a href="{{ route('posts.create') }}" class="btn btn-success">Add New</a>
            </div>
        </div>
        <div class="card-body">
            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="POST" id="deleteCategoryForm">
                        @method('DELETE')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="modalBody">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back
                                </button>
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        function handleDelete(cat_id, title) {
            document.getElementById('deleteCategoryForm').setAttribute('action', '/categories/' + cat_id);
            document.getElementById('modalBody').innerHTML = 'Are you sure want to delete this category: "' + title + '"';
        }
    </script>
@endsection

