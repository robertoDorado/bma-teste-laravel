const formUser = document.getElementById("formUser")
const formUserUpdate = document.getElementById("formUserUpdate")

if (formUser) {
    formUser.addEventListener('submit', function (e) {
        e.preventDefault()
        validarFormulario()
    
        const formData = new FormData(this)
        const urlPost = document.getElementById("urlPost").dataset.post
    
        fetch(urlPost, {body: formData, method: "POST"})
        .then(data => data.json())
        .then(function (data) {
            
            const urlHome = document.getElementById("cancelBtn").getAttribute("href")
            if (data.success) {
                document.getElementById("btnModal").click()
                document.getElementById("modalTitle").innerHTML = "Usuario cadastrado com sucesso"
                document.querySelector(".modal-body p").innerHTML = "Parabéns, o seu registro foi armazenado com sucesso"
                document.getElementById("btnClose").addEventListener('click', function () {
                    window.location.href = urlHome
                })
    
                document.getElementById("xClose").addEventListener('click', function () {
                    window.location.href = urlHome
                })
            }
    
            if (data.email_warning) {
                document.getElementById("btnModal").click()
                document.getElementById("modalTitle").innerHTML = "Erro ao cadastrar e-mail"
                document.querySelector(".modal-body p").innerHTML = data.email_warning.charAt(0).toUpperCase() + data.email_warning.slice(1);
                document.getElementById("btnClose").addEventListener('click', function () {
                    window.location.href = urlHome
                })
    
                document.getElementById("xClose").addEventListener('click', function () {
                    window.location.href = urlHome
                })
            }
        })
    })
}

if (formUserUpdate) {
    formUserUpdate.addEventListener('submit', function (event) {
        event.preventDefault()

        validarFormulario()
    
        const formData = new FormData(this)
        const urlPost = document.getElementById("urlPost").dataset.post
    
        fetch(urlPost, {body: formData, method: "POST"})
        .then(data => data.json())
        .then(function (data) {
            
            const urlHome = document.getElementById("cancelBtn").getAttribute("href")
            if (data.success) {
                document.getElementById("btnModal").click()
                document.getElementById("modalTitle").innerHTML = "Usuario atualizado com sucesso"
                document.querySelector(".modal-body p").innerHTML = "Parabéns, o seu registro foi atualizado com sucesso"
                document.getElementById("btnClose").addEventListener('click', function () {
                    window.location.href = urlHome
                })
    
                document.getElementById("xClose").addEventListener('click', function () {
                    window.location.href = urlHome
                })
            }
    
            if (data.email_warning) {
                document.getElementById("btnModal").click()
                document.getElementById("modalTitle").innerHTML = "Erro ao cadastrar e-mail"
                document.querySelector(".modal-body p").innerHTML = data.email_warning.charAt(0).toUpperCase() + data.email_warning.slice(1);
                document.getElementById("btnClose").addEventListener('click', function () {
                    window.location.href = urlHome
                })
    
                document.getElementById("xClose").addEventListener('click', function () {
                    window.location.href = urlHome
                })
            }
        })
    })
}