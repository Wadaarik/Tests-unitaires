var formFunctions = (function () {
    
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
  console.log("Request complete! response:", res);
});
  }

  return {
    createTeams: createTeams,
    test: test,
  }
})(); 


      
     