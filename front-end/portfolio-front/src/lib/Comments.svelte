<script>
    import { onMount } from 'svelte';
  let reviews = [];
  let name = '';
  let feedback = '';
  let isSubmitting = false;

  const loadReviews = async () => {
    const response = await fetch('https://oks1genn.000.pe/back-end/get_reviews.php');
    const text = await response.text();
    reviews = JSON.parse(text);
  };

  const submitReview = async (e) => {
    e.preventDefault();
    if (!name || !feedback) return;

    isSubmitting = true;

    const created_at = new Date().toISOString();

    const response = await fetch('https://oks1genn.000.pe/back-end/submit_review.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: new URLSearchParams({ name, feedback, created_at }) 
    });


    if (response.ok) {
      name = '';
      feedback = '';
      loadReviews();
    }

    isSubmitting = false;
  };
  onMount(loadReviews);
</script>

<style global>
  .main-y {
    margin: 0 auto;
    text-align: center;
    overflow-y: auto;
    padding: 20px;
  }

  .main-x {
    padding: 20px;
    color: white;
    padding-bottom: 10px;
    width: 500px;
    margin: 0 auto;
    margin-top: 20px;
    margin-bottom: 20px;
    text-align: center;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    box-shadow: 2px 2px 25px rgba(0, 0, 0, 0.6);

    border-radius: 10px;
    overflow: auto;
    display: flex;
    flex-direction: column;
    color: black;
    transition: 1s ease;
    border: 1px solid rgba(255, 255, 255, 0.1);
  }

  form {
    width: 100%;
    background-color: rgba(255, 255, 255, 0.4);
    border-radius: 10px;
  }

  input:focus,
  textarea:focus {
    outline: none;
    border: 2px solid #014e01a1;
    background-color: rgba(255, 255, 255, 0.5);
    border-radius: 5px;
    transform: scale(1.02);
    background-clip: padding-box;
    box-shadow: 0 0 5px 3px #033335, 0 0 15px 5px #213435;
    transition: box-shadow 0.3s ease, border-color 0.3s ease, transform 0.3s ease;
  }

  input,
  textarea {
    border: 2px solid #4a4e57;
    border-radius: 5px;
    padding: 10px;
    color: #243642;
    font-size: 16px;
    background-color: rgba(255, 255, 255, 0.3);
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
  }

  input:hover,
  textarea:hover {
    border-color: #1e4701;
    background-color: rgba(255, 255, 255, 0.4);
  }

  h2 {
    margin-top: 50px;
  }

  input {
    color: black;
    width: 100%;
    max-width: 300px;
    height: 30px;
    font-family: 'Jetbrains Mono';
  }

  .review {
    background: rgba(255, 255, 255, 0.3);
    padding: 20px;
    margin-bottom: 15px;
    border-radius: 10px;
    text-align: center;
    word-wrap: break-word;
    word-break: break-word;
    overflow-wrap: break-word;
    transition: transform 0.3s ease;
  }

  .review:hover {
    transform: scale(1.05);
    background: rgba(255, 255, 255, 0.35);
  }

  ::selection {
    background-color: #fff;
    color: black;
  }

  #feedback {
    height: 30px;
  }

  .reviews-container {
    overflow: hidden;
    min-height: 100vh;
    align-items: center;

  }

  .flex-x {
    display: flex;
    align-items: end;
    justify-content: space-between;
    margin: 19px;
  }

  button {
    margin-top: 30px;
    margin-bottom: 20px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    background-color: white;
    color: black;
    background-color: rgba(246, 255, 248, 0.6);
    transition: 0.2s ease;
  }

  button:hover {
    background-color: rgba(246, 255, 248, 0.3);
  }

  form {
    margin-top: 10px;
  }

  textarea {
    margin-top: 30px;
    width: 100%;
    max-width: 300px;
    resize: vertical;
    color: black;
    min-height: 38px;
    max-height: 120px;
  }

  .comment-name {
    font-size: 18px;
    font-weight: medium;
    color: black;
  }

  .comment {
    color: #03350b;
    margin-bottom: 0;
    font-weight: 500;
  }

  .time {
    color: #03350b;
    font-size: 13px;
    margin-bottom: 5px;
  }


  @media screen and (max-width: 650px) {


    .main-x {
      text-align: center;
      padding: 10px;
      max-width: 90%;
      margin: 0 auto;
    }

    .flex-x {
      flex-direction: column;
      align-items: center;
      margin: 15px 0;
    }

    input,
    textarea {
      text-align: center;
      margin: 10px auto;
      width: 85%;
      max-width: 90%;
    }

    .review {
      padding: 10px;
      font-size: 14.5px;
    }

    .review:hover {
      transform: scale(1.02);
    }

    form {
      padding-top: 10px;
    }

    h2 {
      font-size: 20px;
    }

    button {
      width: 80%;
      padding: 12px;
      margin: 20px 15px;
    }
  }

  @media screen and (max-width: 480px) {
    .review {
      padding: 8px;
      font-size: 13px;
    }

    .comment-name {
      font-size: 16px;
    }

    .comment {
      font-size: 14px;
    }

    .time {
      font-size: 12px;
    }
  }
</style>

<div class="main-y">
  <div class="main-x">

    <form on:submit={submitReview}>
      <div class="flex-x">
        <label for="name">Name:</label>
        <input type="text" id="name" maxlength="40" placeholder="Write your name" bind:value={name} required />
      </div>
      <div class="flex-x">
        <label for="feedback">Comment:</label>
        <textarea id="feedback" bind:value={feedback} maxlength="200" placeholder="Write your comment"
          required></textarea>
      </div>
      <button type="submit">Send</button>
    </form>

    <div class="reviews-container">
      {#if reviews.length > 0}
      <h2 style="color: white;">Comments</h2>
      {#each reviews as review}
      <div class="review">
        <strong class="comment-name">{review.name}</strong>
        <p class="comment">{review.feedback}</p>
        <p class="time">
          {new Date(review.created_at).toLocaleString('en-EN', {
          year: 'numeric', month: 'long', day: 'numeric',
          hour: '2-digit', minute: '2-digit'
          })}
        </p>
      </div>
      {/each}
      {:else}
      <div class="no-comments-message">
        <p style="color: white;">No comments yet. Be the first to leave one!</p>
      </div>
      {/if}
    </div>
  </div>
</div>