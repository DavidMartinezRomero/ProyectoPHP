<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <title></title>
</head>

<body>
  <div class="widget">
    <input type="text" id="chat-input">
    <button id="msgBtn" onclick="sendMessage()">Submit</button>
    <div class="chat-wrapper"></div>
  </div>
</body>

<script>
  function sendMessage() {
    const newP = document.createElement("p");
    // newDiv.classList.add('chatMsg');
    // let chatInput = document.querySelector('#chat-input').value;
    const newContent = document.createTextNode("Hola");
    newP.appendChild(newContent);
    // const chatWrapper = document.getElementsByClassName(chat-wrapper);
    // chatWrapper.appendChild(newDiv);
    const widget = document.querySelector(".widget");
    let chatWrapper = document.querySelector("chat-wrapper");
    document.querySelector('#chat-input').value = '';
    if (document.querySelectorAll('.chatMsg').length > 0) {
      chatWrapper = document.querySelectorAll('.chatMsg')[0];
    }
    widget.insertBefore(newP, chatWrapper);
  }
</script>

</html>