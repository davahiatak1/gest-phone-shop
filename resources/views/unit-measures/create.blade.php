<div class="modal fade" id="modal-create-unit-measure" style="top: 50px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Ajouter une unité de mesure</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('unit-measures.store') }}" id="create-unit-measure-form" method="POST">
                	@csrf
                    <div class="form-group">
                        <label>Unité de Mesure</label>
                        <input type="text" name="unit" placeholder="Enter l'unité de mesure" required="" class="form-control">
                    </div>

                </form>
            </div>
            <div class="modal-footer no-border">
                <div class="text-right">
                    <button class="btn btn-default btn-sm" data-dismiss="modal">Annuler</button>
                    <button class="btn btn-primary btn-sm" onclick="event.preventDefault(); storeUnitMeasure();">Ajouter</button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')

    <script>
        
        function storeUnitMeasure() {
            var modal = $("#modal-create-unit-measure");
            var unit = modal.find("input[name=unit]").val().trim();

            if (unit == "") {
                $.notify("Le champ unité de mésure ne peut pas être vide", "error");
                return false;
            }
            
            document.getElementById('create-unit-measure-form').submit();
        }
    

    </script>

@endpush