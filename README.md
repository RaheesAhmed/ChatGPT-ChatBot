# Typing Animation Chatbot Response

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


```css
body {
  background-color: #f9f9f9;
  font-family: Arial, Helvetica, sans-serif;
}
.container {
  margin-top: 0px;
  max-width: 100%;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px #d9d9d9;
  background-color: white;
}

h1 {
  font-weight: bold;
  color: #4d4d4d;
  text-shadow: 1px 1px #e6e6e6;
}

.border {
  border: 2px solid #d9d9d9;
  border-radius: 10px;
  padding: 10px;
  margin-bottom: 20px;
  height: 450px;
  overflow-y: scroll;
}

.message {
  margin-bottom: 10px;
  padding: 10px;
  border-radius: 10px;
  max-width: 80%;
  animation-duration: 0.5s;
  animation-fill-mode: both;
}

.sent {
  background-color: #007bff;
  color: white;
  align-self: flex-end;
  animation-name: fadeInRight;
}

.received {
  background-color: #f2f2f2;
  color: #4d4d4d;
  align-self: flex-start;
  animation-name: fadeInLeft;
}

.error {
  color: red;
  font-style: italic;
}

.input-group {
  margin-bottom: 20px;
}



.btn-primary {
  /* border-radius: 10px; */
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  background-color: #0062cc;
  border-color: #0062cc;
}
