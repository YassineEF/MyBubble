<form action="{{ route('premade') }}" method="POST" enctype="multipart/form-data"
    class="container-create-product--form_form">
    @csrf
    <div class="container-create-product--form_control">
        <div class="container-create-product--form_input container-form">
            <div>
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <div>
                    <input id="name-premade" type="name"
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
                    <input id="price-premade" type="number" step="0.01"
                        class="container-form--field--input @error('price') is-invalid @enderror" name="price"
                        value="{{ old('price') }}" required autocomplete="price" autofocus placeholder="price">
                    @error('price')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="description" class="form-label">{{ __('Description') }}</label>
                <div>
                    <textarea id="description" class="@error('description') is-invalid @enderror" name="description"
                        value="{{ old('description') }}" required autocomplete="description" autofocus placeholder="description"></textarea>
                    @error('description')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div>
            <div class="dragger-wrapper">
                <div id="dragger-premade" class="dragger-wrapper--drag">
                    <div id="container_input-premade">
                        <label for="image" class="form-label"><i class="fa-solid fa-images"></i></label>
                        <button type="button" class="btn btn-secondary" onclick="browseFileHandlerPremade()">Browser
                            file</button>
                    </div>
                    <input id="image-premade" type="file" hidden
                        class="container-form--field--input @error('image') is-invalid @enderror" name="image"
                        required>
                    @error('image')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div id="filename-premade" class="filename-class"></div>
            </div>
        </div>
    </div>
    <div class="container-btn">
        <button type="submit" class="btn btn-secondary">
            {{ __('Create') }}
        </button>
    </div>
</form>
