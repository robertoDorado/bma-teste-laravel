<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class Crud extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = 5;
        $page = !empty($request->query('page')) ? $request->query('page') : 1;
        $init = ($page * $limit) - $limit;

        $user = new User();

        $users = $user
            ->select(['id', 'name', 'email', 'gender', 'country', 'salary', 'date_of_birth'])
            ->offset($init)->limit($limit)->get();

        $limPage = 4;
        $totalRegisters = $user->count();

        $totalPages = ceil($totalRegisters / $limit);
        $init = ((($page - $limPage) > 1) ? $page - $limPage : 1);
        $end = ((($page + $limPage) < $totalPages) ? $page + $limPage : $totalPages);

        return view('home', [
            'users' => $users,
            'totalPages' => $totalPages,
            'init' => $init,
            'end' => $end,
            'page' => $page,
            'warningMessageUserId' => session()->get('warning_id_user')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {

            $user = new User();

            if (empty($request->input('email')) || empty($request->input('name')) || empty($request->input('password'))) {
                throw new \Exception("erro, campo e-mail, nome e senha são obrigatórios");
            }

            if (!preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/", $request->input('email'))) {
                throw new \Exception("tipo de e-mail inválido");
            }

            if (strlen($request->input('password')) < 8) {
                throw new \Exception("a senha precisa ter no minimo 8 caracteres");
            }

            if (!empty($request->input('birth'))) {

                $dateObj = DateTime::createFromFormat("d/m/Y", $request->input('birth'));

                if ($dateObj->format("d/m/Y") !== $request->input('birth')) {
                    throw new \Exception("A data de nascimento é inválida.");
                }

                $birth = formatDate($request->input('birth'), "d/m/Y", "Y-m-d");
            }

            if (!empty($request->input("salary"))) {
                $salary = onlyNumber($request->input("salary"));
            }

            $findEmail = $user->where('email', $request->input('email'))->first();

            if (!empty($findEmail)) {
                echo json_encode(['email_warning' => 'este e-mail já está cadastrado no banco de dados']);
                exit;
            }

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->date_of_birth = empty($birth) ? null : $birth;
            $user->gender = empty($request->input('gender')) ? null : $request->input('gender');
            $user->country = empty($request->input('country')) ? null : $request->input('country');
            $user->password = password_hash($request->input('password'), PASSWORD_DEFAULT);
            $user->salary = empty($salary) ? null : $salary;
            if (!$user->save()) {
                throw new \Exception("erro ao persistir o usuario");
            }

            echo json_encode(['success' => true]);
            exit;
        }

        echo view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->isMethod('post')) {

            if (empty($request->input('email')) || empty($request->input('name')) || empty($request->input('password'))) {
                throw new \Exception("erro, campo e-mail, nome e senha são obrigatórios");
            }

            if (preg_match("/[^\d]+/", $request->input('idUser'))) {
                throw new \Exception('parametro id usuario é obrigatório ser numérico');
            }

            if (strlen($request->input('password')) < 8) {
                throw new \Exception("a senha precisa ter no minimo 8 caracteres");
            }

            if (!preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/", $request->input('email'))) {
                throw new \Exception("tipo de e-mail inválido");
            }

            if (empty($request->input('idUser'))) {
                throw new \Exception("parametro id usuario é obrigatório");
            }

            if (!empty($request->input('birth'))) {

                $dateObj = DateTime::createFromFormat("d/m/Y", $request->input('birth'));

                if ($dateObj->format("d/m/Y") !== $request->input('birth')) {
                    throw new \Exception("A data de nascimento é inválida.");
                }

                $birth = formatDate($request->input('birth'), "d/m/Y", "Y-m-d");
            }

            if (!empty($request->input("salary"))) {
                $salary = onlyNumber($request->input("salary"));
            }

            $user = User::find($request->input('idUser'));

            if (empty($user)) {
                throw new \Exception('usuario não encontrado');
            }

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->date_of_birth = empty($birth) ? null : $birth;
            $user->gender = empty($request->input('gender')) ? null : $request->input('gender');
            $user->country = empty($request->input('country')) ? null : $request->input('country');
            $user->password = password_hash($request->input('password'), PASSWORD_DEFAULT);
            $user->salary = empty($salary) ? null : $salary;
            if (!$user->save()) {
                throw new \Exception("erro ao persistir o usuario");
            }

            echo json_encode(['success' => true]);
            exit;
        }

        if (preg_match("/[^\d]+/", $request->query('idUser'))) {
            return redirect('/')->with('warning_id_user', 'parametro id usuario é obrigatório ser numérico');
        }

        if (empty($request->query('idUser'))) {
            return redirect('/')->with('warning_id_user', 'parametro id usuario é obrigatório');
        }

        $user = User::find($request->query('idUser'));

        if (empty($user)) {
            return redirect('/')->with('warning_id_user', 'usuario não encontrado');
        }

        echo view(
            'update',
            ['user' => $user]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->isMethod('post')) {

            $payload = $request->json()->all();
            
            if (preg_match("/[^\d]+/", $payload['idUser'])) {
                throw new \Exception('id do usuario está inválido');
            }

            $user = User::find($payload['idUser']);

            if (empty($user)) {
                throw new \Exception("usuario não encontrado");
            }

            $user->delete();
            echo json_encode(['success' => true]);
        }
    }
}
