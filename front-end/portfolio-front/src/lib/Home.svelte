<script>
  import { onMount } from "svelte";
  let isPrintingComplete = false

  let text1 = 'Java, Python, C#, JS'
  let text2 = 'Flask, Spring Boot, Svelte'
  let text3 = 'Sigma developer from Google.😎'
  let displayedText1 = ""; 
  let displayedText2 = ""; 
  let displayedText3 = ""; 
  let index1 = 0;
  let index2 = 0
  let index3 = 0 
  let isCursorVisible = true; 

  function printText() {
    const interval = setInterval(() => {
      if (index1 < text1.length) {
        displayedText1 += text1[index1];
         index1++;
      }

      if (index2 < text2.length) {
        displayedText2 += text2[index2];
        index2++;
      } 

      if (index3 < text3.length) {
        displayedText3 += text3[index3];
        index3++;
      }else {
        clearInterval(interval);
        setTimeout(() => {
          isPrintingComplete = true
          isCursorVisible = false
        }, 3000);
      }
    }, 50);
  }
  let interval;
  let interval2;
  onMount(() => {
    printText();
    const cursorInterval = setInterval(() => {
      if (!isPrintingComplete) {
        isCursorVisible = !isCursorVisible;
      }
    }, 600);
    return () => clearInterval(interval);
  });
</script>

<style>
  .card {
    text-align: center;
    color: white;
    font-family: 'Jetbrains Mono';
    font-weight: 500;
    height: 100%;
    overflow: hidden;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: linear-gradient(45deg, #041129, #0a1613, #12180b, #1f131c, #350404);
    overflow: hidden;
  }

  .card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, #041129, rgb(17, 24, 34), #0a1613, #12180b, #1b1311, #1f131c, #350404);
    background-size: 100% 100%;
    filter: blur(50px);
    z-index: -1;
  }

  .logo {
    width: 100%;
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
  }

  .logo img {
    border-radius: 15px;
    max-width: 350px;
    width: 80%;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.4);
  }

  .info {
    width: 100%;
    max-width: 900px;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
  }

  .section {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(10px);
    width: 100%;
    max-width: 600px;
    transition: scale 0.3s ease, box-shadow 0.3s ease height 1s ease;
  }

  .section:hover {
    box-shadow: 0px 15px 40px rgba(0, 0, 0, 0.6);
    scale: 1.005;
  }

  .section h3 {
    font-size: 20px;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 15px;
    text-align: center;
  }

  .section p {
    font-size: 16px;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.5;
    margin: 0;
    text-align: center;
  }

  .cursor {
    display: inline-block;
    width: 2px;
    height: 1em;
    background-color: white;
    margin: 0;
    vertical-align: baseline;
    animation: blink 0.6s steps(1) infinite;
  }

  @keyframes blink {
    50% {
      opacity: 0;
    }
  }

  .contacts a {
    display: inline-block;
    margin: 10px 10px;
    color: #027527;
    font-weight: bold;
    text-decoration: none;
    font-size: 16px;
    transition: color 0.3s ease, transform 0.2s ease;
  }

  .contacts a:hover {
    color: white;
  }

  button {
    margin: 10px;
    padding: 10px 20px;
    font-size: 16px;

    transition: background-color 0.3s ease, transform 0.2s ease;
    border: none;
  }

  button a {
    text-decoration: none;
    color: inherit;
  }

  button[style*="cursor: no-drop"] a {
    pointer-events: none;
    opacity: 0.6;
  }

  @media (max-width: 768px) {
    .card {
      flex-direction: column;
      align-items: center;
      margin-bottom: 0;
    }

    .logo img {
      max-width: 250px;
    }

    .section {
      width: 90%;
      padding: 15px;
    }

    .section h3 {
      font-size: 18px;
    }

    .section p {
      font-size: 14px;
    }

    .contacts a {
      font-size: 14px;
    }

    button {
      width: 90%;
    }
  }

  @media (max-width: 650px) {
    .section {
      padding: 10px;
    }

    .contacts a {
      font-size: 12px;
    }

    button {
      font-size: 14px;
      padding: 8px;
    }
  }
</style>


<div class="card">
  <div class="info">

    <div class="section">
      <h3>About Me</h3>
      <p class="printer">
        {displayedText3}
        <span class:cursor={isCursorVisible}></span>
      </p>
    </div>

    <div class="section">
      <h3>Stack</h3>
      <div>
        <h4>Languages:</h4>
        <p class="printer">{displayedText1}<span class:cursor={isCursorVisible}></span></p>
      </div>
      <div style="margin-top: 10px;">
        <h4>Frameworks:</h4>
        <p class="printer">{displayedText2}<span class:cursor={isCursorVisible}></span></p>
      </div>
    </div>

    <div class="section contacts">
      <h3>Contacts</h3>
      <a href="https://t.me/oks1genn">Telegram</a>
      <a href="https://discord.com/users/1156598346803331285/">Discord</a>
      <a href="https://github.com/oksigenn">Github</a>
      <a href="mailto:sssupboy@gmail.com">Email</a>
    </div>

    <div class="buttons">
      <button>
        <a href="/comments">Write a comment</a>


      </button>
      <button style="cursor: no-drop;"><a style="cursor: no-drop;" href="#">CV</a></button>
    </div>

  </div>
</div>