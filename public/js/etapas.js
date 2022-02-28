$(function () {
    var atual_fs, next_fs, prev_fs;
    var html_text = '';
    function next(elem) {
        console.log(elem);
        atual_fs = $(elem.parent()).parent();
        next_fs = $(elem.parent()).parent().next();

        atual_fs.hide();
        next_fs.show();


    };

    $('.prev').click(function () {
        atual_fs = $($(this).parent()).parent();
        prev_fs = $($(this).parent()).parent().prev();
        // document.getElementById('erro').scrollIntoView();




        atual_fs.hide();
        prev_fs.show();


    });

    $('input[name=next1]').click(function () {
       
            next($(this));
          
              
   

    });
    $('input[name=next2]').click(function () {
       
            next($(this));
         

    });
    $('input[name=next3]').click(function () {

        
            next($(this));
    


    });
    $('input[name=next4]').click(function () {

  
            next($(this));
   
    });
    $('input[name=next5]').click(function () {

            next($(this));
         
        


    });



    $('#formulario input[type=submit]').click(function () {
        return false;
    });
    $('.enviar').click(function () {
        // html = '';
        // if (etapa1() == false) {
        //     html += '<div class="ui negative message">\n\
        //     <i class="close icon"></i>\n\
        //     <p >Campos obrigatorios não preenchidos na etapa Dados Pessoais </p></div>';
        // }
        // if (etapa2() == false) {
        //     html += '<div class="ui negative message">\n\
        //     <i class="close icon"></i>\n\
        //     <p>Campos obrigatorios não preenchidos na etapa Documentos </p></div>';
        // }
        // if (etapa3() == false) {
        //     html += '<div class="ui negative message">\n\
        //     <i class="close icon"></i>\n\
        //     <p >Campos obrigatorios não preenchidos na etapa Dados Pessoais Complementares </p></div>';
        // }
        // if (etapa4() == false) {
        //     html += '<div class="ui negative message">\n\
        //     <i class="close icon"></i>\n\
        //     <p >Campos obrigatorios não preenchidos na etapa Contato e Endereço </p></div>';
        // }
        // if (etapa5() == false) {
        //     html += '<div class="ui negative message">\n\
        //     <i class="close icon"></i>\n\
        //     <p >Campos obrigatorios não preenchidos na etapa Dados Escolares e Profissinais </p></div>';
        // }
        // if (etapa6() == false) {
        //     html += '<div class="ui negative message">\n\
        //     <i class="close icon"></i>\n\
        //     <p >Campos obrigatorios não preenchidos na etapa Anexos</p>\n\
        //     </div>';
        // }
        // if (html == '') {
        //     next($(this));
        //     $('#erro').html('');
        //     document.getElementById("formulario").submit();

        // } else {

        //     $('#erro').html(html);
        //     $(' .message .close')
        //         .on('click', function () {
        //             $(this)
        //                 .closest('.message')
        //                 .transition('fade');
        //         });
          
        //     document.getElementById('erro').scrollIntoView();
           
        // }
    }
    )
});
