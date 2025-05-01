@extends('frontend.master')

@section('title','Sign Up')

@section('body')

<!-- Main Content -->
<main class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md">
        <h2 class="text-4xl font-bold text-gray-900 mb-6">Create an Account</h2>

        <div class="text-right mb-8">
            <p class="text-gray-600">
                Already have an account? <a href="{{route('login')}}" class="text-purple font-medium">Login</a>
            </p>
        </div>
        <!-- Registration Form -->
{{--        <form>--}}
{{--            <div class="space-y-6">--}}
{{--                <!-- Full Name Field -->--}}
{{--                <div>--}}
{{--                    <label for="fullname" class="block text-sm font-medium text-gray-900 mb-2">--}}
{{--                        Full Name--}}
{{--                    </label>--}}
{{--                    <div class="relative">--}}
{{--                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">--}}
{{--                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <input id="fullname" name="fullname" type="text" placeholder="John Doe" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Email Address Field -->--}}
{{--                <div>--}}
{{--                    <label for="email" class="block text-sm font-medium text-gray-900 mb-2">--}}
{{--                        Email Address--}}
{{--                    </label>--}}
{{--                    <div class="relative">--}}
{{--                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">--}}
{{--                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />--}}
{{--                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <input id="email" name="email" type="email" placeholder="john.doe@example.com" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Password Field -->--}}
{{--                <div>--}}
{{--                    <label for="password" class="block text-sm font-medium text-gray-900 mb-2">--}}
{{--                        Password--}}
{{--                    </label>--}}
{{--                    <div class="relative">--}}
{{--                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">--}}
{{--                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <input id="password" name="password" type="password" placeholder="••••••••••••" class="block w-full pl-10 pr-10 py-3 border 닿 border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">--}}
{{--                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">--}}
{{--                            <button type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none" id="toggle-password">--}}
{{--                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />--}}
{{--                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />--}}
{{--                                </svg>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Confirm Password Field -->--}}
{{--                <div>--}}
{{--                    <label for="confirm-password" class="block text-sm font-medium text-gray-900 mb-2">--}}
{{--                        Confirm Password--}}
{{--                    </label>--}}
{{--                    <div class="relative">--}}
{{--                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">--}}
{{--                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <input id="confirm-password" name="confirm-password" type="password" placeholder="••••••••••••" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Terms and Conditions Checkbox -->--}}
{{--                <div class="flex items-start">--}}
{{--                    <div class="flex items-center h-5">--}}
{{--                        <input id="terms" name="terms" type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">--}}
{{--                    </div>--}}
{{--                    <div class="ml-3 text-sm">--}}
{{--                        <label for="terms" class="font-medium text-gray-700">I agree to the <a href="#" class="text-purple">Terms and Conditions</a></label>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Sign Up Button -->--}}
{{--                <div>--}}
{{--                    <button type="submit" class="w-full flex justify-between items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">--}}
{{--                        <span>Sign Up</span>--}}
{{--                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="space-y-6">
                <!-- Full Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-900 mb-2">
                        Full Name
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="name" name="name" type="text" placeholder="John Doe" value="{{ old('name') }}" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                    </div>
                </div>

                <!-- Email Address Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-900 mb-2">
                        Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884 brandsL10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                        <input id="email" name="email" type="email" placeholder="john.doe@example.com" value="{{ old('email') }}" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                    </div>
                </div>

                <!-- Mobile Field -->
                <div>
                    <label for="mobile" class="block text-sm font-medium text-gray-900 mb-2">
                        Mobile Number
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                        </div>
                        <input id="mobile" name="mobile" type="text" placeholder="+1234567890" value="{{ old('mobile') }}" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-900 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="password" name="password" type="password" placeholder="••••••••••••" class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none" id="toggle-password">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Confirm Password Field -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-900 mb-2">
                        Confirm Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="password_confirmation" name="password_confirmation" type="password" placeholder="••••••••••••" class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button type="button" class="text-gray-400 hover:text-gray-500 focus:focus:outline-none" id="toggle-confirm-password">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Terms and Conditions Checkbox -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="terms" name="terms" type="checkbox" value="1" class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="font-medium text-gray-700">I agree to the <a href="#" class="text-purple-600 hover:text-purple-500">Terms and Conditions</a></label>
                    </div>
                </div>

                <!-- Sign Up Button -->
                <div>
                    <button type="submit" class="w-full flex justify-between items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        <span>Sign Up</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>

{{--<script>--}}
{{--    // Toggle password visibility--}}
{{--    document.getElementById('toggle-password').addEventListener('click', function() {--}}
{{--        const passwordInput = document.getElementById('password');--}}
{{--        if (passwordInput.type === 'password') {--}}
{{--            passwordInput.type = 'text';--}}
{{--        } else {--}}
{{--            passwordInput.type = 'password';--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
<script>
    // Toggle password visibility
    document.getElementById('toggle-password').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
    });

    // Toggle confirm password visibility
    document.getElementById('toggle-confirm-password').addEventListener('click', function() {
        const confirmPasswordInput = document.getElementById('password_confirmation');
        confirmPasswordInput.type = confirmPasswordInput.type === 'password' ? 'text' : 'password';
    });
</script>
@endsection
