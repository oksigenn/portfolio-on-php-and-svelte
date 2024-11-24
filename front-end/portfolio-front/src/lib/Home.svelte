<script>
    import { onMount } from "svelte";
    import FaTelegram from 'svelte-icons/fa/FaTelegram.svelte'
       let technologies = ['HTML', 'CSS', 'JavaScript', 'Svelte', 'PHP'];
  let src = 'https://elements-resized.envatousercontent.com/elements-video-cover-images/7df0edcc-deb0-4d8d-91f0-aacd1507526c/video_preview/video_preview_0000.jpg?w=500&cf_fit=cover&q=85&format=auto&s=82d79eee2dd10f3e92aa11f9d339088ef161a099026d54ad36960dbc0b5a251d'
    
  const glitchChars1 = ['~', ' ', '?', '£'];
  const glitchChars2 = ['@', '#', '$', '%', '&',  '¶', '₿', '', 'G', 'E', 'N'];
  let text1 = 'Mobile, fullstack developer'
  let text2 = 'Java, Python, C#, JS'
  let text3 = 'Flask, Spring Boot, Svelte'
  let displayedText1 = ""; // Текст, который будет отображаться
  let displayedText2 = ""; // Текст, который будет отображаться
  let displayedText3 = ""; // Текст, который будет отображаться
  let index1 = 0;
  let index2 = 0
  let index3 = 0 // Индекс текущего символа
  let isCursorVisible = true; // Переменная для мигающего курсора // Переменная для мигающего курсора

  // Функция для печати текста
  function printText() {
    const interval = setInterval(() => {
      if (index1 < text1.length) {
        displayedText1 += text1[index1];


        index1++;
      } else {
        clearInterval(interval); // Останавливаем интервал после завершения
      }

      if (index2 < text2.length) {
        displayedText2 += text2[index2];
        if(index2===text2.length){
          displayedText2 += text2[index2+1]
        }


        index2++;
      } 

      if (index3 < text3.length) {
        displayedText3 += text3[index3];


        index3++;
      } 
    }, 50); // Интервал между символами (100 мс)
  }

  let litchChar1 = glitchChars1[Math.floor(Math.random() * glitchChars1.length)];
  let litchChar2 = glitchChars2[Math.floor(Math.random() * glitchChars2.length)];
  function glitchChar1() {
    litchChar1 = glitchChars1[Math.floor(Math.random() * glitchChars1.length)];


    // Через небольшой промежуток времени возвращаем оригинальные символы
    setTimeout(() => {
      
    }, Math.random() * 1000 + 100);
  }

  function glitchChar2() {
    
    litchChar2 = glitchChars2[Math.floor(Math.random() * glitchChars2.length)];

    // Через небольшой промежуток времени возвращаем оригинальные символы
    setTimeout(() => {
      
    }, Math.random() * 500 + 100);
  }
  
  let interval;
  let interval2;
  onMount(() => {
    printText();
    interval = setInterval(glitchChar1, 1000);
    setInterval(() => {
      isCursorVisible = !isCursorVisible; // Переключаем видимость курсора
    }, 600); // Мигающий курсор (переключение каждую секунду)
    interval2 = setInterval(glitchChar2,500) // Эффект каждые 300 мс
    return () => clearInterval(interval); // Очищаем интервал при демонтировании
  });
  </script>
  
  <style>
    .card{
        text-align: center;
        color: white;
        height: 100vh;
        margin: 0;
        padding: 0;
        display: flex;
        width: 100%;
        overflow: hidden;
    }
.logo{
    font-family: "JetBrains Mono"; /* Используем моноширинный шрифт */
      background-color: #282c34; /* Темный фон */
      color: #39FF14; /* Яркий зеленый цвет */
      text-align: center;
      padding: 50px;
      border-right: 3px outset white;
}
    img{
      position: absolute; /* Абсолютное позиционирование относительно .logo */
    top: 50%; /* Центрируем по вертикали */
    left: 50%; /* Центрируем по горизонтали */
    transform: translate(-50%, -50%); /* Сдвигаем на половину размера изображения */
    z-index: 10; /* Обеспечиваем отображение поверх текста */
    width: auto; /* Не даём изображению растягиваться */
    height: auto; /* Пропорциональная высота */
    max-width: 90%; /* Ограничиваем максимальную ширину изображения */
    max-height: 90%; /* Ограничиваем максимальную высоту изображения */
    }
    @keyframes typing {
      from {
        width: 0;
      }
      to {
        width: 30em; /* Ширина текста, подгоняйте под ваш текст */
      }
    }
    pre {
        user-select: none;
      font-size: 24px; /* Размер шрифта для ASCII-арта */
      line-height: 1.2; /* Межстрочный интервал для лучшего отображения */
      white-space: pre-wrap; /* Обрезка текста и перенос строк */
      word-wrap: break-word;
        padding: 0;
        margin: 0;
    }

    .main-pre{
        display: flex;
        position: relative; /* Оставляем остальное содержимое на месте */
    z-index: 1; /* Устанавливаем ниже изображения */
    overflow: hidden; /* Если нужно, скрыть часть содержимого */
        
    }
    .logo{
      box-shadow: 10px 0 5px #282c34;
      position: relative; /* Устанавливаем контекст для позиционирования */
    display: block; 
    }
    
    .number{
        color: darkgreen;
        animation: blink 1s infinite alternate;
    }
    .one-symbol{
        color:rgb(157, 228, 139);
        animation: blink 1s infinite alternate;
    }
    .two-symbol{
        color: lightblue;
        animation: blink 1s infinite alternate;
    }
    @keyframes blink {
      from {
        border-color: #026802;
      }
      to {
        border-color: transparent;
      }
    }
    .logo-text{
        font-size: 12px;
    }
