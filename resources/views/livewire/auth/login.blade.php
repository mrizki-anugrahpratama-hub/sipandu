<div x-data="{ showSplash: true, startAnim: false }" 
     x-init="setTimeout(() => { showSplash = false; setTimeout(() => startAnim = true, 100) }, 2000)" 
     class="h-screen w-screen flex flex-col md:flex-row bg-white overflow-hidden relative">

    <div x-show="showSplash" 
         x-transition:leave="transition ease-in duration-700"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-110"
         class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-slate-900">
        
        <div class="relative">
            <div class="absolute inset-0 rounded-full bg-blue-500 blur-2xl opacity-20 animate-pulse"></div>
            <div class="relative bg-white/10 p-6 rounded-3xl border border-white/20 backdrop-blur-md animate-bounce">
                <svg class="h-16 w-16 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V9a2 2 0 00-2-2h-2M10 11h4m-4 4h4" />
                </svg>
            </div>
        </div>
        <h1 class="mt-8 text-3xl font-light tracking-[0.3em] text-white animate-pulse">SIPANDU</h1>
        <div class="mt-4 w-48 h-0.5 bg-white/10 overflow-hidden relative">
            <div class="absolute inset-0 bg-blue-500 animate-[loading_2s_ease-in-out_infinite]"></div>
        </div>
    </div>

    <div x-show="startAnim"
         x-transition:enter="transition ease-out duration-1000"
         x-transition:enter-start="opacity-0 -translate-y-full md:-translate-y-0 md:-translate-x-full"
         x-transition:enter-end="opacity-100 translate-y-0 md:translate-x-0"
         class="h-[35vh] md:h-full md:w-1/2 bg-slate-900 flex items-center justify-center p-6 md:p-12 relative overflow-hidden transition-all">
        
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/40 to-slate-900/60 z-10"></div>
        
        <img src="{{ asset('bg-login/bakorwilmalang.jpg') }}"
             alt="SIPANDU Bakorwil 3 Malang"
             class="absolute inset-0 object-cover w-full h-full opacity-60 transform scale-105">
        
        <div class="relative z-20 text-center">
            <h1 x-show="startAnim"
                x-transition:enter="transition ease-out duration-1000 delay-500"
                x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="text-2xl md:text-5xl font-extrabold text-white tracking-tight uppercase leading-tight">
                Selamat Datang di <br> <span class="text-blue-400">Portal SIPANDU</span>
            </h1>
            <p x-show="startAnim"
               x-transition:enter="transition ease-out duration-1000 delay-700"
               x-transition:enter-start="opacity-0"
               x-transition:enter-end="opacity-100"
               class="mt-2 md:mt-6 text-xs md:text-xl text-blue-50 font-medium tracking-wide">
                Sistem Pengelolaan Arsip Terpadu <br> Badan Koordinasi Wilayah III Malang
            </p>
        </div>
    </div>

    <div class="h-[65vh] md:h-full flex-1 flex items-center justify-center p-4 md:p-12 bg-slate-50">
        <div x-show="startAnim"
            x-transition:enter="transition ease-out duration-1000 delay-1000"
            x-transition:enter-start="opacity-0 translate-y-12"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="max-w-sm w-full bg-white p-6 md:p-8 rounded-[2rem] shadow-[0_20px_50px_rgba(30,58,138,0.25)] border border-slate-50 flex flex-col justify-center overflow-hidden">
            
            <div class="text-center">
                <div x-show="startAnim"
                     x-transition:enter="transition duration-1000 delay-[1200ms] ease-out"
                     x-transition:enter-start="rotate-[180deg] scale-50 opacity-0"
                     x-transition:enter-end="rotate-0 scale-100 opacity-100"
                     class="mx-auto h-16 w-16 bg-gradient-to-tr from-blue-600 to-indigo-600 rounded-2xl hidden md:flex items-center justify-center mb-4 shadow-lg">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                </div>
                <h2 class="text-2xl md:text-3xl font-black text-slate-800 tracking-tighter uppercase">Silakan Masuk</h2>
                <div class="mt-1 h-0.5 w-12 bg-blue-500 mx-auto rounded-full"></div>
            </div>

            <form class="mt-4 md:mt-6 space-y-4 md:space-y-5" wire:submit.prevent="login">
                <div class="space-y-4">
                    <div class="relative pb-4">
                        <label class="block text-[10px] font-bold text-slate-400 mb-1.5 uppercase tracking-widest ml-1">Email</label>
                        <input wire:model="email" type="email" required 
                            class="w-full px-5 py-3 md:py-3.5 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:bg-white transition-all text-sm shadow-inner" 
                            placeholder="nama@email.com">
                        @error('email') 
                        <p class="absolute bottom-0 left-1 text-red-500 text-[9px] font-bold uppercase">{{ $message }}</p> 
                        @enderror
                    </div>

                    <div class="relative pb-4">
                        <label class="block text-[10px] font-bold text-slate-400 mb-1.5 uppercase tracking-widest ml-1">Password</label>
                        <input wire:model="password" type="password" required 
                            class="w-full px-5 py-3 md:py-3.5 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:bg-white transition-all text-sm shadow-inner" 
                            placeholder="••••••••">
                        @error('password') 
                        <p class="absolute bottom-0 left-1 text-red-500 text-[9px] font-bold uppercase">{{ $message }}</p> 
                        @enderror
                        @if (session()->has('error') || $errors->has('loginError'))
                        <p class="absolute bottom-0 left-1 text-red-500 text-[9px] font-bold uppercase">Email atau password salah.</p>
                        @endif
                    </div>
                </div>

                <div class="flex items-center px-1">
                    <input wire:model="remember" id="remember-me" type="checkbox" 
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-slate-300 rounded-lg cursor-pointer">
                    <label for="remember-me" class="ml-3 block text-xs text-slate-500 cursor-pointer">Ingat Saya</label>
                </div>

                <button type="submit" wire:loading.attr="disabled"
                    class="relative w-full h-12 md:h-14 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-bold rounded-xl shadow-lg transition-all active:scale-95 overflow-hidden uppercase tracking-widest text-xs">

                    <span wire:loading.remove>Masuk</span>

                    <div wire:loading.flex class="absolute inset-0 items-center justify-center bg-inherit z-10">
                        <div class="flex items-center justify-center space-x-2">
                            <svg class="animate-spin h-5 w-5 text-white" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span class="normal-case font-medium text-sm">MEMVERIFIKASI...</span>
                        </div>
                    </div>
                </button>
    
            </form>

            <p class="mt-4 md:mt-6 text-center text-[8px] md:text-[9px] text-slate-400 font-bold uppercase tracking-[0.2em]">
                &copy; 2026 Bakorwil 3 Malang
            </p>
        </div>
    </div>

    <style>
        @keyframes loading {
            0% { left: -100%; width: 30%; }
            50% { width: 60%; }
            100% { left: 100%; width: 100%; }
        }
    </style>
</div>