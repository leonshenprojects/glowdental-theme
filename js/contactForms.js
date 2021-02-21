function addFormAnalytics() {
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        switch (event.detail.contactFormId) {
            case '7707' :
                ga('send', 'event', 'Form', 'submit', 'Contact Form');
                break;

            case '8816' :
                ga('send', 'event', 'Form', 'submit', 'COVID-19 Screening Form');
                break;

            case '8753' :
                ga('send', 'event', 'Form', 'submit', 'Medical Questionnaire Form');
                break;
        }
    }, false );
}

if (document.getElementsByClassName("wpcf7").length) {
    addFormAnalytics();
}

jQuery(document).ready(function($) {
    $("#datepicker").datepicker();
});