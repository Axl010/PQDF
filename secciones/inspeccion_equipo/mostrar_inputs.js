document.addEventListener("DOMContentLoaded", function() {
    const mostrarDiv = document.getElementById("personal");
    const ocultarDiv = document.getElementById("ocultarDiv");

    //ocultar los inputs inicialmente
    ocultarDiv.style.display = "none";

    //funcion para Mostrar/Ocultar los inputs
    function mostrarInputs(displayValue){
        ocultarDiv.style.display = displayValue;
        const inputs = ocultarDiv.querySelectorAll("input");
        inputs.forEach(input => {
            if(displayValue === 'none'){
                input.disabled = true;
            }else{
                input.disabled = false;
            }
        });
    }
    mostrarDiv.addEventListener("change", function(){
        const selectedOption = mostrarDiv.value;
        if(selectedOption === "trabajador"){
            mostrarInputs("flex");
        }else{
            mostrarInputs("none");
        }
    })
})