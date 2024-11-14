<x-guest-layout>
  <body class="bg-rose-500 flex justify-center items-center min-h-screen px-4 bg-[radial-gradient(at_center_bottom,#AD2B7B,#057AFD)]">

    <main class="bg-black/40 text-white backdrop-blur-lg p-6 sm:p-12 space-y-4 shadow-lg rounded-xl w-full max-w-sm relative
      [&>div]:transition-all
      [&>div]:duration-300">

      <!-- Instruction Text -->
      <div class="text-sm text-gray-300 mb-4">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
      </div>

      <!-- Session Status -->
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <!-- Password Reset Form -->
      <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div class="field">
          <x-input-label for="email" :value="__('Email')" />
          <x-text-input id="email" class="w-full mt-1 py-3 px-5 rounded-md bg-black/30 text-white border-none outline-none ring-0 transition-all duration-300 focus:bg-black/60" 
                        type="email" name="email" :value="old('email')" required autofocus />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-between mt-4">
          <x-primary-button class="w-full py-2 text-sm rounded-md text-white bg-sky-600/90 transition-all duration-300 hover:bg-sky-700">
            {{ __('Email Password Reset Link') }}
          </x-primary-button>
        </div>
      </form>

      <!-- Back to Login Link -->
      <div class="text-center mt-4">
        <a href="{{ route('login') }}" class="text-xs text-cyan-400 hover:text-cyan-600 transition-all duration-300">
          {{ __('Back to Log In') }}
        </a>
      </div>

    </main>
  </body>
</x-guest-layout>
