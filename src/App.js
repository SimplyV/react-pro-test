import { useEffect } from "react";
import { createPortal } from "react-dom";

const API_URL = 'http://localhost/apireact/src/backend/send.php';

function App() {

  var jsonData = {
    "users": [{
      "name": "alan",
      "age": 23,
      "username": "turing"
    }, {
      "name": "john",
      "age": 29,
      "username": "__john__"
    }]
  }

  useEffect(() => {
    fetch(API_URL)
    .then(res => {
      console.log(res.json()); 
    })
    .then(
      (data) => {
        console.log(data)
      }
    ,)
  }, [])

  function submitData(e){
    e.preventDefault();
    fetch(API_URL, { // URL
      body: JSON.stringify(jsonData), // data you send.
      cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
      headers: {
        'content-type': 'application/json'
      },
      method: 'POST', // *GET, POST, PUT, DELETE, etc.
      mode: 'no-cors', // no-cors, cors, *same-origin
      redirect: 'follow', // *manual, follow, error
      referrer: 'no-referrer', // *client, no-referrer
  })
  .then(function(response) {
      // manipulate response object
      // check status @ response.status etc.
      return response.json(); // parses json
  })
  .then(function(myJson) {
      // use parseed result
      console.log(myJson);
  });
  }

  return (
    <div className="App">
      <header className="App-header">
        <form onSubmit={submitData}>
          <input type="text" placeholder="firstname"></input>
          <input type="text" placeholder="lastname"></input>
          <input type="text" placeholder="age"></input>
          <button id="submit"> Envoyer </button>
          <a href={API_URL}> es</a>
        </form>
      </header>
    </div>
  );
}

export default App;
