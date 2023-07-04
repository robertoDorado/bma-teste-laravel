<button style="display:none" id="btnModal" class="btn btn-primary">Clique aqui</button>

<div id="modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle" class="modal-title">Meu Modal</h5>
                <button type="button" id="xClose" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Este é o conteúdo do meu modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnClose" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>

<script>
    var btnModal = document.getElementById("btnModal");
    var modal = new bootstrap.Modal(document.getElementById("modal"));

    btnModal.addEventListener("click", function() {
        modal.show();
    });
</script>