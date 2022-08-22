@extends("layout")

@section("content")
    <div class="modal fade" id="editPracticionerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Practicioner</h5>
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
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dodaj rolę Praktyka</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_Practicioner_form2" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="pid" value="{{$user_id}}">
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="first_name">Data od</label>
                                <input type="date" name="data_od" id="data_od" class="form-control" required>
                            </div>
                            <div class="col-lg">
                                <label for="last_name">Data do</label>
                                <input type="date" name="data_do" id="data_do" class="form-control">
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="phone">Nazwa</label>
                            <input type="tel" name="nazwa" id="nazwa" class="form-control" placeholder="Nazwa" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" id="add_Practicioner_btn" class="btn btn-primary">Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addExpModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dodaj doświadczenie Praktyka</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_exp_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="pid" value="{{$user_id}}">
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="first_name">Data od</label>
                                <input type="date" name="data_od" id="data_od" class="form-control" required>
                            </div>
                            <div class="col-lg">
                                <label for="last_name">Data do</label>
                                <input type="date" name="data_do" id="data_do" class="form-control">
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="uczelnia">Uczelnia</label>
                            <input type="text" name="uczelnia" id="uczelnia" class="form-control" placeholder="Uczelnia" required>
                        </div>
                        <div class="my-2">
                            <label for="zakres">Zakres</label>
                            <input type="text" name="zakres" id="zakres" class="form-control" placeholder="Zakres" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" id="add_Practicioner_btn" class="btn btn-primary">Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addEmpModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dodaj zatrudnienie Praktyka</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_emp_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="pid" value="{{$user_id}}">
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="my-2">
                                <label for="zakres">Zakres</label>
                                <input type="text" name="zakres" id="zakres" class="form-control" placeholder="Zakres" required>
                            </div>
                            <div class="my-2">
                                <label for="przedmiot">Przedmiot</label>
                                <input type="text" name="przedmiot" id="przedmiot" class="form-control" placeholder="Przedmiot" required>
                            </div>
                            <div class="my-2">
                                <label for="rok">Rok</label>
                                <input type="number" name="rok" id="rok" class="form-control" placeholder="Rok" required>
                            </div>
                            <div class="my-2">
                                <label for="semestr">Semestr</label>
                                <input type="number" name="semestr" id="semestr" class="form-control" placeholder="Semestr" required>
                            </div>


                        </div></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" id="add_emp_btn" class="btn btn-primary">Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_Role_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="pid" id="pid" value="{{$user_id}}">
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
                            <label for="poczatek">Początek</label>
                            <input type="date" name="poczatek" id="poczatek" class="form-control" placeholder="Data od" value="" required>
                        </div>
                        <div class="my-2">
                            <label for="koniec">Koniec</label>
                            <input type="date" name="koniec" id="koniec" class="form-control" placeholder="Data do" value="" required>
                        </div>
                        <div class="my-2">
                            <label for="rola">Rola</label>
                            <input type="text" name="rola" id="rola" class="form-control" placeholder="Rola" value="" required>
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
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">{{$data['first_name']}} {{$data['last_name']}}</h1>
    </div>
    <div class="container">
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Dane ogólne</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Telefon: {{$data['phone']}}</li>
                        <li>Mail: {{$data['email']}}</li>
                        <li>Stawka: {{$data['hourly_rate']}}</li>
                        <li>Dostępność: {{$data['availability']}}</li>
                        <li>Zakres wiedzy: {{$data['know']}}</li><br>
                        <button type="button" id="{{$user_id}}" data-bs-toggle="modal" data-bs-target="#editPracticionerModal" class="btn btn-info btn-sm editIcon"><i class="bi bi-pencil-square"></i>Edytuj</button>
                    </ul>


                </div>
            </div>
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Role</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mt-3 mb-4">

                        @foreach($user_role2 as $key)
                            Początek: {{$key['start_date']}}<br>
                            Koniec: {{$key['finish_date']}}<br>
                            Rola: {{$key['name']}}<br>
                            <!--<button type="button" id="{{$key['id']}}" data-bs-toggle="modal" data-bs-target="#editRoleModal" class="btn btn-info btn-sm EditRole"><i class="bi bi-pencil-square"></i>Edytuj</button>-->
                            <button type="button" id="{{$key['id']}}" class="btn btn-info btn-sm deleteIconRole"><i class="bi bi-x-circle-fill"></i>Usuń</button><hr>
                        @endforeach

                    </ul>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="btn btn-info btn-sm"><i class="bi bi-plus-circle-fill"></i>Dodaj</button>

                </div>
            </div>
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Doświadczenie</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mt-3 mb-4">
                        @foreach($user_exp2 as $key)
                            Początek: {{$key['start_date']}}<br>
                            Koniec: {{$key['finish_date']}}<br>
                            Uczelnia: {{$key['name']}}<br>
                            Zakres: {{$key['name2']}}<br>
                            <!--<button type="button" id="{{$key['pid']}}" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i>Edytuj</button>-->
                            <button type="button" id="{{$key['pid']}}" class="btn btn-info btn-sm deleteIconExperience"><i class="bi bi-x-circle-fill"></i>Usuń</button>
                            <hr>
                        @endforeach
                    </ul>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addExpModal" class="btn btn-info btn-sm"><i class="bi bi-plus-circle-fill"></i>Dodaj</button>

                </div>
            </div>
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Zatrudnienie w CDV</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mt-3 mb-4">
                        @foreach($user_emp2 as $key)
                            Zakres: {{$key['name']}}<br>
                            Przedmiot: {{$key['name2']}}<br>
                            Rok: {{$key['year']}}<br>
                            Semestr: {{$key['semester']}}<br>
                            <!--<button type="button" id="{{$key["pid"]}}" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i>Edytuj</button>-->
                            <button type="button" id="{{$key["pid"]}}" class="btn btn-info btn-sm deleteIconZatrudnienie"><i class="bi bi-x-circle-fill"></i>Usuń</button>
                            <hr>
                        @endforeach
                    </ul>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addEmpModal" class="btn btn-info btn-sm"><i class="bi bi-plus-circle-fill"></i>Dodaj</button>

                </div>
            </div>
        </div>
    </div>
    @push('script_ajax_crud')
        <script>
            $(
                function (){
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
                                    ).then((result)=>{
                                        if(result.isConfirmed){
                                            location.reload();
                                        }
                                    })
                                }
                            }
                        });
                    });
                    $(document).on('click', '.deleteIconRole', function(e) {
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
                                    url: '/deleteRole',
                                    method: 'delete',
                                    data: {
                                        id: id,
                                        _token: csrf
                                    },
                                    success: function(response) {console.log(response);
                                        Swal.fire(
                                            'Usunięty!',
                                            'Rola została usunięta.',
                                            'success'
                                        ).then((result)=>{
                                            if(result.isConfirmed){
                                                location.reload();
                                            }
                                        })
                                    }
                                });
                            }
                        })
                    });
                    $(document).on('click', '.deleteIconExperience', function(e) {
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
                                    url: '/deleteExperience',
                                    method: 'delete',
                                    data: {
                                        id: id,
                                        _token: csrf
                                    },
                                    success: function(response) {console.log(response);
                                        Swal.fire(
                                            'Usunięty!',
                                            'Doświadczenie zostało usunięte.',
                                            'success'
                                        ).then((result)=>{
                                            if(result.isConfirmed){
                                                location.reload();
                                            }
                                        })
                                    }
                                });
                            }
                        })
                    });
                    $(document).on('click', '.deleteIconZatrudnienie', function(e) {
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
                                    url: '/deleteZatrudnienie',
                                    method: 'delete',
                                    data: {
                                        id: id,
                                        _token: csrf
                                    },
                                    success: function(response) {console.log(response);
                                        Swal.fire(
                                            'Usunięty!',
                                            'Zatrudnienie zostało usunięte.',
                                            'success'
                                        ).then((result)=>{
                                            if(result.isConfirmed){
                                                location.reload();
                                            }
                                        })
                                    }
                                });
                            }
                        })
                    });
                    $("#add_Practicioner_form2").submit(function(e) {
                        e.preventDefault();
                        const fd = new FormData(this);
                        $("#add_Practicioner_btn").text('Dodaję...');
                        $.ajax({
                            url: '/storeRole',
                            method: 'post',
                            data: fd,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(response) {
                                console.log(response);
                                if (response.status == 200) {
                                    Swal.fire(
                                        'Dodano!',
                                        'Praktyk został poprawnie dodany!',
                                        'success'
                                    ).then((result)=>{
                                        if(result.isConfirmed){
                                            location.reload();
                                        }
                                    });
                                }
                            }
                        }).always(
                            (data)=>{
                                console.log(data);
                            }
                        );
                    });
                    $("#add_exp_form").submit(function(e) {
                        e.preventDefault();
                        const fd = new FormData(this);
                        $("#add_Practicioner_btn").text('Dodaję...');
                        $.ajax({
                            url: '/storeExp',
                            method: 'post',
                            data: fd,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(response) {
                                console.log(response);
                                if (response.status == 200) {
                                    Swal.fire(
                                        'Dodano!',
                                        'Praktyk został poprawnie dodany!',
                                        'success'
                                    ).then((result)=>{
                                        if(result.isConfirmed){
                                            location.reload();
                                        }
                                    });
                                }
                            }
                        }).always(
                            (data)=>{
                                console.log(data);
                            }
                        );
                    });
                    $("#add_emp_form").submit(function(e) {
                        e.preventDefault();
                        const fd = new FormData(this);
                        $("#add_emp_btn").text('Dodaję...');
                        $.ajax({
                            url: '/storeEmp',
                            method: 'post',
                            data: fd,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(response) {
                                console.log(response);
                                if (response.status == 200) {
                                    Swal.fire(
                                        'Dodano!',
                                        'Praktyk został poprawnie dodany!',
                                        'success'
                                    ).then((result)=>{
                                        if(result.isConfirmed){
                                            location.reload();
                                        }
                                    });
                                }
                            }
                        }).always(
                            (data)=>{
                                console.log(data);
                            }
                        );
                    });
                    $(document).on('click', '.EditRole', function(e) {
                        e.preventDefault();
                        let id = $(this).attr('id');
                        let pid = $("#pid").val();
                        $.ajax({
                            url: '{{ route('editRole') }}',
                            method: 'get',
                            data: {
                                id: id,
                                pid: pid,
                                _token: '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function(response) {
                                $("#id").val(response.id);
                                $("#pid").val(response.pid);
                                $("#poczatek").val(JSON.parse(JSON.stringify(response.poczatek)));
                                $("#koniec").val(JSON.parse(JSON.stringify(response.koniec)));
                                $("#rola").val(JSON.parse(JSON.stringify(response.rola)));
                                console.log(response.id);
                                console.log(response.pid);
                                console.log(response.poczatek);
                                console.log(response.koniec);
                                console.log(response.rola);
                            }
                        });
                    });
                    $("#edit_Role_form").submit(function(e) {
                        e.preventDefault();
                        const fd = new FormData(this);
                        $("#edit_Practicioner_btn").text('Aktualizuję...');
                        $.ajax({
                            url: '{{ route('updateRole') }}',
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
                                    }
                                $("#edit_Practicioner_btn").text('Zaktualizuj praktyka');
                                $("#edit_Role_form")[0].reset();
                                $("#editRoleModal").modal('hide');
                            }
                        });
                    });
                }
            )
        </script>
    @endpush
@endsection


