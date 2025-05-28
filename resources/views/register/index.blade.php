<style>
    body {
        background-color:rgb(255, 253, 253) !important;
    }
</style>

<x-layout title="Cadastrar">
    <div class="row h-100 d-flex justify-content-center">
        <div class="col-12 col-md-4 d-flex align-items-center">
            <div class="container w-75">
                <h1 class="display-5 text-center mb-2 ">Cadastre-se!</h1>
                <p class="text-center mb-5">E curta suas conversas.</p>
                <div class="card ">
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email: <span style="color: red;">*</span></label>
                                <input type="email" class="form-control" id="email" placeholder="Digite seu email" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha: <span style="color: red;">*</span></label>
                                <input type="password" class="form-control" id="password" placeholder="***********">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome: <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="name" placeholder="Digite seu nome completo">
                            </div>
                            <button type="button" class="btn btn-primary btn-lg w-100 d-flex align-items-center justify-content-center mt-4" id="btn_register">
                                <span class="material-symbols-outlined me-1">login</span>
                                Cadastrar-se
                            </button>
                            <p class="d-flex justify-content-center mt-3">Já possui cadastro? <a href="{{ route('login') }}" class="ms-1 fw-bold">Entrar</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>