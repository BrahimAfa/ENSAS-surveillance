console.log("helllooo");
console.log(data);

function generateLocalDropDownList() {
  var options = "";
  data.forEach((local) => {
    options += `<option value="${local.id_local}">${local.Intitule}</option>`;
  });
  return options;
}

function getXhr() {
  var xhr = null;
  if (window.XMLHttpRequest)
    // Firefox et autres
    xhr = new XMLHttpRequest();
  else if (window.ActiveXObject) {
    // Internet Explorer
    try {
      xhr = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
  } else {
    // XMLHttpRequest non support� par le navigateur
    alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
    xhr = false;
  }
  return xhr;
}

function sendData() {
  var xhr = getXhr();
  // On d�fini ce qu'on va faire quand on aura la r�ponse
  xhr.onreadystatechange = function () {
    // On ne fait quelque chose que si on a tout re�u et que le serveur est ok
    if (xhr.readyState == 4 && xhr.status == 200) {
       $("div.spanner").removeClass("show");
      $("div.overlay").removeClass("show");
      alert(xhr.responseText);
    }
  };
  xhr.open("POST", "surviance.php", true);
  // var data = new FormData();
  var details = getDatafromTableBody()
  xhr.setRequestHeader( "Content-Type", "application/json" );
  var data = {...dataInputs, details};
  console.log(data);
  $("div.spanner").addClass("show");
  $("div.overlay").addClass("show");
  xhr.send(JSON.stringify(data));
}

function changeInput(e) {
  var name = e.name;
  var value = e.value;
  dataInputs[name] = value;
  console.log("object dyali datainputs", dataInputs);
}

function deleteRow(btn) {
  console.log(btn);
  let table = document.querySelector("table");
  var row = btn.parentNode;
  console.log(row);
  var i = Array.from(row.parentNode.children).indexOf(row);
  console.log(i);
  console.log(Array.from(row.parentNode.children));
  table.deleteRow(i+1);
}

function profSelected(e) {
  var table = document.getElementById("ProfTableBody");

  var tRow = `<tr>
                    <th name="profs">${e.value}</th>
                    <td>
                        <select id="" class="form-control text-center" name="local"
                            id="filiere">
                            <option value="-1" selected disabled>selelct Local</option>
                            ${generateLocalDropDownList()}
                        </select>
                    </td>
                    <td onclick="deleteRow(this)" style="cursor: pointer;" class="text-center" >
                        <i class="text-danger fa fa-window-close" aria-hidden="true"/>
                    </td>
                </tr>`;
  table.innerHTML += tRow;
}

function getDatafromTableBody(){
    var locals = document.getElementsByName("local")
    var profs=document.getElementsByName("profs");
    const details={};
    for(let i = 0; i < profs.length; i++) {
        var prof = profs[i].innerHTML.trim();
        console.log(prof);
        var local = locals[i].value;
        if(details[local]){
            details[local].push(prof);
        }else{
            details[local] = [prof];
        }
    }
    console.log(details);
    return details;
}
