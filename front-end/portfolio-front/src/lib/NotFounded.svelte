<div class="central">
    <h1>Error 404</h1>
    <h2>Page not found</h2>
    <button><a href="/">Go to main page</a></button>
    <button><a href="/comments">Go to comments</a></button>
</div>

<style>
    /* Общие стили */
    .central {
        text-align: center;
        color: white;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        background: linear-gradient(45deg, #041129, #0a1613, #12180b, #1f131c, #350404);
    }

    h1 {
        font-size: 3rem;
        margin: 20px 0;
    }

    h2 {
        font-size: 1.5rem;
        margin-bottom: 30px;
    }

    button {
        margin: 10px;
        padding: 10px 20px;
        font-size: 1rem;
       
        cursor: pointer;
    }
    
    a {
        text-decoration: none;
        color: inherit;
    }

    /* Медиа-запросы для адаптивности */
    @media (max-width: 768px) {
        h1 {
            font-size: 2.5rem; /* Уменьшаем размер заголовка для мобильных устройств */
        }

        h2 {
            font-size: 1.2rem; /* Уменьшаем размер подзаголовка для мобильных устройств */
        }

        button {
            padding: 8px 15px; /* Уменьшаем размер кнопок */
            font-size: 0.9rem; /* Уменьшаем размер текста в кнопке */
        }
    }
</style>
