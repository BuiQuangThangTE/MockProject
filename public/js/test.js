    // UI Elements
    const name = document.getElementById("name");
    const lastLocation = document.getElementById("location");
    const status = document.getElementById("status");
    const submit = document.getElementById("submit");
    const charArea = document.getElementById("charArea");
    const search = document.getElementById("search");
    
    // Get the data from the api
    async function getCharacter(character) {
      const characterResponse = await fetch(
        `https://rickandmortyapi.com/api/character/?name=${character}`
      );
      // characterInfo will now contain all our data
      const characterInfo = await characterResponse.json();
      displayCharacters(characterInfo.results);
      return characterInfo;
    }
    
    // Add event listener
    submit.addEventListener("click", function (e) {
      charArea.innerHTML = "";
      let name = search.value;
      getCharacter(name);
      e.preventDefault();
    });
    
    function displayCharacters(charArr) {
      let output = "";
      charArr.forEach(function (character) {
       output += `<div class="card mt-3 text-center">
            <img src="${character.image}" alt="..." class="card-img-top" />
            <div class="card-body">
              <h5 class="card-title">${character.name}</h5>
              <p class="card-text" id="status">${character.status}</p>
              <p class="card-text" id="location">${character.location.name}</p>
            </div>
          </div>
        `;
      });
      charArea.innerHTML = output;
    }