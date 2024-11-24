<script>
  let reviews = [];
  let name = '';
  let feedback = '';

  // Получение отзывов с сервера
  const loadReviews = async () => {
    const response = await fetch('http://localhost/Portfolio/back-end/get_reviews.php');
    reviews = await response.json();
  };

  // Отправка отзыва на сервер
  const submitReview = async (e) => {
    e.preventDefault();
    if (!name || !feedback) return;

    // Отправляем данные на сервер через POST
    const response = await fetch('http://localhost/Portfolio/back-end/submit_review.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: new URLSearchParams({ name, feedback })
    });

    // Если запрос успешен, очищаем форму и обновляем список отзывов
    if (response.ok) {
      name = '';
      feedback = '';
      loadReviews(); // Перезагружаем отзывы после добавления нового
    }
  };

  // Загружаем отзывы при монтировании компонента
  import { onMount } from 'svelte';
  onMount(loadReviews);
</script>

<style>
  .main {
    
    display: flex;
    align-items: center;
    margin: 0 auto;
    text-align: center;
    overflow-y: auto;
    height: 100%;
  }

  .main-x {
    padding: 20px;
    padding-bottom: 10px;
    
    width: 500px;
    margin: 0 auto;
    margin-top: 20px;
    margin-bottom: 20px;
    text-align: center;
    background-color: rgba(255, 255, 255, 0.3);

    box-shadow: 2px 2px 25px rgba(0, 0, 0, 0.6);
    border-radius: 10px;
    overflow: auto;
    display: flex;
    flex-direction: column;
    color: black;
    transition: 1s ease;
  }

  form {
    width: 100%;
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 10px;
  }

  input:focus,
  textarea:focus {
    outline: none;
    border: 2px solid transparent;
    border-radius: 5px;
    background-clip: padding-box;
    box-shadow: 0 0 5px 3px rgba(4, 145, 4, 0.6), 0 0 15px 5px rgba(4, 78, 4, 0.4);
    transition: box-shadow 0.3s ease, border-color 0.3s ease;
  }

  input,
  textarea {
    border: 2px solid #4a4e57;
    border-radius: 5px;
    padding: 10px;
    font-size: 16px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
  }

  input:hover,
  textarea:hover {
    border-color: #327402;
  }

h2{
  margin-top: 50px;
}


  input {
    color: #046405;
    width: 300px;
    height: 20px;
    font-family: 'Jetbrains Mono';
  }

  .review {
    background: #fff;
    padding: 15px;
    max-height:300px;
    max-width: 100%;
    border-radius: 5px;
    margin-bottom: 10px;
    word-wrap: break-word; /* Перенос длинных слов */
  word-break: break-word; /* Для совместимости с другими браузерами */
  overflow-wrap: break-word;
  }

::selection{
    background-color: black;
    color: white;
  }

  #feedback {
    height: 30px;
  }

  .reviews-container {
    overflow: hidden;

    margin-bottom: 10px;
  }

  .flex-x {
    display: flex;
    align-items: end;
    justify-content: space-between;
    margin: 19px;
  }

 button{
  margin-top: 30px;
  margin-bottom: 20px;
 }

  form {
    margin-top: 10px;
  }

  textarea {
    margin-top: 30px;
    width: 300px;
    resize: vertical;
    color: #046405;
    min-height: 38px;
  }

  .comment-name{
    font-size: 18px;
    color: black;
  }

  .comment{
    color: #046405;
    margin-bottom: 0;
  }
  .time{
    color: #046405;
    font-size: 13px;
  }
</style>

<div class="main">
  <div class="main-x">
    
    <form on:submit={submitReview}>
      <div class="flex-x">
        <label for="name">Имя:</label>
        <input type="text" id="name" maxlength="40" bind:value={name} required />
      </div>
      <div class="flex-x">
        <label for="feedback">Комментарий:</label>
        <textarea id="feedback" bind:value={feedback} maxlength="200" required></textarea>
      </div>
      <button type="submit">Отправить</button>
    </form>

    
    <div class="reviews-container">
      {#if reviews.length>=1}
      <h2 style="color: white;">Комментарии</h2>
      {/if}
      {#each reviews as review, index}
      <div class="review">
        <strong class="comment-name">{review.name}</strong>
        <p class="comment">{review.feedback}</p>
        <p class="time">{review.created_at}</p>
      </div>
      {/each}
    </div>
  </div>
</div>