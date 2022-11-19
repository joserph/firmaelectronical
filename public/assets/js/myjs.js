$(document).ready(function(){
    const natural__person__form = document.getElementById('natural__person__form')
    const inputs__natural__person = document.querySelectorAll('#natural__person__form input')
    //const next_step = document.getElementById('next-step')
    let next_step = $('#next-step');
    let step1 = document.getElementById('step1')
    let step2 = document.getElementById('step2')
    const li_step_1 = document.getElementById('li_step_1')
    const li_step_2 = document.getElementById('li_step_2')
    const prev_step = document.getElementById('prev-step')
    const step_2 = document.getElementById('step_2')
    $('.invalid-feedback2').hide();
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
            document.getElementById(`error_${name}`).style.display = 'none'
            inputs[name] = true
        }else{
            document.getElementById(`i_${name}`).classList.add('is-invalid')
            document.getElementById(`error_${name}`).style.display = 'block'
            inputs[name] = false
        }
    }

    inputs__natural__person.forEach((input) => {
        input.addEventListener('keyup', validateInputsNaturalPerson);
        input.addEventListener('blur', validateInputsNaturalPerson);
    })

    natural__person__form.addEventListener('click', (e) => {

    })

    next_step.click(function(){
        let curStep = $(this).closest('.tab-pane')
        let curStepBtn = curStep.attr('id')
        let curInputs = curStep.find("input[type='text'],input[type='url'],input[type='email']")
        let isValid = true;
        console.log(curInputs)
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-control").addClass("is-invalid");
            }
        }
        if(isValid){
            if(inputs.contenido){
                
                li_step_1.classList.remove('active')
                li_step_2.classList.remove('disabled')
                li_step_2.classList.add('active')
        
                step1.classList.remove('active')
                step2.classList.add('active')
            }
        }
    })

    


    // next_step.addEventListener('click', () => {
    //     var curStep = $(this).closest(".tab-pane")
    //     //let curInputs = curStepBtn.find('text')
    //     console.log(curStep)
    //     if(inputs.contenido){
    //         alert('El campo contenido esta lleno');
    //         li_step_1.classList.remove('active')
    //         li_step_2.classList.remove('disabled')
    //         li_step_2.classList.add('active')

    //         step1.classList.remove('active')
    //         step2.classList.add('active')
    //     }else{
    //         alert('El campo contenido es requerido');
            
    //     }
        
    // })

    prev_step.addEventListener('click', () => {
        li_step_2.classList.remove('active')
        li_step_2.classList.add('disabled')
        li_step_1.classList.add('active')

        step2.classList.remove('active')
        step1.classList.add('active')
    })
})

function ruc(x){
   
    if(x == 1){
        document.getElementById('b_ruc_personal').classList.remove('b-hidden');
        document.getElementById('i_ruc_personal').setAttribute('required', 'required');
        // Show input File
        //document.getElementById('g_f_copiaruc').classList.remove('ocultar');
        //document.getElementById('f_copiaruc').setAttribute('required', 'required');
    }else{
        document.getElementById('b_ruc_personal').classList.add('b-hidden');
        document.getElementById('i_ruc_personal').removeAttribute('required');
        // Hide input File
        //document.getElementById('g_f_copiaruc').classList.add('ocultar');
        //document.getElementById('f_copiaruc').removeAttribute('required');
    }
}



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


