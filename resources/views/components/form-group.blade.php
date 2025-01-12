<div class="flex flex-col gap-1 text-text-100">
    <label for="{{ $id }}" class="w-fit">{{ $label }}</label>
    
    @if ($inputTag == 'input')
        {{-- element input --}}
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $id }}"
            value="{{ $value ?? null }}"
            class="w-full border-2 border-primary-500 focus:outline-none focus:border-primary-400 transition-colors duration-500 ease rounded-lg p-1 bg-transparent placeholder:text-text-500 text-text-300 {{ $class ?? '' }}"
            placeholder="{{ $placeholder }}"
            {{ $attributes ?? null}}
            required
        />

        {{-- khusus field password --}}
        @if ($id == 'password')
            <small id="passwordHelp" class="mt-1 text-xs text-text-500" style="display: none">
                Password minimal 8 karakter!
            </small>
            <script>
                document.getElementById("password").addEventListener("input", () => {
                    let password = document.getElementById("password").value;
                    const passwordHelp = document.getElementById("passwordHelp");
                    if (password.length < 8) {
                        passwordHelp.style.display = "block";
                    } else {
                        passwordHelp.style.display = "none";
                    }
                });
            </script>
        @elseif ($id == 'password_confirmation')
            <small id="passwordInvalid" class="mt-1 text-xs text-text-500" style="display: none">
                Password tidak sesuai!
            </small>
            <script>
                document.getElementById("password_confirmation").addEventListener("input", () => {
                    let password = document.getElementById("password").value;
                    let passwordConfirmation = document.getElementById("password_confirmation").value;
                    const passwordInvalid = document.getElementById("passwordInvalid");

                    if (passwordConfirmation !== password && passwordConfirmation.length > 0) {
                        passwordInvalid.style.display = "block";
                    } else {
                        passwordInvalid.style.display = "none";
                    }
                });
            </script>
        @endif
    @elseif ($inputTag == 'textarea')
        <textarea
            name="{{ $name }}"
            id="{{ $id }}"
            class="w-full border-2 border-primary-500 focus:outline-none focus:border-primary-400 transition-colors duration-500 ease rounded-lg p-1 bg-transparent placeholder:text-text-500 text-text-300"
            placeholder="{{ $placeholder }}"
            required
        >{{ $value ?? null }}</textarea>
    @endif
    
</div>
