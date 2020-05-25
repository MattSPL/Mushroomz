var loginField = document.getElementById('loginFieldRegister');
var emailField = document.getElementById('emailField');
var passwordField = document.getElementById('passwordFieldRegister');
var repeatPasswordField = document.getElementById('repeatPasswordFieldRegister');
var codeField = document.getElementById('codeField');
var registerButton = document.getElementById('registerButtonRegister');
var generatedCode = document.getElementById('codeGen').value;

var loginFilled=false, passwordFilled=false, passwordRepeated=false, codeFilled=false, emailFilled=false;

registerButton.disabled=true;


function loginFieldEvaluate()
{
    if(loginField.value.length==0)
    {
        loginField.classList.remove('fieldFilled');
        loginField.classList.add('fieldEmpty');
        loginFilled=false;
    }
    else
    {
        loginField.classList.remove('fieldEmpty');
        loginField.classList.add('fieldFilled');
        loginFilled=true;
    };

    if(loginFilled && emailFilled && passwordFilled && passwordRepeated && codeFilled)
    {
        registerButton.disabled = false;
    }
    else
    {
        registerButton.disabled = true;
    };

}

function emailFieldEvaluate(){
    if(emailField.value.length==0 || !emailField.value.includes('@'))
    {
        emailFilled=false;
        emailField.classList.remove('fieldFilled');
        emailField.classList.add('fieldEmpty');
    }
    else
    {
        emailField.classList.remove('fieldEmpty');
        emailField.classList.add('fieldFilled');
        emailFilled=true;
    };

    if(loginFilled && emailFilled && passwordFilled && passwordRepeated && codeFilled)
    {
        registerButton.disabled = false;
    }
    else
    {
        registerButton.disabled = true;
    };
}

function passwordFieldEvaluate(){
     if(passwordField.value.length<8 || repeatPasswordField.value!==passwordField.value)
    {
        passwordField.classList.remove('fieldFilled');
        passwordField.classList.add('fieldEmpty');
        passwordFilled=false;
        repeatPasswordField.classList.remove('fieldFilled');
        repeatPasswordField.classList.add('fieldEmpty');
        passwordRepeated=false;
    }
    else
    {
        passwordField.classList.remove('fieldEmpty');
        passwordField.classList.add('fieldFilled');
        passwordFilled=true;
        repeatPasswordField.classList.remove('fieldEmpty');
        repeatPasswordField.classList.add('fieldFilled');
        passwordRepeated=true;
    };

    if(loginFilled && emailFilled && passwordFilled && passwordRepeated && codeFilled)
    {
        registerButton.disabled = false;
    }
    else
    {
        registerButton.disabled = true;
    };
}

function repeatPasswordFieldEvaluate(){
    if(repeatPasswordField.value.length<8 || passwordField.value !== repeatPasswordField.value)
    {
        repeatPasswordField.classList.remove('fieldFilled');
        repeatPasswordField.classList.add('fieldEmpty');
        passwordRepeated=false;
    }
    else
    {
        passwordField.classList.remove('fieldEmpty');
        passwordField.classList.add('fieldFilled');
        repeatPasswordField.classList.remove('fieldEmpty');
        repeatPasswordField.classList.add('fieldFilled');
        passwordRepeated=true;
        passwordFilled=true;
    };

    if(loginFilled && emailFilled && passwordFilled && passwordRepeated && codeFilled)
    {
        registerButton.disabled = false;
    }
    else
    {
        registerButton.disabled = true;
    };
}

function codeFieldEvaluate(){
    if(codeField.value !==generatedCode)
    {
        codeField.classList.remove('fieldFilled');
        codeField.classList.add('fieldEmpty');
        codeFilled=false;
    }
    else
    {
        codeField.classList.remove('fieldEmpty');
        codeField.classList.add('fieldFilled');
        codeFilled=true;
    };

    if(loginFilled && emailFilled && passwordFilled && passwordRepeated && codeFilled)
    {
        registerButton.disabled = false;
    }
    else
    {
        registerButton.disabled = true;
    };
}

loginField.addEventListener('input', loginFieldEvaluate);
emailField.addEventListener('input', emailFieldEvaluate);
passwordField.addEventListener('input', passwordFieldEvaluate);
repeatPasswordField.addEventListener('input', repeatPasswordFieldEvaluate);
codeField.addEventListener('input', codeFieldEvaluate);


