function changeThis(sender) { 
    if(document.getElementById('chkbx').checked){
      document.getElementById("first").removeAttribute('disabled');
      document.getElementById("second").removeAttribute('disabled');
    }
    else{
      document.getElementById("first").disabled = true;
      document.getElementById("second").disabled = true;
    }
  }