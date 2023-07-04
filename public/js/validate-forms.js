function validarFormulario() {
    // Obter referências aos campos do formulário
    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;

    if (nome == '') {
        document.getElementById("nameAlert").style.display = 'block'
        return false
    }else {
        document.getElementById("nameAlert").style.display = 'none'
    }
    
    if (email == '') {
        document.getElementById("emailAlert").style.display = 'block'
        return false
    }else {
        document.getElementById("emailAlert").style.display = 'none'
    }
    
    if (senha == '') {
        document.getElementById("passwordAlert").style.display = 'block'
        return false
    }else {
        document.getElementById("passwordAlert").style.display = 'none'
    }

    // Validar o formato do e-mail usando uma expressão regular
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById("emailAlert").innerHTML = 'Por favor, insira um e-mail válido.'
        document.getElementById("emailAlert").style.display = 'block'
        return false;
    }

    // Validar a senha com pelo menos 6 caracteres
    if (senha.length < 8) {
        document.getElementById("passwordAlert").innerHTML = 'A senha deve ter pelo menos 8 caracteres.'
        document.getElementById("passwordAlert").style.display = 'block'
        return false;
    }

    // Se todos os campos forem válidos, o formulário será enviado
    return true;
}