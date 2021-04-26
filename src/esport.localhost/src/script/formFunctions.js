var formFunctions = (function () {
  let interval = null;

  // GET ALL TEAMS
  async function getTeamsInSelect() {
    let teamsList = document.getElementById("teams");
    const selectExist = document.getElementById("selectTeams");
    if(!selectExist){
         let response = await fetch("/api/v1/equipes/getall/");
         try {
             let res = await response.json();
             let results = await res.records;
             console.log(res)
             if(results){
             var selectList = document.createElement("select");
             selectList.setAttribute("id", "selectTeams");
             /*selectList.addEventListener('change', function() {
                getStations(this.value, this.options[this.selectedIndex].text);
              });*/
              teamsList.appendChild(selectList);
             for (var i = 0; i < results.length; i++) {
                 var option = document.createElement("option");
                 option.value = results[i].id;
                 option.text = results[i].nom;
                 selectList.appendChild(option);
             }
            }
         }
         catch (err) {
             console.log(err);
         }
    }
 }

 //DELETE TEAMS
 function deleteTeam(id){
fetch("/api/v1/equipes/delete/", {
method: "POST", 
body: JSON.stringify({id})
}).then(res => {
getTeams();
console.log("Request complete! response:", res);
});
}

 // GET ALL TEAMS 
 async function getTeams() {
  if(interval !== null){clearInterval(interval)};
  let teams = document.getElementById("teamsContainer");
   let response = await fetch("/api/v1/equipes/getall/");
   try {
       let res = await response.json();
       let results = await res.records;
       if(results){
          while (teams.firstChild) {
            teams.removeChild(teams.lastChild);
            }
          var texte = document.createElement("P");
          texte.setAttribute("id", "textTeamsList");
          texte.innerText = `Voici la liste de toutes les teams`;
          teams.appendChild(texte);

          var teamsList = document.createElement('ul');
          teamsList.setAttribute('id','teamsList');
          teams.appendChild(teamsList);

          for (var i = 0; i < results.length; i++) {
                    var li = document.createElement("li");
                    teamsList.appendChild(li);
                    li.innerHTML= `${i} : ${results[i].nom}`;
                    var img = document.createElement("img");
                    img.setAttribute("src", `${results[i].logo.replace("esport.localhost", "")}`);
                    img.setAttribute("width", "25");
                    img.setAttribute("height", "25");
                    img.setAttribute("alt", `${results[i].nom}`);
                    img.setAttribute("style", "margin: 0 10px");
                    li.appendChild(img);
                    var deleteCross = document.createElement("P");
                    deleteCross.setAttribute("style", "color: red!important; display: contents!important; cursor: pointer!important");
                    var id = results[i].id;
                    deleteCross.addEventListener('click', function() {
                      deleteTeam(id);
                    });
                    deleteCross.innerText = `X`;
                    li.appendChild(deleteCross);
                }
          interval = setInterval(function() {getTeams()}, 30000);
          }
   }
   catch (err) {
       console.log(err);
   }
}
  
  // CREATE NEW TEAM
  function createTeams(nom, logo, pays, date_creation) {
    let data = {
      nom,
      logo,
      pays,
     date_creation,
      link_fb: "fb/compte",
      link_twitter: "twitter/compte",
      link_insta: "insta/compte",
   };
fetch("/api/v1/equipes/create/", {
  method: "POST", 
  body: JSON.stringify(data)
}).then(res => {
  console.log("Request complete! response:", res);
});
  }

  // CREATE TEST TEAM
  function test() {
    let data = {
      nom: "test",
      logo: "logo.png",
      pays: "1",
      date_creation: "2021",
      link_fb: "fb/compte",
      link_twitter: "twitter/compte",
      link_insta: "insta/compte",
   };
fetch("/api/v1/equipes/create/", {
  method: "POST", 
  body: JSON.stringify(data)
}).then(res => {
  getTeams();
  console.log("Request complete! response:", res);
});
  }

  return {
    getTeams: getTeams,
    createTeams: createTeams,
    test: test,
  }
})(); 


      
     