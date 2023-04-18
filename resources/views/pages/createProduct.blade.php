@extends('layouts.main')
@section('content')
    <div class="main-home--form container-create-product column">
        <div>
            <h1>{{ __('Create ur product') }}</h1>
            <nav>
                <ul class="choose-nav">
                    <li class="active">Tea</li>
                    <li>Popping</li>
                    <li>Premade</li>
                </ul>
            </nav>
        </div>
        <div class="container-create-product--form">
            <div id="form-tea">
                @component('layouts.formCreate.formProduct')
                @endcomponent
            </div>
            <div id="form-popping" class="invisible-form">
                @component('layouts.formCreate.formPopping')
                @endcomponent
            </div>
            <div id="form-premade" class="invisible-form">
                @component('layouts.formCreate.formPremade')
                @endcomponent
            </div>
        </div>
    </div>
    <script>
        // drag and drop image
        const dragger = document.getElementById("dragger-popping");
        const fileSelector = document.querySelector("#dragger-popping #image");
        const draggerBtn = document.querySelector("#dragger-popping button");
        const draggerText = document.querySelector("#dragger-popping label");
        const draggerDetails = document.getElementById("filename-popping");
        const containerInput = document.getElementById('container_input');

        function browseFileHandler() {
            fileSelector.click();
        }
        if (dragger) {
            let file;
            const newImg = document.createElement('img');
            fileSelector.addEventListener("change", (e) => {
                file = e.target.files[0];
                uploadFileHander(file);
            });
            const uploadFileHander = (file) => {
                const ValidExt = ["image/jpeg", "image/jpg", "image/png"];
                if (ValidExt.includes(file.type)) {
                    const fileReader = new FileReader();
                    fileReader.onload = () => {
                        const fileUrl = fileReader.result;
                        newImg.setAttribute("src", fileUrl);
                        newImg.setAttribute("id", "img-drag");
                        const imgDesc = `<p>${file.name.split(".")[0]}</p><i class="fa-solid fa-trash"></i>`;
                        containerInput.replaceWith(newImg);
                        draggerDetails.innerHTML = imgDesc;
                    };
                    fileReader.readAsDataURL(file);
                }
                draggerDetails.addEventListener("click", () => {
                    newImg.replaceWith(containerInput);
                    draggerDetails.innerHTML = "";
                });
            };
        }

        const draggerTea = document.getElementById("dragger-tea");
        const fileSelectorTea = document.querySelector("#dragger-tea #image-tea");
        const draggerBtnTea = document.querySelector("#dragger-tea button");
        const draggerTextTea = document.querySelector("#dragger-tea label");
        const draggerDetailsTea = document.getElementById("filename-tea");
        const containerInputTea = document.getElementById('container_input-tea');

        function browseFileHandlerTea() {
            fileSelectorTea.click();
        }
        if (draggerTea) {
            let file;
            const newImg = document.createElement('img');
            fileSelectorTea.addEventListener("change", (e) => {
                file = e.target.files[0];
                uploadFileHander(file);
            });
            const uploadFileHander = (file) => {
                const ValidExt = ["image/jpeg", "image/jpg", "image/png"];
                if (ValidExt.includes(file.type)) {
                    const fileReader = new FileReader();
                    fileReader.onload = () => {
                        const fileUrl = fileReader.result;
                        newImg.setAttribute("src", fileUrl);
                        newImg.setAttribute("id", "img-drag");
                        const imgDesc = `<p>${
                        file.name.split(".")[0]
                    }</p><i class="fa-solid fa-trash"></i>`;
                        containerInputTea.replaceWith(newImg);
                        draggerDetailsTea.innerHTML = imgDesc;
                    };
                    fileReader.readAsDataURL(file);
                }
                draggerDetailsTea.addEventListener("click", () => {
                    newImg.replaceWith(containerInputTea);
                    draggerDetailsTea.innerHTML = "";
                });
            };
        }

        const draggerPremade = document.getElementById("dragger-premade");
        const fileSelectorPremade = document.querySelector("#dragger-premade #image-premade");
        const draggerBtnPremade = document.querySelector("#dragger-premade button");
        const draggerTextPremade = document.querySelector("#dragger-premade label");
        const draggerDetailsPremade = document.getElementById("filename-premade");
        const containerInputPremade = document.getElementById('container_input-premade');
        
        function browseFileHandlerPremade() {
            fileSelectorPremade.click();
        }
        if (draggerPremade) {
            let file;
            const newImg = document.createElement('img');
            fileSelectorPremade.addEventListener("change", (e) => {
                file = e.target.files[0];
                uploadFileHander(file);
            });
            const uploadFileHander = (file) => {
                const ValidExt = ["image/jpeg", "image/jpg", "image/png"];
                if (ValidExt.includes(file.type)) {
                    const fileReader = new FileReader();
                    fileReader.onload = () => {
                        const fileUrl = fileReader.result;
                        newImg.setAttribute("src", fileUrl);
                        newImg.setAttribute("id", "img-drag");
                        const imgDesc = `<p>${
                        file.name.split(".")[0]
                    }</p><i class="fa-solid fa-trash"></i>`;
                        containerInputPremade.replaceWith(newImg);
                        draggerDetailsPremade.innerHTML = imgDesc;
                    };
                    fileReader.readAsDataURL(file);
                }
                draggerDetailsPremade.addEventListener("click", () => {
                    newImg.replaceWith(containerInputPremade);
                    draggerDetailsPremade.innerHTML = "";
                });
            };
        }

        // toggle class invisible
        const nav = document.querySelectorAll('.choose-nav li');
        const containerTea = document.getElementById('form-tea');
        const containerPopping = document.getElementById('form-popping');
        const containerPremade = document.getElementById('form-premade');
        nav[0].addEventListener('click', (e) => {
            containerTea.classList.remove('invisible-form');
            e.target.classList.toggle('active');
            containerPopping.classList.add('invisible-form');
            containerPremade.classList.add('invisible-form');
            nav[1].classList.remove('active');
            nav[2].classList.remove('active');
        })
        nav[1].addEventListener('click', (e) => {
            e.target.classList.toggle('active');
            containerPopping.classList.remove('invisible-form');
            nav[0].classList.remove('active');
            nav[2].classList.remove('active');
            containerPremade.classList.add('invisible-form');
            containerTea.classList.add('invisible-form');
        })
        nav[2].addEventListener('click', (e) => {
            e.target.classList.toggle('active');
            containerPremade.classList.remove('invisible-form');
            nav[0].classList.remove('active');
            nav[1].classList.remove('active');
            containerPopping.classList.add('invisible-form');
            containerTea.classList.add('invisible-form');
        })
    </script>
@endsection
