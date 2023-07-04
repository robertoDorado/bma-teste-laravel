@extends('layouts.theme')
@extends('layouts.modal')

<style>
    div.dataTables_wrapper div.dataTables_length select {
        width:4rem !important;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        display:none;
    }
</style>
<div class="container" style="margin-top:2rem">
    @if (!empty($warningMessageUserId))
        <div class="alert alert-warning"><?= ucfirst($warningMessageUserId) ?></div>
    @endif
    <h1>Lista de usuarios</h1>
    <table id="tabela-dados" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Gênero</th>
                <th>País</th>
                <th>Salário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($users))
                @foreach ($users as $user)
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['gender'] ?></td>
                        <td><?= $user['country'] ?></td>
                        <td><?= numberFormatReal($user['salary'], 2) ?></td>
                        <td><a href="<?= url('/editar-usuario?idUser=' . $user['id'] . '') ?>" class="btn btn-primary">Editar</a>
                            <a data-delete="deleteUser" data-id="<?= $user['id'] ?>" href="<?= url('/excluir-usuario') ?>" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            <!-- Adicione mais linhas conforme necessário -->
        </tbody>
    </table>
    <!-- Componente de paginação -->
    <nav aria-label="pagination">
        <ul class="pagination justify-content-center">
            @if ($page > 1)           
                <li class="page-item">
                    <a class="page-link" href="<?= url('/') ?>" tabindex="-1">Anterior</a>
                </li>
            @endif
            @if ($totalPages > 1 && $page <= $totalPages)
                @for ($i = $init; $i <= $end; $i++)
                    @if ($page == $i)
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="<?= url('/?page=' . $i . '') ?>"><?= $i ?></a>
                        </li>
                    @else
                        <li class="page-item" aria-current="page">
                            <a class="page-link" href="<?= url('/?page=' . $i . '') ?>"><?= $i ?></a>
                        </li>
                    @endif
                @endfor
            @endif
            @if ($page != $totalPages)
                <li class="page-item">
                    <a class="page-link" href="<?= url('/?page=' . $totalPages . '') ?>">Próxima</a>
                </li>
            @endif
        </ul>
    </nav>
    <div class="actions">
        <a href="<?= url("/novo-usuario") ?>" class="btn btn-primary">Adicionar usuário</a>
    </div>
</div>
<script src="{{ asset('js/dom-manipulation.js') }}"></script>
<script src="{{ asset('js/delete.js') }}"></script>