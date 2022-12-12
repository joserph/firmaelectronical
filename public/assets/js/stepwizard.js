$(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn'),
        allPrevBtn = $('.prevBtn'),
        step_2 = $('.step-2');
  
    allWells.hide();
  
    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);
  
        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-primary');
            $item.addClass('btn-primary');
            $item.removeClass('btn-secondary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });
    
    allPrevBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");
  
            prevStepWizard.removeAttr('disabled').trigger('click');
    });
  
    allNextBtn.click(function(){
        console.log('click')
        
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url'],input[type='email'],input[type='date']"),
            curSlects = curStep.find("select")
            isValid = true;
  
        $(".form-control").removeClass("is-invalid");
        $(".custom-select").removeClass("is-invalid");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-control").addClass("is-invalid");
            }
        }
        for(var i=0; i<curSlects.length; i++){
            if (!curSlects[i].validity.valid){
                isValid = false;
                $(curSlects[i]).closest(".custom-select").addClass("is-invalid");
            }
        }
  
        if (isValid){
            step_2.removeClass("disabled");
            nextStepWizard.removeAttr('disabled').trigger('click');
            curStepBtn.disabled = true;
        }else{
            step_2.addClass("disabled");
            //nextStepWizard.removeAttr('disabled').trigger('click');
            curStepBtn.disabled = false;
        }
            
            
    });
  
    $('div.setup-panel div a.btn-primary').trigger('click');
  });