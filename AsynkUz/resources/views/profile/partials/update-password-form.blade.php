<section class="bg-white p-3 m-3" >
    <header>
        <h2 class="text-primary">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-muted">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="p-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="mb-4">
            <label class="form-label" for="update_password_current_password">{{ __('Current Password') }}</label>
            <input data-mdb-input-init  type="password"  id="update_password_current_password" name="current_password" class="form-control"  />
            @if($errors->updatePassword->has('current_password'))
                <small class="text-danger">{{ $errors->updatePassword->first('current_password') }}</small>
            @endif
        </div>

        <!-- New Password -->
        <div class="mb-4">
            <label class="form-label" for="update_password_password">{{ __('New Password') }}</label>
            <input data-mdb-input-init  type="password" id="update_password_password" name="password" class="form-control"  />
            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        @if($errors->updatePassword->has('password'))
                <small class="text-danger">{{ $errors->updatePassword->first('password') }}</small>
            @endif
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label class="form-label" for="update_password_password_confirmation">{{ __('Confirm Password') }}</label>
            <input data-mdb-input-init  type="password" id="update_password_password_confirmation" name="password_confirmation" class="form-control" autocomplete="new-password" />
            @if($errors->updatePassword->has('password_confirmation'))
                <small class="text-danger">{{ $errors->updatePassword->first('password_confirmation') }}</small>
            @endif
        </div>

        <!-- Save Button -->
        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p class="text-success" id="statusMessage">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>

    <!-- Status Message Auto Hide Script -->


</section>
