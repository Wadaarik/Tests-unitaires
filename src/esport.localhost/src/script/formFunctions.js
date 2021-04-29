var formFunctions = (function () {
  let interval = null;

  getTeams();
  //DELETE TEAMS
  function deleteTeam(id) {
    fetch("/api/v1/equipes/delete/", {
      method: "POST",
      body: JSON.stringify({
        id
      })
    }).then(res => {
      getTeams();
      console.log("Request complete! response:", res);
    });
  }

  // GET ALL TEAMS 
  async function getTeams() {
    if (interval !== null) {
      clearInterval(interval)
    };
    let teams = document.getElementById("teamsContainer");
    let response = await fetch("/api/v1/equipes/getall/");
    try {
      let res = await response.json();
      let results = await res.records;


      if (results) {
        while (teams.firstChild) {
          teams.removeChild(teams.lastChild);
        }
        var texte = document.createElement("P");
        texte.setAttribute("id", "textTeamsList");
        texte.innerText = `Voici la liste de toutes les teams`;
        teams.appendChild(texte);

        var teamsList = document.createElement('ul');
        teamsList.setAttribute('id', 'teamsList');
        teams.appendChild(teamsList);

        for (var i = 0; i < results.length; i++) {
          var li = document.createElement("li");
          teamsList.appendChild(li);
          li.innerHTML = `${i} : ${results[i].nom} - ${results[i].date_creation}`;
          var logo = document.createElement("img");
          logo.setAttribute("src", `${results[i].logo.replace("esport.localhost", "")}`);
          logo.setAttribute("width", "25");
          logo.setAttribute("height", "25");
          logo.setAttribute("alt", `${results[i].nom}`);
          logo.setAttribute("style", "margin: 0 10px");
          li.appendChild(logo);

          var country = document.createElement("img");
          country.setAttribute("src", `${results[i].drapeau.replace("esport.localhost", "")}`);
          country.setAttribute("width", "25");
          country.setAttribute("height", "25");
          country.setAttribute("alt", `${results[i].nom}`);
          country.setAttribute("style", "margin: 0 10px");
          li.appendChild(country);

          var deleteCross = document.createElement("P");
          deleteCross.setAttribute("style", "color: red!important; display: contents!important; cursor: pointer!important");
          var id = results[i].id;
          deleteCross.addEventListener('click', function () {
            deleteTeam(id);
          });
          deleteCross.innerText = `X`;
          li.appendChild(deleteCross);
        }
        interval = setInterval(function () {
          getTeams()
        }, 30000);


        return results.length > 0;
      }
      return 'ok';
    } catch (err) {
      console.log(err);
      return 'ko'
    }
  }

  async function createCountrySelect(element) {
    let response = await fetch(`/api/v1/pays/getall/`);
    try {
      let res = await response.json();
      let results = await res.records;
      if (results) {
        for (var i = 0; i < results.length; i++) {
          var option = document.createElement("option");
          option.value = results[i].id;
          option.text = results[i].libelle;
          element.appendChild(option);
        }
      }
    }
    catch (err) {
      console.log("err", err);
    }
  }

  function createForm() {
    var createTeamForm = document.getElementById('createTeamContainer');
    while (createTeamForm.firstChild) {
      createTeamForm.removeChild(createTeamForm.lastChild);
    }

    var selectList = document.createElement("select");
    createCountrySelect(selectList);

    var f = document.createElement("input");
    f.setAttribute('type', "text");
    f.setAttribute('id', "teamName");
    f.setAttribute('name', "Name");
    f.setAttribute('placeholder', "Name");


    var i = document.createElement("input");
    i.setAttribute('type', "text");
    f.setAttribute('id', "teamLogo");
    i.setAttribute('name', "logo");
    i.setAttribute('placeholder', "Logo");

    var d = document.createElement("input");
    d.setAttribute('type', "text");
    f.setAttribute('id', "teamDate");
    d.setAttribute('name', "date");
    d.setAttribute('placeholder', "Date");

    createTeamForm.appendChild(f);
    createTeamForm.appendChild(i);
    createTeamForm.appendChild(selectList);
    createTeamForm.appendChild(d);

    var btn = document.createElement("BUTTON");
    btn.innerHTML = "Add team";
    btn.addEventListener('click', function () {
      createTeams(f.value, i.value, selectList.value, d.value);
    });
    createTeamForm.appendChild(btn);

    console.log("createForm : ", btn)

    return btn;
  }

  // CREATE NEW TEAM
  function createTeams(nom, logo, pays, date_creation) {
    let result = 'ko';
    let data = {
      nom,
      logo,
      pays,
      date_creation,
      link_fb: "fb/compte",
      link_twitter: "twitter/compte",
      link_insta: "insta/compte",
    };
    return fetch("/api/v1/equipes/create/", {
      method: "POST",
      body: JSON.stringify(data)
    })
    .then((response) => {
      return response;
    })
    .catch(error => console.warn(error));
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

  // ---------- UNIT TESTS ----------
  QUnit.test("getTeams test", assert => {
    const done = assert.async();
    getTeams()
      .then(function (result) {
        assert.strictEqual(result, true, "getTeams results");
        done();
      })

  });

  QUnit.test("createForm test", assert => {
    let btn = document.createElement("button");
    btn.innerHTML = "Add team";
    let res = createForm();

    assert.equal(res.toString(), btn.toString(), "createForm results");
  });

  // ----------------------------------
  return {
    getTeams: getTeams,
    test: test,
    createForm: createForm,
    createTeams: createTeams,
  }
})();

