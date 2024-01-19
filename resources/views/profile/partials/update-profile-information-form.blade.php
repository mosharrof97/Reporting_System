<section>
    <header>
        <h2 class="h3"> Profile Information </h2>

        <p class="mt-1 text-sm text-gray-600 dark-text-gray-400"> Update your account's profile information and email
            address. </p>
    </header>
    <div class="row">
        <div class="col-8">
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                <div class="mb-3">
                    <label for="name" class="form-label text-dark">Name</label>
                    <input id="name" name="name" type="text" class="form-control mt-1"
                        value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                    @if ($errors->has('name'))
                        <div class="text-danger mt-2">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label text-dark">Email</label>
                    <input id="email" name="email" type="email" class="form-control mt-1"
                        value="{{ old('email', $user->email) }}" required autocomplete="username">
                    @if ($errors->has('email'))
                        <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                    @endif

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800 dark-text-gray-200">Your email address is unverified.

                                <button form="send-verification"
                                    class="underline text-sm text-gray-600 dark-text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    Click here to re-send the verification email.
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-success">
                                    A new verification link has been sent to your email address.
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="d-flex align-items-center gap-4">
                    <button type="submit" class="btn btn-primary">Save</button>

                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark-text-gray-400">Saved</p>
                    @endif
                </div>
            </form>
        </div>
    </div>

</section>
