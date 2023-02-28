# ChatGPT Chatbot

Kindly Enter Your APi key in order to use this.

# Author
Rahees Ahmed

## Usage

To use this script, include the following code in your HTML file:

```html
<div id="chat-container"></div>
const apikey = "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";

function sendMessage() {
  const message = document.getElementById("message-input").value;
  const url = "https://api.openai.com/v1/completions";
  const data = {
    model: "text-davinci-003",
    prompt:"\n\n"+ message,
    temperature: 0.7,
    max_tokens: 500,
    top_p: 1,
    "n": 1,
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
      } else {
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

if (message == null) {
  let placeHolderContainer = getElementbyclassname("placeholder-container");
  placeHolderContainer.css.style.display = "block";
} else {
  let placeHolderContainer = getElementbyclassname("placeholder-container");
  placeHolderContainer.css.style.display = "none";
}

