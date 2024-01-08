let button = document.querySelectorAll(".navbar-links li");

button.forEach(element => {
    element.addEventListener("click",()=>{
        alert("Please login first");
    })
});