div a{
  color: white;
}
    .info{
      text-align: left;
color: white;
      padding: 0;
      flex-grow: 1;
      background: linear-gradient(
  to right,
  #282c34,#026802
);
.info >a{
  color: white;
}

      padding-left: 20px;

    }
    

    
    .printer {
    font-family: monospace;
    white-space: pre; /* Сохраняем форматирование текста */
    line-height: 1.5;
    font-size: 15px;
    display: inline-block;
  }

  .cursor {
    display: inline-block;
    width: 1ch; /* Задаем ширину курсора */
    height: 1.2em; /* Высота для имитации квадратного курсора */
    background-color: white;
    visibility: hidden; /* Скрытый курсор по умолчанию */
  }

  .cursor-visible {
    visibility: visible; /* Видимый курсор */
  }
  .h2{
    font-size: 20px;
  }

  button a {
    color: black;
  }

  
  </style>
  
  <div class="card">
    <div class="logo">
<pre class="main-pre"><pre>
O<span class="number">0</span><span class="number">{litchChar2}</span><span class="two-symbol">%</span>O
<span class="one-symbol">|</span>   O
O   <span class="one-symbol">{litchChar1}</span>
<span class="two-symbol">{litchChar1}</span>   O
O<span class="one-symbol">{litchChar1}</span><span class="number">0</span><span class="two-symbol">#</span><span class="number">0</span>
</pre><pre>
    <span class="number">7</span>   K
   K  <span class="two-symbol">&</span>
   K<span class="one-symbol">{litchChar1}</span>K 
   <span class="number">7</span>  K
    <span class="two-symbol">{litchChar1}</span>   <span class="two-symbol">#</span>
</pre><pre>
    SS<span class="two-symbol">{litchChar1}</span><span class="two-symbol">{litchChar1}</span>S
<span class="number">2</span>
    <span class="one-symbol">+</span><span class="one-symbol">!</span>SS<span class="one-symbol">{litchChar1}</span>
        S
    SS<span class="two-symbol">#</span><span class="two-symbol">#</span><span class="number">2</span>
</pre><pre>
    III
    <span class="one-symbol">|</span>
    <span class="one-symbol">|</span>
    <span class="number">1</span>
    III
</pre><pre>
    G<span class="two-symbol">&</span><span class="one-symbol">{litchChar1}</span><span class="number">8</span>G
<span class="two-symbol">{litchChar1}</span>
    G  GG
    G   <span class="two-symbol">%</span>
    <span class="number">8</span><span class="number">8</span>GGG
</pre><pre>
    <span class="two-symbol">££</span>EEE
E
    E<span class="number">3</span><span class="number">3</span><span class="two-symbol">ee</span>
E
    <span class="two-symbol">%</span>E<span class="number">3</span>E<span class="one-symbol">{litchChar1}</span>
</pre><pre>
    <span class="number">4</span>   <span class="two-symbol">&</span>
    <span class="two-symbol">Н</span>N  <span class="number">4</span>
    <span class="two-symbol">Н</span> <span class="two-symbol">Н</span> N
    <span class="one-symbol">?</span>  N<span class="two-symbol">&</span>
    N   N
</pre>


</pre>
<img src={src} alt="image">
    </div>
<div class="info">
        <h1>"Oksigen" Illia</h1>
        <div style="margin-bottom: 30px;" class="printer h2">
          {displayedText1}
          <span class:cursor-visible={isCursorVisible} class="cursor"></span>
        </div>
    <div>
      <h3>Stack:</h3>
      <h4>Languages</h4>
      <div class="printer">
        {displayedText2}
        <span class:cursor-visible={isCursorVisible} class="cursor"></span>
      </div>
      <h4>
        Frameworks
      </h4>
      <div class="printer">
        {displayedText3}
        <span class:cursor-visible={isCursorVisible} class="cursor"></span>
      </div>
    </div>
    <div style="margin-top: 30px;">
      <h3>Contacts:</h3>
      <a href="https:/t.me/oks1genn">Telegram</a>
      <a href="https://discord.com/users/1156598346803331285/">Discord</a>
      <a href="https:/github.com/oksigenn">Github</a>
      <a href="mailto:sssupboy@gmail.com">Email</a>
      

      


    </div>
    <button><a href="/comments">Оставить отзыв</a></button>
    </div>
  </div>

  