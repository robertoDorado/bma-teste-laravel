function mascaraData(input) {
    var valor = input.value;
    var exp = /\D/g;

    valor = valor.replace(exp, '')
    .replace(/(\d{2})(\d)/, '$1/$2')
    .replace(/(\d{2})(\d)/, '$1/$2')
    .replace(/(\d{4})\d+?$/, '$1');

    input.value = valor;
}

var campoData = document.getElementById('data-nascimento');
campoData.addEventListener('input', function() {
    mascaraData(this);
});