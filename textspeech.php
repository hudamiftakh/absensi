<!DOCTYPE html>
<html>
<head>
  <title>Text to Speech</title>
  <script>
    function speak() {
      var text = document.getElementById("text").value;
      var utterance = new SpeechSynthesisUtterance(text);

      window.speechSynthesis.speak(utterance);
      utterance.lang = 'en-US';
    }
  </script>
</head>
<body>
  <h1>Text to Speech</h1>
  <textarea id="text" rows="5" cols="40"></textarea>
  <br>
  <button onclick="speak()">Convert to Speech</button>
</body>
</html>
