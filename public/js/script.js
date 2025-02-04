const inputTotal = document.getElementById("inputTotal");
const inputPago = document.getElementById("inputPago");
const inputVuelto = document.getElementById("inputVuelto");

// const darVuelto = () => {
//     const dinero = parseFloat(inputPago.value);
//     const total = parseFloat(inputTotal.value);

//     const vuelto = dinero - total;

//     console.log(vuelto);
//     inputVuelto.value = vuelto.toFixed(2);
// };

window.addEventListener("DOMContentLoaded", function () {
    const dinero = parseFloat(inputPago.value);
    const total = parseFloat(inputTotal.value);

    const vuelto = dinero - total;

    console.log(vuelto);
    inputVuelto.value = vuelto.toFixed(2);
});
inputPago.addEventListener("input", function () {
    const dinero = parseFloat(inputPago.value);
    const total = parseFloat(inputTotal.value);

    const vuelto = dinero - total;

    console.log(vuelto);
    inputVuelto.value = vuelto.toFixed(2);
});

//se puede optimizar el codigo usando la funcion darVuelto(), pero por algun motivo solo se ejecuta en el evento de carga de pagina.
