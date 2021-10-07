<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo width="82" />
            </a>
        </x-slot>

        <div class="card-body">
            <!-- Session Status -->
            <x-auth-session-status class="mb-3" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-3" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <x-label for="username" :value="__('Username')" />

                    <x-input id="username" type="text" name="username" :value="old('username')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" type="password"
                             name="password"
                             required autocomplete="current-password" />
                </div>

                

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <a class="text-muted me-3 text-decoration-none" href="{{ route('register') }}">
                            {{ __('New here? Register') }}
                        </a>

                        <x-button>
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
