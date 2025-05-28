<link rel="stylesheet" href="{{ asset('css/app/chat/chat.css') }}" />

<x-layout title="Mensagens">
    <div class="row h-100">
        <div class="col-12 col-md-3 border-end">
            <div class="row border-bottom" style="background-color: #EEEFF2">
                <div class="d-flex align-items-center justify-content-between">
                    <img src="{{ auth()->user()->picture_url ?? asset('assets/imgs/avatar.png') }}" class="img-profile rounded-circle" alt="img-profile">
                    <p class="ms-4 fs-4"><strong>{{ auth()->user()->name }}</strong></p>
                    <button type="button" class="btn btn-danger" id="btn_logout">
                        <span class="material-symbols-outlined">logout</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-9 d-none d-md-flex align-items-center justify-content-center" style="background-color: #F3F4F4;">

        </div>
    </div>
</x-layout>

<script src="{{ asset('js/app/auth/logout.js') }}"></script>