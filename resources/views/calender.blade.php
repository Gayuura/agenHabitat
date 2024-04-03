@extends('layout.app')
@section('content')
    <h2 class="my-3">Calendrier des tournées</h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div id="calendar"></div>
                <!-- Formulaire pour créer une nouvelle inspection -->
                <div id="event_form" style="display: none;">
                    <form>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="title">Nom de l'inspection :</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="adress">Adresse :</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="adress" name="adress">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="start">Début de l'inspection :</label>
                            </div>
                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control" id="start" name="start">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="end">Fin de l'inspection :</label>
                            </div>
                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control" id="end" name="end">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="nomLoca">Nom du locataire :</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="nomLoca" name="nomLoca">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="numLoca">Numéro du locataire :</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="numLoca" name="numLoca">
                            </div>
                        </div>
                        <div class="row form-check d-flex">
                            <div class="col-md-6">
                                <input type="checkbox" class="form-check-input" id="conform" name="conform">
                                <label class="form-check-label" for="conform">Conforme</label>
                            </div>
                            <div class="col-md-6">
                                <input type="checkbox" class="form-check-input" id="etat" name="etat">
                                <label class="form-check-label" for="etat">État</label>
                            </div>
                        </div>
                        <div class="row form-group justify-content-between">
                            <div class="col-md-6">
                                <button type="button" id="createInspectionBtn" class="btn btn-primary">Créer l'inspection</button>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="button" id="annulerBtn" class="btn btn-primary">Annuler</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                editable:true,
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                events:'/calender',
                selectable:true,
                selectHelper: true,
                select:function(start, end, allDay)
                {
                    $('#event_form').show();
                    $('#start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));

                    var newEnd = moment(end).subtract(1, 'days');
                    $('#end').val(newEnd.format('YYYY-MM-DD HH:mm:ss'));
                },
                editable:true,
                eventResize: function(event, delta)
                {
                    var conform = event.conform ? 1 : 0;
                    var etat = event.etat ? 1 : 0;

                    var start = $.fullCalendar.formatDate(event.start, 'YYYY-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'YYYY-MM-DD HH:mm:ss');
                    var title = event.title;
                    var adress = event.adress;
                    var nomLoca = event.nomLoca;
                    var numLoca = event.numLoca;
                    var conform = event.conform;
                    var etat = event.etat;
                    var id = event.id;
                    $.ajax({
                        url:"/calender/action",
                        type:"POST",
                        data:{
                            title: title,
                            adress: adress,
                            start: start,
                            end: end,
                            nomLoca: nomLoca,
                            numLoca: numLoca,
                            conform: conform,
                            etat: etat,
                            id:id,
                            type: 'update'
                        },
                        success:function(response)
                        {
                            calendar.fullCalendar('refetchEvents');
                            toastr.success('Inspection mise à jour !', '', {
                                positionClass: 'toast-bottom-right' // Positionner la notification en bas à droite
                            });
                        }
                    })
                },
                eventDrop: function(event, delta)
                {
                    var conform = event.conform ? 1 : 0;
                    var etat = event.etat ? 1 : 0;

                    var start = $.fullCalendar.formatDate(event.start, 'YYYY-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'YYYY-MM-DD HH:mm:ss');
                    var title = event.title;
                    var adress = event.adress;
                    var nomLoca = event.nomLoca;
                    var numLoca = event.numLoca;
                    var conform = event.conform;
                    var etat = event.etat;
                    var id = event.id;
                    $.ajax({
                        url:"/calender/action",
                        type:"POST",
                        data:{
                            title: title,
                            adress: adress,
                            start: start,
                            end: end,
                            nomLoca: nomLoca,
                            numLoca: numLoca,
                            conform: conform,
                            etat: etat,
                            id:id,
                            type: 'update'
                        },
                        success:function(response)
                        {
                            calendar.fullCalendar('refetchEvents');
                            toastr.success('Inspection mise à jour !', '', {
                                positionClass: 'toast-bottom-right' // Positionner la notification en bas à droite
                            });
                        }
                    })
                },
                eventClick: function(event) {
                    var eventId = event.id;
                    var eventName = event.title;
                    window.location.href = "/inspection/" + eventId + "?name=" + encodeURIComponent(eventName);
                }
            });

            $('#createInspectionBtn').click(function() {
                var conform = $('#conform').is(':checked') ? 1 : 0;
                var etat = $('#etat').is(':checked') ? 1 : 0;

                $.ajax({
                    url: "/calender/action",
                    type: "POST",
                    data:{
                        title: $('#title').val(),
                        adress: $('#adress').val(),
                        start: $('#start').val(),
                        end: $('#end').val(),
                        nomLoca: $('#nomLoca').val(),
                        numLoca: $('#numLoca').val(),
                        conform: conform,
                        etat: etat,
                        type: 'add'
                    },
                    success: function(data) {
                        calendar.fullCalendar('refetchEvents');
                        toastr.success('Inspection créée !', '', {
                            positionClass: 'toast-bottom-right' // Positionner la notification en bas à droite
                        });
                        $('#event_form').hide();
                        $('#eventForm')[0].reset();
                    }
                });
            });

            $('#annulerBtn').click(function() {
                $('#event_form').hide();
            });

        });
    </script>
@endsection