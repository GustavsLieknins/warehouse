<x-guest-layout>
  <body class="bg-rose-500 flex justify-center items-center min-h-screen px-4 bg-[radial-gradient(at_center_bottom,#AD2B7B,#057AFD)]">

    <main class="bg-black/40 text-white backdrop-blur-lg p-6 sm:p-12 space-y-3 shadow-lg rounded-xl w-full max-w-sm relative 
      [&>div]:transition-all
      [&>div]:duration-300
      [&_label]:cursor-pointer
      [&_label]:transition-all 
      [&_label]:duration-300
      hover:[&_label]:text-pink-500
      hover:[&_:not(.field)>label]:underline">

      <h1 class="font-bold text-lg grid grid-cols-1 place-items-center transition-transform duration-300 scale-100 origin-left peer-checked/radio-1:scale-100 peer-checked/radio-2:scale-100 peer-checked/radio-3:scale-100">
        Log In
      </h1>

      <!-- Login Form -->
      <form method="POST" action="{{ route('login') }}" class="grid space-y-4">

        @csrf

        <!-- Username -->
        <div class="field">
          <label for="username">Username</label>
          <x-text-input id="username" class="peer w-full py-3 px-5 rounded-md bg-black/30 text-white border-none outline-none ring-0 transition-all duration-300 focus:bg-black/60" type="text" name="username" :value="old('username')" required autofocus autocomplete="username"/>
          <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="field">
          <label for="password">Password</label>
          <x-text-input id="password" class="peer w-full py-3 px-5 rounded-md bg-black/30 text-white border-none outline-none ring-0 transition-all duration-300 focus:bg-black/60" type="password" name="password" required autocomplete="current-password" />
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Login Button -->
        <div class="flex justify-between items-center">
          <x-primary-button class="w-full py-2 text-sm rounded-md text-white bg-sky-600/90 transition-all duration-300">
            {{ __('Log in') }}
          </x-primary-button>
        </div>

        <!-- Forgot Password and Register Links -->
        <div class="flex justify-center space-x-4 mt-4">
          <!-- Register Button -->
          <!-- <a href="{{ route('register') }}" class="px-3 py-1 text-xs rounded-md text-white bg-cyan-600 hover:bg-cyan-700 transition-all duration-300">
            {{ __('Register') }}
          </a> -->
          <!-- Forgot Password Link -->
          @if (Route::has('register'))
            <a class="text-indigo-600 hover:text-indigo-800 text-xs" href="{{ route('register') }}">
              {{ __('Dont have an account?') }}
            </a>
          @endif
        </div>

      </form>

    </main>

  </body>
</x-guest-layout>
