const natural__person__form = document.getElementById('natural__person__form')
const inputs__natural__person = document.querySelectorAll('#natural__person__form input')
const dates__natural__person = document.querySelectorAll('#natural__person__form date')
const selects_natural_person = document.querySelectorAll('#natural__person__form select')
const files_natural_person = document.querySelectorAll('#natural__person__form file')
const natural_person_next = document.getElementById('nextBtm')
let i_fecha_nacimiento = document.getElementById('i_fecha_nacimiento')
    
    //const next_step = document.getElementById('next-step')
    // let next_step = $('#next-step');
    // let step1 = document.getElementById('step1')
    // let step2 = document.getElementById('step2')
    // const li_step_1 = document.getElementById('li_step_1')
    // const li_step_2 = document.getElementById('li_step_2')
    // const prev_step = document.getElementById('prev-step')
    // const step_2 = document.getElementById('step_2')
    // $('.invalid-feedback2').hide();
    // step_2.disabled = true

const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{2,40}$/, // Letras y espacios, pueden llevar acentos.
    password: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,10}$/, // 7 a 14 numeros.
    codigodactilar: /^[a-zA-Z0-9\_\-]{9,10}$/,
    direccion: /^[a-zA-ZÀ-ÿ-z0-9'\.\-\s\,]+$/,
    fecha: /^(0[1-9]|[12]\d|3[01])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$/,
}

const inputs = {
    contenedor: false,
    nombres: false,
    apellido1: false,
    apellido2: false,
    tipodocumento: false,
    coddactilar: false,
    sexo: false,
    nacionalidad: false,
    telfCelular: false,
    telfCelular2: false,
    eMail: false,
    eMail2: false,
    provincia: false,
    ciudad: false,
    direccion: false,
    vigenciafirma: false,
    express: false,
    fecha_nacimiento: false,
}

