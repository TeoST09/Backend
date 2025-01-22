
<!DOCTYPE html>
   <html lang="es">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="{{asset('css/inicio.css')}}">
      <link rel="icon" href="{{asset('Media/logo.png')}}" type="image/png')}}">
      <title>StarMax-Compras</title>
   </head>
   <body>
   <header>
    <div class="header-container">
        <img src="{{asset('Media/logo.png')}}" alt="Star Max Logo" class="logo" />
        <nav>
            <a href="https://discord.gg/n5ckrUxH6G">WhatsApp</a>
            <a href="/login">Login</a>
        </nav>
    </div>
</header>
      <div class="container">
         <div class="card__container">
            <article class="card__article">
               <img src="{{asset('Media/disney.png')}}" alt="image" class="card__img">

               <div class="card__data">
                  <span class="card__description">Pantalla-Disney+</span>
                  <h2 class="card__title">$6.000</h2>
                  <a href="/login" class="card__button">Mas info</a>
               </div>
            </article>

            <article class="card__article">
               <img src="{{asset('Media/primevideo.png')}}" alt="image" class="card__img">

               <div class="card__data">
                  <span class="card__description">Pantalla-Primevideo</span>
                  <h2 class="card__title">10.000</h2>
                  <a href="/login" class="card__button">Mas info</a>
               </div>
            </article>

            <article class="card__article">
               <img src="{{asset('Media/netflix.png')}}" alt="image" class="card__img">

               <div class="card__data">
                  <span class="card__description">Pantalla-Netflix</span>
                  <h2 class="card__title">8.000</h2>
                  <a href="/login" class="card__button">Mas info</a>
               </div>
            </article> 
<!--Segunda Parte-->
            <article class="card__article">
                <img src="{{asset('Media/paramount.png')}}" alt="image" class="card__img">
  
                <div class="card__data">
                   <span class="card__description">Pantalla-Paramount</span>
                   <h2 class="card__title">$6.000</h2>
                   <a href="/login" class="card__button">Mas info</a>
                </div>
             </article>
             <article class="card__article">
                <img src="{{asset('Media/primevideo.png')}}" alt="image" class="card__img">
  
                <div class="card__data">
                   <span class="card__description">Pantalla-HBO Max</span>
                   <h2 class="card__title">10.000</h2>
                   <a href="/login" class="card__button">Mas info</a>
                </div>
             </article>
             <article class="card__article">
                <img src="{{asset('Media/netflix.png')}}" alt="image" class="card__img">
  
                <div class="card__data">
                   <span class="card__description">Star+</span>
                   <h2 class="card__title">8.000</h2>
                   <a href="/login" class="card__button">Mas info</a>
                </div>
             </article> 
         </div>
      </div>
        </div>
     </div>

   </body>
</html>           
