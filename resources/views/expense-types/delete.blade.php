<div class="modal fade" id="modal-delete-expense-type" style="top: 50px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Supprimer la categorie depense</h4>
            </div>
            <div class="modal-body">
                <form action="" id="delete-expense-type-form" method="POST">
                	@csrf
                    @method("DELETE")
                    <p class="">Voulez-vous vraiment supprimer la categorie depense ?</p>

                </form>
            </div>
            <div class="modal-footer no-border">
                <div class="text-right">
                    <button class="btn btn-default btn-sm" data-dismiss="modal">Annuler</button>
                    <button class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-expense-type-form').submit();">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')

    <script>
        $(".open-modal-delete-expense-type").on('click', function(event) {
            event.preventDefault();

            var expenseType = $(this).data('expense-type');

            $("#modal-delete-expense-type").modal();

            var form = $("#delete-expense-type-form");

            form.attr('action', location.origin + '/expense-types/'+ expenseType.id);
            
        });
    </script>


@endpush