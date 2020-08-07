<div class="modal fade" id="modal-delete-expense" style="top: 50px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Supprimer la depense</h4>
            </div>
            <div class="modal-body">
                <form action="" id="delete-expense-form" method="POST">
                	@csrf
                    @method("DELETE")
                    <p class="">Voulez-vous vraiment supprimer la catégorie ?</p>

                </form>
            </div>
            <div class="modal-footer no-border">
                <div class="text-right">
                    <button class="btn btn-default btn-sm" data-dismiss="modal">Annuler</button>
                    <button class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-expense-form').submit();">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')

    <script>
        $(".open-modal-delete-expense").on('click', function(event) {
            event.preventDefault();

            var expense = $(this).data('expense');

            $("#modal-delete-expense").modal();

            var form = $("#delete-expense-form");

            form.attr('action', location.origin + '/expenses/'+ expense.id);
            
        });
    </script>


@endpush