@extends('layouts.master')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
<!-- Sweetalerts CSS -->
<link rel="stylesheet" href="{{asset('build/assets/libs/sweetalert2/sweetalert2.min.css')}}">



@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-4 text-primary">Parents</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Parents List</h5>
                        <a href="{{ route('guardians.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add New Parents
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="subjectsDataTable" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Father's Name</th>
                                    <th>Father's Phone</th>
                                    <th>Father's Civil ID</th>
                                    <th>Mother's Name</th>
                                    <th>Mother's Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guardians as $guardian)
                                <tr>
                                    <td>{{ $guardian->id }}</td>
                                    <td>{{ $guardian->father_name }}</td>
                                    <td>{{ $guardian->father_phone }}</td>
                                    <td>{{ $guardian->father_civil_id }}</td>
                                    <td>{{ $guardian->mother_name }}</td>
                                    <td>{{ $guardian->mother_phone }}</td>
                                    <td>

                                        <a href="{{route('guardians.edit', $guardian->id)}}"
                                            class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger delete-btn"
                                            data-id="{{ $guardian->id }}" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
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
</div>


@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<!-- Datatables Cdn -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- Internal Datatables JS -->
@vite('resources/assets/js/datatables.js')
<!-- Sweetalerts JS -->
<script src="{{asset('build/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
@vite('resources/assets/js/sweet-alerts.js')

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        showConfirmButton: true,
        timer: 3000 // Optional: auto-close after 3 seconds
    });
</script>

@endif
<script>
    $(document).ready(function() {
        console.log("Document is ready!"); // Debugging

        // Handle delete button click
        $(document).on('click', '.delete-btn', function() {
            const guardianId = $(this).data('id'); // Get Guardian ID from button data
            const deleteUrl = `{{ url('guardians') }}/${guardianId}`; // Construct the delete URL

            console.log("Delete button clicked, ID:", guardianId); // Debugging

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, make the delete request
                    $.ajax({
                        url: deleteUrl,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}', // CSRF token for security
                        },
                        success: function(response) {
                            console.log("Guardian deleted successfully:", response); // Debugging
                            Swal.fire(
                                'Deleted!',
                                'The guardian has been deleted.',
                                'success'
                            ).then(() => {
                                location.reload(); // Reload the page after deletion
                            });
                        },
                        error: function(xhr) {
                            console.error("Error deleting guardian:", xhr); // Debugging
                            Swal.fire(
                                'Error!',
                                'There was an error deleting the guardian.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>

<!-- Delete Button in the Blade Template -->
<button type="button" class="btn btn

@endsection