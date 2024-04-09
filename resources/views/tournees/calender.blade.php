@extends('layout.app')
@section('content')
    <h2 class="my-3">Calendrier des tournées</h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div id="calendar"></div>

                <div id="event_form" style="display: none;">
                    <form>
                        <div class="titre text-center">Programmation d'une tournée</div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="title" class="champs_formulaire">Nom de la tournée :</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="start" class="champs_formulaire">Début de la tournée :</label>
                            </div>
                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control" id="start" name="start">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="end" class="champs_formulaire">Fin de la tournée :</label>
                            </div>
                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control" id="end" name="end">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" id="createTourneeBtn" class="btn btn-primary">Créer la tournée</button>
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
                events:'/',
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

                    var start = $.fullCalendar.formatDate(event.start, 'YYYY-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'YYYY-MM-DD HH:mm:ss');
                    var title = event.title;

                    var id = event.id;
                    $.ajax({
                        url:"/action",
                        type:"POST",
                        data:{
                            title: title,
                            start: start,
                            end: end,
                            id:id,
                            type: 'update'
                        },
                        success:function(response)
                        {
                            calendar.fullCalendar('refetchEvents');
                            toastr.success('Tournée mise à jour !', '', {
                                positionClass: 'toast-bottom-right'
                            });
                        }
                    })
                },
                eventDrop: function(event, delta)
                {

                    var start = $.fullCalendar.formatDate(event.start, 'YYYY-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'YYYY-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url:"/action",
                        type:"POST",
                        data:{
                            title: title,
                            start: start,
                            end: end,
                            id:id,
                            type: 'update'
                        },
                        success:function(response)
                        {
                            calendar.fullCalendar('refetchEvents');
                            toastr.success('Tournée mise à jour !', '', {
                                positionClass: 'toast-bottom-right'
                            });
                        }
                    })
                },
                eventClick: function(event) {
                    var eventId = event.id;
                    var eventName = event.title;
                    window.location.href = "/tournee/" + eventId + "/inspection";
                },
                dayRender: function (date, cell) {
                    if (date.isSameOrBefore(moment(), 'day')) {
                        cell.addClass('past-day');
                    }
                }
            });

            $('#createTourneeBtn').click(function() {
                var title = $('#title').val();
                var start = $('#start').val();
                var end = $('#end').val();

                if (title && start && end) {
                    $.ajax({
                        url: "/action",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            type: 'add'
                        },
                        success: function(data) {
                            calendar.fullCalendar('refetchEvents');
                            toastr.success('Tournée créée !', '', {
                                positionClass: 'toast-bottom-right'
                            });
                            $('#event_form').hide();
                            $('#event_Form')[0].reset();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            toastr.error('Une erreur est survenue lors de la création de la tournée.', '', {
                                positionClass: 'toast-bottom-right'
                            });
                        }
                    });
                } else {
                    toastr.warning('Veuillez remplir tous les champs.', '', {
                        positionClass: 'toast-bottom-right'
                    });
                }
            });

            $('#annulerBtn').click(function() {
                $('#event_form').hide();
            });

        });
    </script>
@endsection