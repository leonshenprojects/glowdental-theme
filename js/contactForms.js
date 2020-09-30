function addFormAnalytics() {
    console.log('addFormAnalytics executed');
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        switch (event.detail.contactFormId) {
            case '7707' :
                ga('send', 'event', 'Form', 'submit', 'Contact Form');
                console.log('Contact form sent');
                break;

            case '8816' :
                ga('send', 'event', 'Form', 'submit', 'COVID-19 Screening Form');
                console.log('COVID-19 screening form sent');
                break;

            case '8753' :
                ga('send', 'event', 'Form', 'submit', 'Medical Questionnaire Form');
                console.log('Medical Questionnaire Form sent');
                break;
        }
    }, false );
}

if (document.getElementsByClassName("wpcf7").length) {
    addFormAnalytics();
}