$(document).ready(function(){
    initTooltips();
    selectFirstCard(this);
    handleMainFormSubmit();
    handleCardSubmittedOK(this);
});

function initTooltips() {
    $('[data-toggle="tooltip"]').tooltip({
        trigger : 'manual'
    });    
}

function selectFirstCard(document) {
    $('input[type=radio]', document).get(0).checked = true;    
}

function handleMainFormSubmit() {
    $('#mainForm').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
            $('#submit').tooltip('show');
            setTimeout(function () {
                $('#submit').tooltip('hide');
            }, 1500);
        } else {
            e.preventDefault();
            
            $.ajax({
                type: 'post',
                url: 'send_card.php',
                data: $('form').serialize(),
                success: function () {
                    $('#modalCardSubmitted').modal();
                }        
            });
        }
    })    
}

function handleCardSubmittedOK(document) {
    $( "#cardSubmittedOK" ).click(function() {
        $('#mainForm')[0].reset();
        selectFirstCard(document);
    });    
}