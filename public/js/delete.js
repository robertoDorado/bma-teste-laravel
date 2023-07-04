const deleteBtn = document.querySelectorAll("[data-delete='deleteUser']")

const btnCancel = new DomManipulation('button').createElement()
.setClass('btn').setClass('btn-light').setText('Cancelar').element

if (deleteBtn) {
    for (i = 0; i < deleteBtn.length; i++) {
        deleteBtn[i].addEventListener('click', function (event) {
            event.preventDefault()

            const urlDelete = event.target.getAttribute('href')
            const idUser = event.target.dataset.id

            document.getElementById("btnModal").click()
            document.getElementById("modalTitle").innerHTML = "Atenção!"
            document.querySelector(".modal-body p").innerHTML = `Tem certeza que deseja deletar o usuário número #${idUser}`
            
            document.querySelector(".modal-footer").append(btnCancel)

            const btnDelete = new DomManipulation().getDataById('btnClose')
            .setText("Excluir").removeClass("btn-secondary").setClass("btn-danger").element

            btnCancel.addEventListener('click', function() {
                modal._element.click()
            })
            
            const xBtn = new DomManipulation().getDataById("xClose").element
            xBtn.addEventListener('click', function() {
                modal._element.click()
            })

            const token = document.querySelector('meta[name="csrf-token"]').content

            btnDelete.addEventListener('click', function() {
                fetch(urlDelete, { method: "POST", body: JSON.stringify({ 'idUser': idUser }), headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                } })
                .then(data => data.json())
                .then(function (data) {
                    
                    if (data.success) {
                        window.location.href = window.location.href
                    }
                })
            })
        })
    }
}