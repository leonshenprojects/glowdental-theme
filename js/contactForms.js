function addFormAnalytics() {
    console.log('addFormAnalytics executed');
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        switch (event.detail.contactFormId) {
            case '7707' :
                _gaq.push(['_trackEvent', 'Contact Form', 'Submit']);
                console.log('Contact form sent');
                break;

            case '8816' :
                _gaq.push(['_trackEvent', 'COVID-19 Screening Form', 'Submit']);
                console.log('COVID-19 screening form sent');
                break;

            case '8753' :
                _gaq.push(['_trackEvent', 'Medical Questionnaire Form', 'Submit']);
                console.log('Medical Questionnaire Form sent');
                break;
        }
    }, false );
}

if (document.getElementsByClassName("wpcf7").length) {
    addFormAnalytics();
}