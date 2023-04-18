let cart = document.getElementById("cart");
let command = document.getElementById("btn-store--command")
// function sendForm(inputValue, formId){
//     e.preventDefault();
//     let x = document.getElementById(inputValue);
//     x.value = localStorage.getItem("order");
//     document.getElementById(formId).submit();
// }
cart.addEventListener("click", async function (e) {
    e.preventDefault();
    let x = document.getElementById("storage");
    x.value = localStorage.getItem("order");
    document.getElementById("cart-form").submit();
});
command.addEventListener("click", async function (e) {
    e.preventDefault();
    let x = document.getElementById("storageOrder");
    x.value = localStorage.getItem("order");
    document.getElementById("order-form").submit();
    localStorage.clear();
    
});

