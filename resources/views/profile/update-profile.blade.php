<form action="" method="POST">
    <h4>
        {{ __('Profile Information') }}
    </h4>

    <p>
        {{ __('Update your account\'s profile information and email address.') }}
    </p>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

            <x-jet-label for="photo" value="{{ __('Photo') }}" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview">
                <span class="block rounded-full w-20 h-20" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('Select A New Photo') }}
            </x-jet-secondary-button>

            @if ($this->user->profile_photo_path)
            <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                {{ __('Remove Photo') }}
            </x-jet-secondary-button>
            @endif

            <x-jet-input-error for="photo" class="mt-2" />
        </div>
        @endif

        <!-- First Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="firstName" value="{{ __('First Name') }}" />
            <x-jet-input id="firstName" type="text" class="mt-1 block w-full" wire:model.defer="state.first_name" autocomplete="first_name" />
            <x-jet-input-error for="firstName" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="lastName" value="{{ __('Last Name') }}" />
            <x-jet-input id="lastName" type="text" class="mt-1 block w-full" wire:model.defer="state.last_name" autocomplete="last_name" />
            <x-jet-input-error for="lastName" class="mt-2" />
        </div>

        <!-- Contact Number -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="contactNumber" value="{{ __('Contact Number') }}" />
            <x-jet-input id="contactNumber" type="text" class="mt-1 block w-full" wire:model.defer="state.contact_number" autocomplete="contact_number" />
            <x-jet-input-error for="contactNumber" class="mt-2" />
        </div>

        <!-- Post Code -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="postCode" value="{{ __('Post Code') }}" />
            <x-jet-input id="postCode" type="text" class="mt-1 block w-full" wire:model.defer="state.post_code" autocomplete="post_code" />
            <x-jet-input-error for="postCode" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
    </x-jet-form-section>