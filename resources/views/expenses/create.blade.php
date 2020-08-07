<div class="modal fade" id="modal-create-expense" style="top: 50px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Ajouter une depense</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('expenses.store') }}" id="create-expense-form" method="POST">
                	@csrf
                    <label>Date</label>
                    <div class="timepicker-input input-icon form-group">
                        <i class="ti-calendar"></i>
                        <input type="text" name="date" class="form-control datepicker-1" placeholder="Date de la depense" data-provide="datepicker">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" placeholder="Décription de la dépense" required="" class="form-control">
                    </div>

                    <div class="form-group expense-type">
                        <label>Categorie Depense</label>
                        <select name="expense_type_id" id="expense-type-create">
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
                        <input type="number" name="amount" placeholder="Enter le montant" reuqired="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Reçue</label>
                        <input type="file" name="receipt" placeholder="Joigner le reçue" class="form-control">
                    </div>

                </form>
            </div>
            <div class="modal-footer no-border">
                <div class="text-right">
                    <button class="btn btn-default btn-sm" data-dismiss="modal">Annuler</button>
                    <button class="btn btn-primary btn-sm" onclick="event.preventDefault(); storeExpense()">Ajouter</button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')

    <script>
        $('#expense-type-create').selectize({
            sortField: 'text'
        });
    </script>

    <script>
        function storeExpense() {
            var modal = $("#modal-create-expense");
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

            document.getElementById('create-expense-form').submit();
        }
    </script>

@endpush