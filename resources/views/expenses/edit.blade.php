<div class="modal fade" id="modal-edit-expense" style="top: 50px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Modifier la depense</h4>
            </div>
            <div class="modal-body">
                <form action="" id="edit-expense-form" method="POST">
                	@csrf
                    @method("PUT")

                    <label>Date</label>
                    <div class="timepicker-input input-icon form-group">
                        <i class="ti-calendar"></i>
                        <input type="text" name="date" class="form-control datepicker-1" placeholder="Date d'arriver du stock" data-provide="datepicker">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" placeholder="Décription de la dépense" required="" class="form-control">
                    </div>

                    <div class="form-group expense-type">
                        <label>Categorie Depense</label>
                        <select name="expense_type_id" id="expense-type-edit">
                            <optgroup label="Selectionner la categorie">
                                <option value="0"></option>
                                @foreach(\App\ExpenseType::all() as $expenseType)
                                    <option value="{{ $expenseType->id }}"> {{ $expenseType->name }}</option>
                                @endforeach
                            
                            </optgroup>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Montant</label>
                        <input type="number" name="amount" placeholder="Enter le montant" required="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Reçue</label>
                        <input type="file" name="receipt" placeholder="Joigner le reçue" required="" class="form-control">
                    </div>

                </form>
            </div>
            <div class="modal-footer no-border">
                <div class="text-right">
                    <button class="btn btn-default btn-sm" data-dismiss="modal">Annuler</button>
                    <button class="btn btn-primary btn-sm" onclick="event.preventDefault(); updateExpense()">Modifier</button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')

    <script>
        $('#expense-type-edit').selectize({
            sortField: 'text'
        });
    </script>

    <script>
        $(".open-modal-edit-expense").on('click', function(event) {
            event.preventDefault();

            var expense = $(this).data('expense');

            $("#modal-edit-expense").modal();

            var form = $("#edit-expense-form");

            form.attr('action', location.origin + '/expenses/'+ expense.id);
            var date = expense.date.split('-');

            form.find("input[name=date]").val(date[1] + '/' + date[2] + '/' +date[0]);
            form.find("input[name=description]").val(expense.description);
            form.find("input[name=amount]").val(expense.amount);
            
        });
    </script>

    <script>
        function updateExpense(){

            var modal = $("#modal-edit-expense");
            var date = modal.find("input[name=date]").val().trim();
            var description = modal.find("input[name=description]").val().trim();
            var amount = modal.find("input[name=amount]").val().trim();

            if (date == "") {
                $.notify("Le champ date ne peut pas être vide", "error");
                return false;
            }

            if (description == "" ) {
                $.notify("Le champ description ne peut pas être vide", "error");
                return false;
            }

            if (amount == "") {
                $.notify("Le champ montant ne peut pas être vide", "error");
                return false;
            }

            document.getElementById('edit-expense-form').submit();
        }
    </script>


@endpush