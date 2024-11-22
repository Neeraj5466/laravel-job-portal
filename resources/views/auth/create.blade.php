<x-layout>

    <h1 class="m-4 text-center fw-bold text-secondary">Sign in to your account</h1>

    <x-card class="m-4 p-4">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <x-label for="email" :required="true">Email</x-label>
                <x-text-input name="email" />
            </div>

            <div class="mb-4">
                <x-label for="password" :required="true">Password</x-label>
                <x-text-input name="password" type="password" />
            </div>

            <div class="mb-4 d-flex justify-content-between fw-bold fs-5">
                <div>
                    <input class="form-check-input mx-1" type="checkbox" value="" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <div>
                    <a href="">Forget password?</a>
                </div>
            </div>

            <x-button class="w-100 ">Login</x-button>


        </form>
    </x-card>

</x-layout>
