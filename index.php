<!DOCTYPE html>
<html>
<head>
  <title>Chat App</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
</style>
</head>
<body>
  <div class="container">
    <h1 class="my-4 text-center">Chat App</h1>
    <div id="chat-container" class="border"></div>
    <form onsubmit="sendMessage(); return false;" class="my-4">
      <div class="input-group">
        <input type="text" id="message-input" class="form-control">
        <div class="input-group-append">
        <button type="submit" class="btn btn-primary">
        <i class="fas fa-paper-plane"></i>
      </button>
        </div>
      </div>
    </form>
  </div>
  <script>
    const apikey = "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";

    function sendMessage() {
      const message = document.getElementById("message-input").value;
      const url = "https://api.openai.com/v1/completions";
      const data = {
        model: "text-davinci-003",
        prompt: message,
        temperature: 0.7,
        max_tokens: 500,
        top_p: 1,
        frequency_penalty: 0,
        presence_penalty: 0
      };
      const headers = {
        "Content-Type": "application/json",
        "Authorization": "Bearer " + apikey
      };
      const options = {
        method: "POST",
        headers,
        body: JSON.stringify(data)
      };
      fetch(url, options)
        .then(response => response.json())
        .then(data => {
          if (data.choices && data.choices.length > 0) {
  const response = data.choices[0].text;
  const chatContainer = document.getElementById("chat-container");
  const messageElement = document.createElement("div");
  messageElement.innerHTML = response;
  messageElement.classList.add("message");
  messageElement.classList.add("received");
  chatContainer.appendChild(messageElement);
  console.log(data);

  // Call the typeWriter function to animate the response text
  const speed = 50; // Set the typing speed in milliseconds
  let i = 0;
  const txt = response;
  function typeWriter() {
    if (i < txt.length) {
      messageElement.innerHTML += txt.charAt(i);
      i++;
      setTimeout(typeWriter, speed);
    }
  }
  typeWriter();
}
 else {
            throw new Error("Invalid response from API");
          }
        })
        .catch(error => {
          console.error(error);
          const chatContainer = document.getElementById("chat-container");
          const messageElement = document.createElement("div");
          messageElement.innerHTML = "Error: " + error.message;
          messageElement.classList.add("error");
          chatContainer.appendChild(messageElement);
        });

      const chatContainer = document.getElementById("chat-container");
      const messageElement = document.createElement("div");
      messageElement.innerHTML = message;
      messageElement.classList.add("message");
      messageElement.classList.add("sent");
      chatContainer.appendChild(messageElement);
      document.getElementById("message-input").value = "";
    }
  </script>
</body>
</html>
