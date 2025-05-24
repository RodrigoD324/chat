<style>
    @media (max-width: 768px) {
        .container {
            flex-direction: column;
            gap: 10px;
        }
    }
</style>

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
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Digite seu email" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="password" placeholder="***********">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Acessar</button>
                    </div>
                </form>
                <!-- </div>
                </div> -->
            </div>
        </div>
    </div>
</x-layout>