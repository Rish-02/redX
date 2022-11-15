function changeView(element) {
    console.log("something");
    console.log($(element).html());
    $(".main-option a").removeClass("active");
    element.classList.add("active");
    if($(element).html() == "Mijn profiel"){
        console.log("this is profile");
        $(".main-option-view").css("display", "none");
        $("#mijn-profiel").css("display", "block");
        $(".error404").css("display", "none");
        $(".profile-description").css("display", "block");
    }
    else if($(element).html() == "Mijn stages"){
        console.log("this is stage");
        $(".main-option-view").css("display", "none");
        $("#mijn-stages").css("display", "block");
        $(".error404").css("display", "none");
        $(".profile-description").css("display", "block");
    }
    else if($(element).html() == "Mijn matches"){
        $(".main-option-view").css("display", "none");
        $("#mijn-matches").css("display", "block");
        $(".error404").css("display", "none");
        $(".profile-description").css("display", "block");
    }
    else if($(element).html() == "Mijn inbox"){
        $(".main-option-view").css("display", "none");
        $("#mijn-inbox").css("display", "block");
        $(".error404").css("display", "none");
        $(".profile-description").css("display", "block");
    }
    else if($(element).html() == "Mijn account"){
        $(".main-option-view").css("display", "none");
        $("#mijn-account").css("display", "block");
        $(".error404").css("display", "none");
        $(".profile-description").css("display", "block");
    }
    else if($(element).html() == "Downloads"){
        $(".main-option-view").css("display", "none");
        $("#downloads").css("display", "block");
        $(".error404").css("display", "none");
        $(".profile-description").css("display", "block");
    }
    else if($(element).html() == "Vraag &amp; antwoord"){
        $(".main-option-view").css("display", "none");
        $("#vraag-antwoord").css("display", "block");
        $(".error404").css("display", "none");
        $(".profile-description").css("display", "block");
    }
    else if($(element).html() == "Mijn Talenten"){
        $(".main-option-view").css("display", "none");
        $("#mijn-talenten").css("display", "block");
        $(".error404").css("display", "none");
        $(".profile-description").css("display", "block");
    }
    else if($(element).html() == "Professionals"){
        console.log("inside");
        $(".main-option-view").css("display", "none");
        $("#professionals").css("display", "block");
        $(".error404").css("display", "none");
        $(".profile-description").css("display", "block");
    }
    // else{
    //     $(".main-option-view").css("display", "none");
    //     $(".profile-description").css("display", "none");
    //     $(".error404").css("display", "block");
    // }
}

function swapDomain(element) {
    if($(element).parent().hasClass("domains-available")) {
        $('.domains-selected').append(element);
    } 
    else if($(element).parent().hasClass("domains-selected")) {
        $('.domains-available').append(element);
    }
}

function swapInternships(element) {
    if($(element).parent().hasClass("internships-available")) {
        $('.internships-selected').append(element);
    } 
    else if($(element).parent().hasClass("internships-selected")) {
        $('.internships-available').append(element);
    }
}

function swapPeriods(element) {
    if($(element).parent().hasClass("periods-available")) {
        $('.periods-selected').append(element);
    } 
    else if($(element).parent().hasClass("periods-selected")) {
        $('.periods-available').append(element);
    }
}

function swapStrength(element) {
    if($(element).parent().hasClass("strengths-available")) {
        $('.strengths-selected').append(element);
    } 
    else if($(element).parent().hasClass("strengths-selected")) {
        $('.strengths-available').append(element);
    }
}

function swapLanguageSkills(element) {
    if($(element).parent().hasClass("language-skills-available")) {
        $('.language-skills-selected').append(element);
    } 
    else if($(element).parent().hasClass("language-skills-selected")) {
        $('.language-skills-available').append(element);
    }
}

function swapLicense(element) {
    if($(element).parent().hasClass("license-available")) {
        $('.license-selected').append(element);
    } 
    else if($(element).parent().hasClass("license-selected")) {
        $('.license-available').append(element);
    }
}

function swapHobbies(element) {
    if($(element).parent().hasClass("hobbies-available")) {
        $('.hobbies-selected').append(element);
    } 
    else if($(element).parent().hasClass("hobbies-selected")) {
        $('.hobbies-available').append(element);
    }
}

function swapSports(element) {
    if($(element).parent().hasClass("sports-available")) {
        $('.sports-selected').append(element);
    } 
    else if($(element).parent().hasClass("sports-selected")) {
        $('.sports-available').append(element);
    }
}