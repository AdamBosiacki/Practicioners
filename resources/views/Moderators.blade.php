@extends('layout')
@section('content')


    <div class="modal fade" id="addModeratorModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_Practicioner_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="first_name">Imię</label>
                                <input type="text" name="name" id="first_name2" class="form-control" placeholder="Imię" required>
                            </div>
                            <div class="col-lg">
                                <label for="last_name">Nazwisko</label>
                                <input type="text" name="surname" id="last_name2" class="form-control" placeholder="Nazwisko" required>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email2" class="form-control" placeholder="E-mail" required>
                        </div>
                        <div class="my-2">
                            <label for="email">Hasło</label>
                            <input type="password" name="haslo" id="haslo" class="form-control" placeholder="Hasło" required>
                        </div>
                        <div class="my-2">
                            <label for="email">Powtórz hasło</label>
                            <input type="password" name="haslo2" id="haslo2" class="form-control" placeholder="Powtórz hasło" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="add_Practicioner_btn" class="btn btn-primary">Add Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editPracticionerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_Practicioner_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="first_name">Imię</label>
                                <input type="text" name="first_name" id="name" class="form-control" placeholder="Imię" required>
                            </div>
                            <div class="col-lg">
                                <label for="last_name">Nazwisko</label>
                                <input type="text" name="last_name" id="surname" class="form-control" placeholder="Nazwisko" required>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" id="edit_Practicioner_btn" class="btn btn-success">Zapisz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(\Illuminate\Support\Facades\Auth::user()->role=="a" || \Illuminate\Support\Facades\Auth::user()->role=="m")
        <body class="bg-light">
        <div class="container">
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-header bg-success flex-row">
                            <h3 class="text-light">Moderatorzy</h3>
                            <button class="btn btn-light " data-bs-toggle="modal" data-bs-target="#addModeratorModal">
                                <i class="bi-plus-circle me-2"></i>
                                Dodaj nowego moderatora
                            </button>
                        </div>
                        <div class="card-body" id="show_all_practicioners">
                            <h1 class="text-center text-secondary my-5">Loading...</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @push('script_ajax_crud')
            <!-- OBSŁUGA AJAXA -->
            <script>
                $(function() {

                    // add new employee ajax request
                    $("#add_Practicioner_form").submit(function(e) {
                        e.preventDefault();
                        const fd = new FormData(this);
                        $("#add_Practicioner_btn").text('Adding...');
                        $.ajax({
                            url: '{{ route('storeModerator') }}',
                            method: 'post',
                            data: fd,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(response) {
                                if (response.status == 200) {
                                    Swal.fire(
                                        'Added!',
                                        'Employee Added Successfully!',
                                        'success'
                                    );
                                    fetchAllPracticioners();
                                }else{
                                    Swal.fire(
                                        'Błąd!',
                                        'Podane hasła są niezgodne',
                                        'error'
                                    );                                }
                                $("#add_Practicioner_btn").text('Add Employee');
                                $("#add_Practicioner_form")[0].reset();
                                $("#addModeratorModal").modal('hide');
                            }
                        }).always(function (response){
                            console.log(response);
                        });
                    });

                    // edit employee ajax request
                    $(document).on('click', '.editIcon', function(e) {
                        e.preventDefault();
                        let id = $(this).attr('id');
                        $.ajax({
                            url: '{{ route('editModerator') }}',
                            method: 'get',
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                $("#id").val(response.id);
                                $("#name").val(response.name);
                                $("#surname").val(response.surname);

                                $("#email").val(response.email);
                            }
                        });
                    });

                    // update employee ajax request
                    $("#edit_Practicioner_form").submit(function(e) {
                        e.preventDefault();
                        const fd = new FormData(this);
                        $("#edit_Practicioner_btn").text('Updating...');
                        $.ajax({
                            url: '{{ route('updateModerator') }}',
                            method: 'post',
                            data: fd,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(response) {
                                if (response.status == 200) {
                                    Swal.fire(
                                        'Updated!',
                                        'Employee Updated Successfully!',
                                        'success'
                                    )
                                    fetchAllPracticioners();}
                                $("#edit_Practicioner_btn").text('Update Employee');
                                $("#edit_Practicioner_form")[0].reset();
                                $("#editPracticionerModal").modal('hide');
                            }
                        }).always(function (response){
                            console.log(response);
                        });
                    });

                    // delete employee ajax request
                    $(document).on('click', '.deleteIcon', function(e) {
                        e.preventDefault();
                        let id = $(this).attr('id');
                        let csrf = '{{ csrf_token() }}';
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
                                $.ajax({
                                    url: '{{ route('deleteModerator') }}',
                                    method: 'delete',
                                    data: {
                                        id: id,
                                        _token: csrf
                                    },
                                    success: function(response) {console.log(response);
                                        Swal.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                        )
                                        fetchAllPracticioners();
                                    }
                                });
                            }
                        })
                    });

                    fetchAllPracticioners();

                    function fetchAllPracticioners() {
                        $.ajax({
                            url: '{{ route('fetchAllModerators') }}',
                            method: 'get',
                            success: function(response) {
                                $("#show_all_practicioners").html(response);
                                $("table").DataTable({
                                    order: [0, 'desc']
                                });
                            }});
                    }
                });
            </script>
        @endpush

@endsection
