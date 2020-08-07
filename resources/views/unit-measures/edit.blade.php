<div class="modal fade" id="modal-edit-unit-measure" style="top: 50px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Modifier l'unité de mesure</h4>
            </div>
            <div class="modal-body">
                <form action="" id="edit-unit-measure-form" method="POST">
                	@csrf
                    @method("PUT")
                    <div class="form-group">
                        <label>Methode</label>
                        <input type="text" name="unit" placeholder="Unité de mesure" class="form-control">
                    </div>

                </form>
            </div>
            <div class="modal-footer no-border">
                <div class="text-right">
                    <button class="btn btn-default btn-sm" data-dismiss="modal">Annuler</button>
                    <button class="btn btn-primary btn-sm" onclick="event.preventDefault(); updateUnitMeasure();">Modifier</button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')

    <script>
        $(".open-modal-edit-unit-measure").on('click', function(event) {
            event.preventDefault();

            var unitMeasure = $(this).data('unit-measure');

            $("#modal-edit-unit-measure").modal();

            var form = $("#edit-unit-measure-form");

            form.attr('action', location.origin + '/unit-measures/'+ unitMeasure.id);

            form.find("input[name=unit]").val(unitMeasure.unit);
            
        });
    </script>


    <script>
        
        function updateUnitMeasure() {
            var modal = $("#modal-edit-unit-measure");
            var unit = modal.find("input[name=unit]").val().trim();

            if (unit == "") {
                $.notify("Le champ nom categorie ne peut pas être vide", "error");
                return false;
            }
            
            document.getElementById('edit-unit-measure-form').submit();
        }
    

    </script>


@endpush