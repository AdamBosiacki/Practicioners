
@extends("layout")

@section("content")
    <div class="modal fade" id="addPracticionerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                <input type="text" name="first_name" id="first_name2" class="form-control" placeholder="Imię" required>
                            </div>
                            <div class="col-lg">
                                <label for="last_name">Nazwisko</label>
                                <input type="text" name="last_name" id="last_name2" class="form-control" placeholder="Nazwisko" required>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="phone">Numer kontaktowy</label>
                            <input type="tel" name="phone" id="phone2" class="form-control" placeholder="Numer" required>
                        </div>
                        <div class="my-2">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email2" class="form-control" placeholder="E-mail" required>
                        </div>
                        <div class="my-2">
                            <label for="hourly_rate">Stawka</label>
                            <input type="number" name="hourly_rate" id="hourly_rate2" class="form-control" placeholder="Stawka" required>
                        </div>
                        <div class="my-2">
                            <label for="availability">Dostępność</label>
                            <input type="text" name="availability" id="availability2" class="form-control" placeholder="Dostępność" required>
                        </div>
                        <div class="my-2">
                            <label for="cur_position">Źródło kontaktu</label>
                            <!--<input type="text" name="contact_source" id="contact_source2" class="form-control" placeholder="Źródło kontaktu">-->
                            <div class="text-center">
                            <input type="radio" name="contact_source" value="w" id="contact_source22" class="form-check-input">Wewnętrzny&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="contact_source" value="z" id="contact_source222" class="form-check-input">Zewnętrzny
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="field_of_knowledges">Wiedza</label>
                            <input type="text" name="field_of_knowledges" id="field_of_knowledges2" class="form-control" placeholder="Wiedza">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="add_Practicioner_btn" class="btn btn-primary">Dodaj praktyka</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edytuj praktyka</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_Practicioner_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                        <div class="modal-body p-4 bg-light">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="first_name">Imię</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Imię" value="" required>
                                </div>
                                <div class="col-lg">
                                    <label for="last_name">Nazwisko</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Nazwisko" value="" required>
                                </div>
                            </div>
                            <div class="my-2">
                                <label for="phone">Telefon</label>
                                <input type="tel" name="phone" id="phone" class="form-control" placeholder="Telefon" value="" required>
                            </div>
                            <div class="my-2">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" value="" required>
                            </div>
                            <div class="my-2">
                                <label for="hourly_rate">Stawka</label>
                                <input type="number" name="hourly_rate" id="hourly_rate" class="form-control" placeholder="Stawka" value="" required>
                            </div>
                            <div class="my-2">
                                <label for="availability">Dostępność</label>
                                <input type="text" name="availability" id="availability" class="form-control" placeholder="Dostępność" value="" required>
                            </div>
                            <div class="my-2">
                                <label for="contact_source">Kontakt</label>
                                <div class="text-center">
                                    <input type="radio" name="contact_source" value="w" id="contact_source2222" class="form-check-input">Wewnętrzny&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="contact_source" value="z" id="contact_source22222" class="form-check-input">Zewnętrzny
                                </div>
                            </div>
                            <div class="my-2">
                                <label for="field_of_knowledges">Wiedza</label>
                                <input type="text" name="field_of_knowledges" id="field_of_knowledges" class="form-control" placeholder="Wiedza">
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
    <body class="bg-light">
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-success flex-row">
                        <h3 class="text-light">Praktycy</h3>
                        <button class="btn btn-light " data-bs-toggle="modal" data-bs-target="#addPracticionerModal">
                            <i class="bi-plus-circle me-2"></i>
                            Dodaj nowego praktyka
                        </button>
                    </div>
                    <div class="card-body" id="show_all_practicioners">
                        <h1 class="text-center text-secondary my-5">Loading...</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script_ajax_crud')
    <!-- OBSŁUGA AJAXA -->
        <script>
            $(function() {

                $("#add_Practicioner_form").submit(function(e) {
                    e.preventDefault();
                    const fd = new FormData(this);
                    $("#add_Practicioner_btn").text('Dodaję...');
                    $.ajax({
                        url: '{{ route('store') }}',
                        method: 'post',
                        data: fd,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == 200) {
                                Swal.fire(
                                    'Dodano!',
                                    'Praktyk został poprawnie dodany!',
                                    'success'
                                );
                                fetchAllPracticioners();
                            }
                            $("#add_Practicioner_btn").text('Dodaj praktyka');
                            $("#add_Practicioner_form")[0].reset();
                            $("#addPracticionerModal").modal('hide');
                        }
                    });
                });

                $(document).on('click', '.editIcon', function(e) {
                    e.preventDefault();
                    let id = $(this).attr('id');
                    $.ajax({
                        url: '{{ route('edit') }}',
                        method: 'get',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(response) {
                            $("#id").val(response.id);
                            $("#first_name").val(JSON.parse(JSON.stringify(response.first_name)));
                            $("#last_name").val(JSON.parse(JSON.stringify(response.last_name)));
                            $("#phone").val(JSON.parse(JSON.stringify(response.phone)));
                            $("#email").val(JSON.parse(JSON.stringify(response.email)));
                            $("#hourly_rate").val(JSON.parse(JSON.stringify(response.hourly_rate)));
                            $("#availability").val(JSON.parse(JSON.stringify(response.availability)));
                            //$("#cur_company").val(JSON.parse(JSON.stringify(response.cur_company)));
                            //$("#cur_position").val(JSON.parse(JSON.stringify(response.cur_position)));
                            let con=JSON.parse(JSON.stringify(response.contact_source));
                            if(con=="w"){
                                $("#contact_source2222").prop("checked",true);
                            }else if(con=="z"){
                                $("#contact_source22222").prop("checked",true);
                            }
                            $("#field_of_knowledges").val(JSON.parse(JSON.stringify(response.field_of_knowledges)));
                        }
                    });
                });

                $("#edit_Practicioner_form").submit(function(e) {
                    e.preventDefault();
                    const fd = new FormData(this);
                    $("#edit_Practicioner_btn").text('Aktualizuję...');
                    $.ajax({
                        url: '{{ route('update') }}',
                        method: 'post',
                        data: fd,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == 200) {
                                Swal.fire(
                                    'Zaktualizowano!',
                                    'Praktyk został poprawnie zaktualizowany!',
                                    'success'
                                )
                                fetchAllPracticioners();}
                            $("#edit_Practicioner_btn").text('Zaktualizuj praktyka');
                            $("#edit_Practicioner_form")[0].reset();
                            $("#editPracticionerModal").modal('hide');
                        }
                    });
                });

                $(document).on('click', '.deleteIcon', function(e) {
                    e.preventDefault();
                    let id = $(this).attr('id');
                    let csrf = '{{ csrf_token() }}';
                    Swal.fire({
                        title: 'Potwierdź',
                        text: "Tej operacji nie da się cofnąć!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Tak, usuń!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '{{ route('delete') }}',
                                method: 'delete',
                                data: {
                                    id: id,
                                    _token: csrf
                                },
                                success: function(response) {console.log(response);
                                    Swal.fire(
                                        'Usunięty!',
                                        'Praktyk został usunięty.',
                                        'success'
                                    )
                                    fetchAllPracticioners();
                                }
                            }).always((data)=>{
                                console.log(data);
                            });
                        }
                    })
                });

                fetchAllPracticioners();

                function fetchAllPracticioners() {
                    $.ajax({
                        url: '{{ route('fetchAll') }}',
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
