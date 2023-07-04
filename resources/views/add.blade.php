@extends('layouts.theme')
@extends('layouts.modal')

<div class="container">
    <h2>Formulário</h2>
    <form id="formUser">
        @csrf
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="nome" name="name" placeholder="Digite seu nome">
            <div style="display: none" id="nameAlert" class="alert alert-danger">Campo nome é obrigatório</div>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Digite seu e-mail">
            <div style="display: none" id="emailAlert" class="alert alert-danger">Campo email é obrigatório</div>
        </div>
        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" class="form-control" id="senha" name="password" placeholder="Digite sua senha">
            <div style="display: none" id="passwordAlert" class="alert alert-danger">Campo senha é obrigatório</div>
        </div>
        <div class="form-group">
            <label for="gender">Gênero:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="genero-masculino" value="masculino">
                <label class="form-check-label" for="genero-masculino">
                    Masculino
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="genero-feminino" value="feminino">
                <label class="form-check-label" for="genero-feminino">
                    Feminino
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="salary">Salário:</label>
            <div class="input-group">
                <input maxlength="13" class="form-control money" type="text" class="form-control" id="salario"
                    name="salary" placeholder="Digite o salário">
            </div>
        </div>
        <div class="form-group">
            <label for="birth">Data de Nascimento:</label>
            <input type="text" class="form-control" id="data-nascimento" name="birth" placeholder="dd/mm/yyyy">
        </div>
        <div class="mb-3">
            <label for="pais" class="form-label">País</label>
            <select class="form-select" id="country" name="country">
                <option value="">Selecione um país</option>
                <option value="brasil">Brasil</option>
                <option value="eua">Estados Unidos</option>
                <option value="canada">Canadá</option>
                <option value="japao">Japão</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="<?= url("/") ?>" id="cancelBtn" type="submit" class="btn btn-light">Cancelar</a>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<script src="{{ asset('js/date.js') }}"></script>
<script src="{{ asset('js/mask-money.js') }}"></script>
<script src="{{ asset('js/validate-forms.js') }}"></script>
<script src="{{ asset('js/fetch.js') }}"></script>
<div id="urlPost" data-post="<?= url('/novo-usuario') ?>"></div>