const validateInputsNaturalPerson = (e) => {
    switch (e.target.name) {
        case "contenedor":
            validateSelect(e.target, 'contenedor')
        break
        case "nombres":
            validateField(expresiones.nombre, e.target, 'nombres')
        break
        case "apellido1":
            validateField(expresiones.nombre, e.target, 'apellido1')
        break
        case "apellido2":
            validateField(expresiones.nombre, e.target, 'apellido2')
        break
        case "tipodocumento":
            validateSelect(e.target, 'tipodocumento')
        break
        case "coddactilar":
            validateField(expresiones.codigodactilar, e.target, 'coddactilar')
        break
        case "sexo":
            validateSelect(e.target, 'sexo')
        break
        case "nacionalidad":
            validateField(expresiones.nombre, e.target, 'nacionalidad')
        break
        case "telfCelular":
            validateField(expresiones.telefono, e.target, 'telfCelular')
        break
        case "telfCelular2":
            validateField(expresiones.telefono, e.target, 'telfCelular2')
        break
        case "eMail":
            validateField(expresiones.correo, e.target, 'eMail')
        break
        case "eMail2":
            validateField(expresiones.correo, e.target, 'eMail2')
        break
        case "provincia":
            validateSelect(e.target, 'provincia')
        break
        case "ciudad":
            validateField(expresiones.nombre, e.target, 'ciudad')
        break
        case "direccion":
            validateField(expresiones.direccion, e.target, 'direccion')
        break
        case "vigenciafirma":
            validateSelect(e.target, 'vigenciafirma')
        break
        case "express":
            validateSelect(e.target, 'express')
        break
        case "nombre_partner":
            validateField(expresiones.nombre, e.target, 'nombre_partner')
        break
        case "fecha_nacimiento":
            validateDate(e.target, 'fecha_nacimiento')
        break
        // case "nombres_factura":
        //     validateField(expresiones.nombre, e.target, 'nombres_factura')
        // break
        // case "correo_factura":
        //     validateField(expresiones.correo, e.target, 'correo_factura')
        // break
        // case "direccion_factura":
        //     validateField(expresiones.direccion, e.target, 'direccion_factura')
        // break
        // case "telefono_factura":
        //     validateField(expresiones.telefono, e.target, 'telefono_factura')
        // break
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

const validateDate = (date, name) => {
    if(i_fecha_nacimiento.value.length >= 10){
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

dates__natural__person.forEach((date) => {
    date.addEventListener('keyup', validateInputsNaturalPerson);
    date.addEventListener('blur', validateInputsNaturalPerson);
})

const validateSelect = (select, name) => {
    if(select.value != ""){
        document.getElementById(`i_${name}`).classList.remove('is-invalid')
        document.getElementById(`i_${name}`).classList.add('is-valid')
        document.getElementById(`error_${name}`).style.display = 'none'
        inputs[name] = true
    }else{
        document.getElementById(`i_${name}`).classList.add('is-invalid')
        document.getElementById(`i_${name}`).classList.remove('is-valid')
        document.getElementById(`error_${name}`).style.display = 'block'
        inputs[name] = false
    }
}

selects_natural_person.forEach((select) => {
    select.addEventListener('change', validateInputsNaturalPerson);
    select.addEventListener('blur', validateInputsNaturalPerson);
})

natural_person_next.addEventListener('click', () => {
    if(inputs.contenedor && 
        inputs.nombres && 
        inputs.apellido1 && 
        inputs.apellido2 && 
        inputs.tipodocumento && 
        inputs.coddactilar && 
        inputs.sexo && 
        inputs.nacionalidad && 
        inputs.telfCelular && 
        inputs.telfCelular2 && 
        inputs.eMail && 
        inputs.eMail2 && 
        inputs.provincia && 
        inputs.ciudad && 
        inputs.direccion && 
        inputs.vigenciafirma){
            
    }else{
        
    }
})

prev_step.addEventListener('click', () => {
    li_step_2.classList.remove('active')
    li_step_2.classList.add('disabled')
    li_step_1.classList.add('active')

    step2.classList.remove('active')
    step1.classList.add('active')
})


function ruc(x){
   
    if(x == 1){
        document.getElementById('b_ruc_personal').classList.remove('b-hidden');
        document.getElementById('i_ruc_personal').setAttribute('required', 'required');
        // Show input File
        document.getElementById('g_f_copiaruc').classList.remove('b-hidden');
        document.getElementById('f_copiaruc').setAttribute('required', 'required');
    }else{
        document.getElementById('b_ruc_personal').classList.add('b-hidden');
        document.getElementById('i_ruc_personal').removeAttribute('required');
        // Hide input File
        document.getElementById('g_f_copiaruc').classList.add('b-hidden');
        document.getElementById('f_copiaruc').removeAttribute('required');
    }
}

// VALIDATE CEDULA, RUC Y PASAPORTE
function validarDocumento(doc){
    numero = document.getElementById('i_'+doc).value;
 
    var suma = 0;      
    var residuo = 0;      
    var pri = false;      
    var pub = false;            
    var nat = false;      
    var numeroProvincias = 22;                  
    var modulo = 11;
                
    /* Verifico que el campo no contenga letras */                  
    var ok=1;
    for (i=0; i<numero.length && ok==1 ; i++){
        var n = parseInt(numero.charAt(i));
        if (isNaN(n)) ok=0;
    }
    if (ok==0){
        alert("No puede ingresar caracteres en el número");   
        document.getElementById(`i_${doc}`).classList.add('is-invalid');
        document.getElementById(`i_${doc}`).classList.remove('is-valid');      
        return false;
    }
                
    if (numero.length < 10 ){              
        alert('El número ingresado no es válido'); 
        document.getElementById(`i_${doc}`).classList.add('is-invalid');
        document.getElementById(`i_${doc}`).classList.remove('is-valid');                  
        return false;
    }
    
    /* Los primeros dos digitos corresponden al codigo de la provincia */
    provincia = numero.substr(0,2);      
    if (provincia < 1 || provincia > numeroProvincias){           
        alert('El código de la provincia (dos primeros dígitos) es inválido');
        document.getElementById(`i_${doc}`).classList.add('is-invalid');
            document.getElementById(`i_${doc}`).classList.remove('is-valid'); 
    return false;       
    }

    /* Aqui almacenamos los digitos de la cedula en variables. */
    d1  = numero.substr(0,1);         
    d2  = numero.substr(1,1);         
    d3  = numero.substr(2,1);         
    d4  = numero.substr(3,1);         
    d5  = numero.substr(4,1);         
    d6  = numero.substr(5,1);         
    d7  = numero.substr(6,1);         
    d8  = numero.substr(7,1);         
    d9  = numero.substr(8,1);         
    d10 = numero.substr(9,1);                
        
    /* El tercer digito es: */                           
    /* 9 para sociedades privadas y extranjeros   */         
    /* 6 para sociedades publicas */         
    /* menor que 6 (0,1,2,3,4,5) para personas naturales */ 

    if (d3==7 || d3==8){           
        alert('El tercer dígito ingresado es inválido');                     
        document.getElementById(`i_${doc}`).classList.add('is-invalid');
            document.getElementById(`i_${doc}`).classList.remove('is-valid'); 
        return false;
    }         
        
    /* Solo para personas naturales (modulo 10) */         
    if (d3 < 6){           
        nat = true;            
        p1 = d1 * 2;  if (p1 >= 10) p1 -= 9;
        p2 = d2 * 1;  if (p2 >= 10) p2 -= 9;
        p3 = d3 * 2;  if (p3 >= 10) p3 -= 9;
        p4 = d4 * 1;  if (p4 >= 10) p4 -= 9;
        p5 = d5 * 2;  if (p5 >= 10) p5 -= 9;
        p6 = d6 * 1;  if (p6 >= 10) p6 -= 9; 
        p7 = d7 * 2;  if (p7 >= 10) p7 -= 9;
        p8 = d8 * 1;  if (p8 >= 10) p8 -= 9;
        p9 = d9 * 2;  if (p9 >= 10) p9 -= 9;             
        modulo = 10;
    }         

    /* Solo para sociedades publicas (modulo 11) */                  
    /* Aqui el digito verficador esta en la posicion 9, en las otras 2 en la pos. 10 */
    else if(d3 == 6){           
        pub = true;             
        p1 = d1 * 3;
        p2 = d2 * 2;
        p3 = d3 * 7;
        p4 = d4 * 6;
        p5 = d5 * 5;
        p6 = d6 * 4;
        p7 = d7 * 3;
        p8 = d8 * 2;            
        p9 = 0;            
    }         
        
    /* Solo para entidades privadas (modulo 11) */         
    else if(d3 == 9) {           
        pri = true;                                   
        p1 = d1 * 4;
        p2 = d2 * 3;
        p3 = d3 * 2;
        p4 = d4 * 7;
        p5 = d5 * 6;
        p6 = d6 * 5;
        p7 = d7 * 4;
        p8 = d8 * 3;
        p9 = d9 * 2;            
    }
                
    suma = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9;                
    residuo = suma % modulo;                                         

    /* Si residuo=0, dig.ver.=0, caso contrario 10 - residuo*/
    digitoVerificador = residuo==0 ? 0: modulo - residuo;                

    /* ahora comparamos el elemento de la posicion 10 con el dig. ver.*/                         
    if (pub==true){           
        if (digitoVerificador != d9){                          
            alert('El ruc de la empresa del sector público es incorrecto.');            
            document.getElementById(`i_${doc}`).classList.add('is-invalid');
            document.getElementById(`i_${doc}`).classList.remove('is-valid'); 
            return false;
        }                  
        /* El ruc de las empresas del sector publico terminan con 0001*/         
        if ( numero.substr(9,4) != '0001' ){                    
            alert('El ruc de la empresa del sector público debe terminar con 0001');
            document.getElementById(`i_${doc}`).classList.add('is-invalid');
            document.getElementById(`i_${doc}`).classList.remove('is-valid'); 
            return false;
        }
    }         
    else if(pri == true){         
        if (digitoVerificador != d10){                          
            alert('El ruc de la empresa del sector privado es incorrecto.');
            document.getElementById(`i_${doc}`).classList.add('is-invalid');
            document.getElementById(`i_${doc}`).classList.remove('is-valid'); 
            return false;
        }         
        if ( numero.substr(10,3) != '001' ){                    
            alert('El ruc de la empresa del sector privado debe terminar con 001');
            document.getElementById(`i_${doc}`).classList.add('is-invalid');
            document.getElementById(`i_${doc}`).classList.remove('is-valid'); 
            return false;
        }
    }      

    else if(nat == true){         
        if (digitoVerificador != d10){                          
            alert('El número de cédula de la persona natural es incorrecto.');
            document.getElementById(`i_${doc}`).classList.add('is-invalid');
            document.getElementById(`i_${doc}`).classList.remove('is-valid'); 
            return false;
        }         
        if (numero.length >10 && numero.substr(10,3) != '001' ){                    
            alert('El ruc de la persona natural debe terminar con 001');
            document.getElementById(`i_${doc}`).classList.add('is-invalid');
            document.getElementById(`i_${doc}`).classList.remove('is-valid'); 
            return false;
        }
    }
    document.getElementById(`i_${doc}`).classList.remove('is-invalid');
    document.getElementById(`i_${doc}`).classList.add('is-valid');
    return true;  
}

// VALIDATE INPUTS FILES
function validateInputFileImg(fileName)
{
    let filePhoto = document.getElementById(`${fileName}`);
    let fileRoute = filePhoto.value;
    let validExpression = /(.JPG|.jpg|.jpeg|.JPEG)$/i;
    if(!validExpression.exec(fileRoute)){
        //alert('Asegurese de haber seleccionado un JPG');
        filePhoto.value = '';
        return false;
    }else{
        if (filePhoto.files && filePhoto.files[0]) 
        {
            let visor = new FileReader();
            visor.onload = function(e) 
            {
            document.getElementById(`visor_${fileName}`).innerHTML = 
            '<embed src="'+e.target.result+'" width="350" />';
            };
            visor.readAsDataURL(filePhoto.files[0]);
            //document.getElementById(`img_${fileName}`).style.display = 'none';
        }
    }
}

function validateInputFilePdf(fileName)
{
   var filePdf = document.getElementById(`${fileName}`);
   var fileRoute = filePdf.value;
   var validExpression = /(.PDF|.pdf)$/i;
   if(!validExpression.exec(fileRoute)){
      alert('Asegurese de haber seleccionado un PDF');
      filePdf.value = '';
      return false;
   }else{
      if (filePdf.files && filePdf.files[0]) 
      {
            var visor = new FileReader();
            visor.onload = function(e) 
            {
               document.getElementById(`visor_${fileName}`).innerHTML = 
               '<embed src="'+e.target.result+'" width="350" />';
            };
            visor.readAsDataURL(filePdf.files[0]);
            //document.getElementById(`pdf_${fileName}`).style.display = 'none';
      }
   }
}

function factElec(x){
    if(x == 0){
        document.getElementById('g_ruc_cedula_factura').classList.remove('b-hidden');
        document.getElementById('i_ruc_cedula_factura').setAttribute('required', 'required');
    
        document.getElementById('g_nombres_factura').classList.remove('b-hidden');
        document.getElementById('i_nombres_factura').setAttribute('required', 'required');
    
        document.getElementById('g_correo_factura').classList.remove('b-hidden');
        document.getElementById('i_correo_factura').setAttribute('required', 'required');
    
        document.getElementById('g_direccion_factura').classList.remove('b-hidden');
        document.getElementById('i_direccion_factura').setAttribute('required', 'required');
    
        document.getElementById('g_telefono_factura').classList.remove('b-hidden');
        document.getElementById('i_telefono_factura').setAttribute('required', 'required');

        document.getElementById('g_comentarios_factura').classList.remove('b-hidden');
        //document.getElementById('i_comentarios_factura').setAttribute('required', 'required');
    }else{
        document.getElementById('g_ruc_cedula_factura').classList.add('b-hidden');
        document.getElementById('i_ruc_cedula_factura').removeAttribute('required');
    
        document.getElementById('g_nombres_factura').classList.add('b-hidden');
        document.getElementById('i_nombres_factura').removeAttribute('required');
    
        document.getElementById('g_correo_factura').classList.add('b-hidden');
        document.getElementById('i_correo_factura').removeAttribute('required');
    
        document.getElementById('g_direccion_factura').classList.add('b-hidden');
        document.getElementById('i_direccion_factura').removeAttribute('required');
    
        document.getElementById('g_telefono_factura').classList.add('b-hidden');
        document.getElementById('i_telefono_factura').removeAttribute('required');

        document.getElementById('g_comentarios_factura').classList.add('b-hidden');
        //document.getElementById('i_comentarios_factura').removeAttribute('required');
    }
}