<div class="modal fade" id="modal-edit-expense-type" style="top: 50px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Modifier la categorie de depense</h4>
            </div>
            <div class="modal-body">
                <form action="" id="edit-expense-type-form" method="POST">
                	@csrf
                    @method("PUT")
                    <div class="form-group">
                        <label>Nom categorie despense</label>
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
                    <button class="btn btn-primary btn-sm" onclick="event.preventDefault(); updateExpenseType();">Modifier</button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')

    <script>
        $(".open-modal-edit-expense-type").on('click', function(event) {
            event.preventDefault();

            var expenseType = $(this).data('expense-type');

            $("#modal-edit-expense-type").modal();

            var form = $("#edit-expense-type-form");

            form.attr('action', location.origin + '/expense-types/'+ expenseType.id);

            form.find("input[name=name]").val(expenseType.name);
            form.find("input[name=description]").val(expenseType.description);
            
        });
    </script>

    <script>
        
        function updateExpenseType() {
            var modal = $("#modal-edit-expense-type");
            var name = modal.find("input[name=name]").val().trim();

            if (name == "") {
                $.notify("Le champ nom categorie ne peut pas être vide", "error");
                return false;
            }
            
            document.getElementById('edit-expense-type-form').submit();
        }
    

    </script>


@endpush