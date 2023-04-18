<form action="{{ route('popping') }}" method="POST" enctype="multipart/form-data"
    class="container-create-product--form_form">
    @csrf
    <div class="container-create-product--form_control">
        <div class="container-create-product--form_input container-form">
            <div>
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <div>
                    <input id="name" type="name"
                        class="container-form--field--input @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                    @error('name')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="price" class="form-label">{{ __('Price') }}</label>
                <div>
                    <input id="price" type="number" step="0.01"
                        class="container-form--field--input @error('price') is-invalid @enderror" name="price"
                        value="{{ old('price') }}" required autocomplete="price" autofocus placeholder="price">
                    @error('price')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div>
            <div class="dragger-wrapper">
                <div id="dragger-popping" class="dragger-wrapper--drag">
                    <div id="container_input">
                        <label for="image" class="form-label"><i class="fa-solid fa-images"></i></label>
                        <button type="button" class="btn btn-secondary" onclick="browseFileHandler()">Browser
                            file</button>
                    </div>
                    <input id="image" type="file" hidden
                        class="container-form--field--input @error('image') is-invalid @enderror" name="image"
                        required>
                    @error('image')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div id="filename-popping" class="filename-class"></div>
            </div>
        </div>
    </div>
    <div class="container-btn">
        <button type="submit" class="btn btn-secondary">
            {{ __('Create') }}
        </button>
    </div>
</form>
