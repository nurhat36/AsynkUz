<section class="bg-white p-3 m-3" >
<header>
    <h2 class="text-primary">
        {{ __('Delete Account') }}
    </h2>

    <p class="mt-1 text-muted">
        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
    </p>
</header>



            <button type="button" class="btn btn-danger" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#exampleModal">
                {{ __('Delete Account') }}
            </button>


            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                            @csrf
                            @method('delete')
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Are you sure you want to delete your account?') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                </p>

                                <div class="mt-6">
                                    <div data-mdb-input-init class="mb-4">
                                        <input id="password"   name="password" type="password" placeholder="{{ __('Password') }}" class="form-control" required/>
                                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                    </div>

                                </div>




                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">{{ __('Cancel') }}</button>
                            <input type="submit" class="btn btn-danger" value="{{ __('Delete') }}" data-mdb-ripple-init/>
                        </div>
                        </form>
                    </div>
                </div>
            </div>


</section>

