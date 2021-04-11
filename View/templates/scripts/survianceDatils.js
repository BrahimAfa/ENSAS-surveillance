console.log("heello suriance");
let dataInputs = {};
// Source of this function : https://davidwalsh.name/javascript-debounce-function
function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};

var WaitAndSendSearchRequest = debounce(function() {
 var xhr = getXhr();
  // On d�fini ce qu'on va faire quand on aura la r�ponse
  xhr.onreadystatechange = function () {
    // On ne fait quelque chose que si on a tout re�u et que le serveur est ok
    if (xhr.readyState == 4 && xhr.status == 200) {

      // alert(xhr.responseText);
      try{
      setDataToTable(JSON.parse(xhr.responseText));
      setOniputEvent();

      }catch(e){
        console.error(e);
        setDataToTableNotFound();
      }
    }else{
              setDataToTableNotFound();

    }
  };
  xhr.open("POST", "survianceDetail.php", true);
  // var data = new FormData();
  var data = new FormData()
  console.log($('#prof').val());
  data.append('prof',$('#prof').val())
  xhr.send(data);
}, 250);


function setDataToTable(FullSurvianceDetail){
    var tableRows = FullSurvianceDetail.map(getFullTbaleRow).join(' ');
    $('#dataEtudBody').html(tableRows);
}

function setDataToTableNotFound(){
    var tableRows = '<tr><td colspan="5" style="text-align:center;">NOT FOUND</td></tr>'
    $('#dataEtudBody').html(tableRows);
}

function getFullTbaleRow(data){
  var profRow = data.profs.map(getNestedTableDataForProfs).join(' ');
  return `<tr>
              <td>${data.module}</td>
              <td>${data.filiere}</td>
              <td>${data.date} From: ${data.HeureD} ~ To: ${data.HeureF}</td>
              <td> ${data.Exam}</td>
              <td style="cursor: pointer; text-align: center;">
                  <button class="button trigger">
                      <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>
              </td>
          </tr>

          <tr class="button--disapear">
              <td colspan="5">
                  <table class="w-100" style="border: 20px solid #e4e4e4">
                      <thead>
                          <tr>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Local</th>
                          </tr>
                      </thead>
                      <tbody>${profRow}</tbody>
                  </table>
              </td>
            </tr>
  `
}
function getNestedTableDataForProfs(prof){
  return `
      <tr>
          <td>${prof.nom}</td>
          <td>${prof.prenom}</td>
          <td>${prof.email}</td>
          <td>${prof.local}</td>
      </tr>
  `
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


// this is used when we the delete the rows on table and its event
// when we fiil it again we set the events once again
function setOniputEvent(){
         $('.trigger').on('click', function (e) {
            var tr = $(this).parents('tr')
            console.log(tr);
            var i = tr.index();
            console.log(i,tr);

              i-=(i/2);
            var siblings = tr.siblings('.button--disapear');
            console.log(siblings);
            var sibling = tr.siblings('.button--disapear').get(i)
            console.log('i', i, sibling, 'tr:', tr);
            if (!$(sibling).hasClass('active')) {
                $(sibling).show();
                $(sibling).removeClass('out').addClass('active');
            } else {
                $(sibling).removeClass('active').addClass('out');
                setTimeout(function () {
                    $(sibling).hide()
                }, 300);
            }

        });

}
