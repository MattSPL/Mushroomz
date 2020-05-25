var min=1000; 
    var max=9999;  
    var random = 
    Math.floor(Math.random() * (+max - +min)) + +min; 
    var temp = document.getElementById('codeGenLabel');
    temp.append(" "+ random);
    var codeHidden = document.getElementById('codeGen');
    codeHidden.value = random;