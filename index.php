<!DOCTYPE html>
<html>

<head>
  <title>Chat App</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="container">
    <h1 class="my-4 text-center">ChatGPT ChatBot</h1>
    <div id="chat-container" class="border"></div>
    <form onsubmit="sendMessage(); return false;" class="my-4">
      <div class="input-group">
        <textarea id="message-input" class="form-control" placeholder="Type here to get starting" row=1></textarea>
        <div class="input-group-append">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i>
          </button>
        </div>
      </div>
    </form>
  </div>
  <script src="app.js"></script>
</body>

</html>
