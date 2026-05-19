<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6 text-center">
        <h2 class="text-xl font-extrabold text-slate-900">Login Admin</h2>
        <p class="text-xs text-slate-400 font-semibold mt-1">Masukkan kredensial admin Anda untuk mengelola pengajuan.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div class="space-y-1">
            <label for="email" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Email *</label>
            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="admin@domain.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-1">
            <label for="password" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Password *</label>
            <x-text-input id="password" class="block w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between pt-2">
            <label for="remember_me" class="inline-flex items-center cursor-pointer select-none">
                <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-[#000B7E] focus:ring-[#000B7E]/20 focus:ring-offset-0 focus:ring-1" name="remember">
                <span class="ms-2 text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-xs font-bold text-slate-400 hover:text-[#000B7E] uppercase tracking-wider transition-colors" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <x-primary-button class="w-full justify-center py-3.5 tracking-wider font-extrabold text-xs">
                {{ __('Masuk Ke Panel') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
