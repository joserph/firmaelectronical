const natural__person__form = document.getElementById('natural__person__form')
const inputs__natural__person = document.querySelectorAll('#natural__person__form input')
const next_step = document.getElementById('next-step')
let step1 = document.getElementById('step1')
let step2 = document.getElementById('step2')
const li_step_1 = document.getElementById('li_step_1')
const li_step_2 = document.getElementById('li_step_2')
const prev_step = document.getElementById('prev-step')
const step_2 = document.getElementById('step_2')
step_2.disabled = true

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const inputs = {
    contenido: false,
    telefono: false,
    email: false,
    direccion: false,
    ciudad: false,
    pais: false
}

const inpustRequired = {
    contenido: false,
    telefono: false,
    email: false,
}

const validateInputsNaturalPerson = (e) => {
    switch (e.target.name) {
        case "contenido":
            validateField(expresiones.usuario, e.target, 'contenido')
        break
        case "telefono":
            validateField(expresiones.telefono, e.target, 'telefono')
        break
        case "email":
            validateField(expresiones.correo, e.target, 'email')
        break
        case "direccion":
            validateField(expresiones.usuario, e.target, 'direccion')
        break
        case "ciudad":
            validateField(expresiones.usuario, e.target, 'ciudad')
        break
        case "pais":
            validateField(expresiones.usuario, e.target, 'pais')
        break
    }
}

const validateField = (expretion, input, name) => {
    if(expretion.test(input.value)){
        document.getElementById(`i_${name}`).classList.remove('is-invalid')
        document.getElementById(`i_${name}`).classList.add('is-valid')
        inputs[name] = true
    }else{
        document.getElementById(`i_${name}`).classList.add('is-invalid')
        inputs[name] = false
    }
}

inputs__natural__person.forEach((input) => {
    input.addEventListener('keyup', validateInputsNaturalPerson);
    input.addEventListener('blur', validateInputsNaturalPerson);
})

natural__person__form.addEventListener('click', (e) => {

})

// next_step.click(function(){
//     var tab_pane = $(this).closest('.tab-pane')

//     console.log('hola')
// })


next_step.addEventListener('click', () => {
    let curStepBtn = step1.getAttribute('id')
    let curInputs = curStepBtn.find('text')
    console.log(curInputs)
    if(inputs.contenido){
        alert('El campo contenido esta lleno');
        li_step_1.classList.remove('active')
        li_step_2.classList.remove('disabled')
        li_step_2.classList.add('active')

        step1.classList.remove('active')
        step2.classList.add('active')
    }else{
        alert('El campo contenido es requerido');
        
    }
    
})

prev_step.addEventListener('click', () => {
    li_step_2.classList.remove('active')
    li_step_2.classList.add('disabled')
    li_step_1.classList.add('active')

    step2.classList.remove('active')
    step1.classList.add('active')
})


// ------------step-wizard-------------
// $(document).ready(function () {
//     $('.nav-tabs > li a[title]').tooltip();

//     //Wizard
//     $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

//         var target = $(e.target);

//         if (target.parent().hasClass('disabled')) {
//             return false;
//         }
//     });

//     $(".next-step").click(function (e) {
//         /* Verificamos si estan llenos los campos requeridos */

//         var active = $('.wizard .nav-tabs li.active');
//         active.next().removeClass('disabled');
//         nextTab(active);

//     });
//     $(".prev-step").click(function (e) {

//         var active = $('.wizard .nav-tabs li.active');
//         prevTab(active);

//     });
// });

// function nextTab(elem) {
//     $(elem).next().find('a[data-toggle="tab"]').click();
// }
// function prevTab(elem) {
//     $(elem).prev().find('a[data-toggle="tab"]').click();
// }


// $('.nav-tabs').on('click', 'li', function() {
//     $('.nav-tabs li.active').removeClass('active');
//     $(this).addClass('active');
// });


