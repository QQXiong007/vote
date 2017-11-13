$(() => {
    
        $('#input-text').on('keyup', () => {
            let tempVal = $('#input-text').val();
            $('#input-pw').val(tempVal);
        });
        $('#input-pw').on('keyup', () => {
            let tempVal = $('#input-pw').val();
            $('#input-text').val(tempVal);
        });	
        // rotate input fields + hide/show
        $('.input-trigger').on('click', () => {
            $('#input-text').toggleClass('active-text passive-text');
            $('#input-pw').toggleClass('passive-pw active-pw');
            $('.icon-1').toggle();
            $('.icon-2').toggle();
        });
    });
    