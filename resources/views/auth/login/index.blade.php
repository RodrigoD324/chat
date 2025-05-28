<x-layout title="Acessar">
    <div class="row h-100">
        <div class="col-8 d-none d-md-flex align-items-center justify-content-center" style="background-color: #F3F4F4;">
            <img src="{{ asset('assets/imgs/people-talking.png') }}" class="img-fluid" alt="people-talking-with-their-phones">
        </div>
        <div class="col-12 col-md-4 d-flex align-items-center">
            <div class="container w-75">
                <!-- <img src="{{ asset('assets/imgs/chat.png') }}" class="img-fluid" alt="ballon-chat"> -->
                <h1 class="display-5 text-center mb-2 ">Acesse seu Chat</h1>
                <p class="text-center mb-5">Converse com seus amigos e familiares de forma prática.</p>
                <!-- <div class="card">
                    <div class="card-body"> -->
                <form>
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Digite seu email" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="password" placeholder="***********">
                    </div>
                    <button type="button" class="btn btn-primary btn-lg w-100 d-flex align-items-center justify-content-center" id="btn_login">
                        <span class="material-symbols-outlined me-1">login</span>
                        Acessar
                    </button>
                </form>
                <div id="g_id_onload"
                    data-client_id="{{ env('GOOGLE_CLIENT_ID') }}"
                    data-login_uri="{{ route('auth.google')}}"
                    data-auto_prompt="false">
                </div>
                <div class="g_id_signin d-flex justify-content-center mt-3"
                    data-type="standard"
                    data-size="large"
                    data-theme="outline"
                    data-text="sign_in_with"
                    data-shape="rectangular"
                    data-logo_alignment="left">
                </div>
                <p class="d-flex justify-content-center mt-3">Novo/a no Chat? <a href="{{ route('register.index') }}" class="ms-1 fw-bold">Cadastre-se!</a></p>
            </div>
        </div>
    </div>
</x-layout>

<script src="https://accounts.google.com/gsi/client" async defer></script>
<script src="{{ asset('js/app/auth/login/login.js') }}"></script>