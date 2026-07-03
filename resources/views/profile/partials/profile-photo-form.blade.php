<section class="bg-white rounded-2xl shadow-sm p-8">

    <header>
        <h2 class="text-2xl font-bold text-[#235347]">
            Foto Profil
        </h2>

        <p class="text-gray-500 mt-2">
            Unggah, ganti, atau hapus foto profil Anda.
        </p>
    </header>

    {{-- Upload Foto --}}
    <form
        method="POST"
        action="{{ route('profile.photo.update') }}"
        enctype="multipart/form-data"
        class="mt-8">

        @csrf
        @method('PATCH')

        <div class="flex flex-col md:flex-row items-center gap-8">

            {{-- Avatar --}}
            @if($user->profile_photo)

                <img
                    src="{{ Storage::url($user->profile_photo) }}"
                    alt="Foto Profil"
                    class="w-32 h-32 rounded-full object-cover border-4 border-[#8EB69E] shadow">

            @else

                <div
                    class="w-32 h-32 rounded-full bg-[#235347]
                           text-white flex items-center justify-center
                           text-5xl font-bold shadow">

                    {{ strtoupper(substr($user->name,0,1)) }}

                </div>

            @endif

            <div class="flex-1">

                <input
                    type="file"
                    name="profile_photo"
                    accept=".jpg,.jpeg,.png,.webp"
                    class="block w-full text-sm text-gray-700
                           file:mr-4
                           file:px-4
                           file:py-2
                           file:rounded-lg
                           file:border
                           file:border-gray-300
                           file:bg-white
                           file:text-gray-700
                           file:font-medium
                           hover:file:bg-gray-100">

                <p class="text-sm text-gray-500 mt-2">
                    Format: JPG, JPEG, PNG, WEBP • Maksimal 2 MB
                </p>

                @error('profile_photo')
                    <p class="text-sm text-red-600 mt-2">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mt-6">
                    <x-primary-button>
                        Upload Foto
                    </x-primary-button>
                </div>

            </div>

        </div>

    </form>

    {{-- Hapus Foto --}}
    @if($user->profile_photo)

        <form
            method="POST"
            action="{{ route('profile.photo.delete') }}"
            class="mt-6 border-t pt-6">

            @csrf
            @method('DELETE')

            <x-danger-button
                onclick="return confirm('Yakin ingin menghapus foto profil?')">

                Hapus Foto

            </x-danger-button>

        </form>

    @endif

</section>