function changeInput(e) {
  var name = e.name;
  if(name==='id_annee'){
    $("#semestre").prop( "disabled", false );
    dataInputs[name] = e.value;
  }
  var value = e.value;
  console.log(name,value);
  sendData(name,value);
//   console.log(myChart.data);
    // myChart.data.datasets.forEach(dataset => {
    //     dataset.data = [99,10]
    // });
    // myChart.update();
}

function AnneeUnivChangeStats(e) {

}


function sendData(name,value) {
  var xhr = getXhr();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // alert(xhr.responseText);
      const AnneeData = JSON.parse(xhr.responseText);
      const chartData = AnneeData.reduce((prev,curr)=>{
            if(curr.department){
              prev.dsLabel = curr.department
            }else if(curr.annee){
               prev.dsLabel = "Année "+curr.annee
            }else if(curr.semestre){
               prev.dsLabel = curr.semestre
            }
            var FisrtLetterUpperC = curr.prenom.slice(0,1).toUpperCase()
            prev.labels.push(`${FisrtLetterUpperC}.${curr.nom}`)
            prev.data.push(curr.survTotal)
            // prev.dsLabel = `Année ${curr.annee}, ${curr.semestre}`
            return prev;
      },{data:[],labels:[],dsLabel:''})
    myChart.data.labels = chartData.labels;
    myChart.data.datasets.forEach(dataset => {
        dataset.data = chartData.data;
        dataset.label = chartData.dsLabel;

    });
    myChart.update();
    }
  };
  xhr.open("POST", "statistics.php", true);
  var data = new FormData();
  data.append('id_annee',dataInputs['id_annee']);
  data.append(name,value);
  xhr.send(data);
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
