<div class="modal fade" id="modal-delete-unit-measure" style="top: 50px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Supprimer l'unité de mesure</h4>
            </div>
            <div class="modal-body">
                <form action="" id="delete-unit-measure-form" method="POST">
                	@csrf
                    @method("DELETE")
                    <p class="">Voulez-vous vraiment supprimer l'unité de mesure ?</p>

                </form>
            </div>
            <div class="modal-footer no-border">
                <div class="text-right">
                    <button class="btn btn-default btn-sm" data-dismiss="modal">Annuler</button>
                    <button class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-unit-measure-form').submit();">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')

    <script>
        $(".open-modal-delete-unit-measure").on('click', function(event) {
            event.preventDefault();

            var unitMeasure = $(this).data('unitMeasure');

            $("#modal-delete-unit-measure").modal();

            var form = $("#delete-unit-measure-form");

            form.attr('action', location.origin + '/unit-measures/'+ unitMeasure.id);
            
        });
    </script>


@endpush