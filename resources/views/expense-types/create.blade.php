<div class="modal fade" id="modal-create-expense-type" style="top: 50px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Ajouter une despense</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('expense-types.store') }}" id="create-expense-type-form" method="POST">
                	@csrf
                    <div class="form-group">
                        <label>Nom despense</label>
                        <input type="text" name="name" placeholder="Enter le nom de la despense" required="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" placeholder="Enter le nom de la despense" required="" class="form-control">
                    </div>

                </form>
            </div>
            <div class="modal-footer no-border">
                <div class="text-right">
                    <button class="btn btn-default btn-sm" data-dismiss="modal">Annuler</button>
                    <button class="btn btn-primary btn-sm" onclick="event.preventDefault(); storeExpenseType();">Ajouter</button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')

    <script>
        
        function storeExpenseType() {
            var modal = $("#modal-create-expense-type");
            var name = modal.find("input[name=name]").val().trim();

            if (name == "") {
                $.notify("Le champ nom despense ne peut pas être vide", "error");
                return false;
            }
            
            document.getElementById('create-expense-type-form').submit();
        }
    

    </script>

@endpush