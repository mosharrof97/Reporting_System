<section>
    <header>
        <h2 class="h3"> Update Password
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark-text-gray-400">Ensure your account is using a long, random password to
            stay secure.</p>
    </header>
    <div class="row">
        <div class="col-8">
            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="update_password_current_password" class="form-label text-dark">Current Password</label>
                    <input type="password" id="update_password_current_password" name="current_password"
                        class="form-control" autocomplete="current-password">
                    @if ($errors->updatePassword->has('current_password'))
                        <div class="text-danger mt-2">{{ $errors->updatePassword->first('current_password') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="update_password_password" class="form-label text-dark">New Password</label>
                    <input type="password" id="update_password_password" name="password" class="form-control"
                        autocomplete="new-password">
                    @if ($errors->updatePassword->has('password'))
                        <div class="text-danger mt-2">{{ $errors->updatePassword->first('password') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="update_password_password_confirmation" class="form-label text-dark">Confirm
                        Password</label>
                    <input type="password" id="update_password_password_confirmation" name="password_confirmation"
                        class="form-control" autocomplete="new-password">
                    @if ($errors->updatePassword->has('password_confirmation'))
                        <div class="text-danger mt-2">{{ $errors->updatePassword->first('password_confirmation') }}
                        </div>
                    @endif
                </div>

                <div class="d-flex align-items-center gap-4">
                    <button type="submit" class="btn btn-primary">Save</button>

                    @if (session('status') === 'password-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark-text-gray-400"> Save</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
