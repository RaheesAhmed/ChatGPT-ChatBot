# Chat GPT Chatbot 

This script adds a typing animation to a chatbot response by animating the display of the response text character by character, as if someone is typing it in real-time.

# Author
Rahees Ahmed

## Usage

To use this script, include the following code in your HTML file:

```html
<div id="chat-container"></div>
if (data.choices && data.choices.length > 0) {
  const response = data.choices[0].text;
  const chatContainer = document.getElementById("chat-container");
  const messageElement = document.createElement("div");
  messageElement.innerHTML = response;
  messageElement.classList.add("message");
  messageElement.classList.add("received");
  chatContainer.appendChild(messageElement);

  const speed = 50; // Set the typing speed in milliseconds
  let i = 0;
  function typeWriter() {
    if (i < response.length) {
      messageElement.innerHTML += response.charAt(i);
      i++;
      setTimeout(typeWriter, speed);
    }
  }
  typeWriter();
}


CSS:

