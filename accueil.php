<?php
include './components/header.php'
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <?php
  session_start();
  ?>
  <?php
  ?>
  <style>
    .main {
      margin-top: 2rem;
      /* height: 50vh; */
      display: flex;
      justify-content: center;
      align-items: center;
    }

    main {
      background-color: white;
      padding: 6rem 4rem;
      border-radius: 10px;
      width: 70%;
    }

    h1 {
      font-size: 3rem;
      font-weight: bolder;
      padding-bottom: 1rem;
    }

    h4 {
      font-size: 1.2rem;
    }

    h1,
    h4 {
      text-transform: uppercase;
      color: black;
    }

    p {
      color: black;
      width: 70%;
    }

    @media (max-width: 660px) {
      h1 {
        font-size: .95rem;
      }

      h4 {
        font-size: .8rem;
      }

      .main {
        display: flex;
        width: 100vw;
      }

      main {
        width: 70%;
        padding: 1rem;
      }

      main p {
        width: 90%;
      }
    }
  </style>
  <div class="main">
    <main>
      <h4>bienvenue sur le site de</h4>
      <h1>consultation de livre</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum ullam unde ipsam soluta
        officia, voluptatibus rerum quo iusto eaque non, enim praesentium? Earum repudiandae ex
        dolor odio! Dolorum, velit est.
      </p>
    </main>
  </div>
</body>

</html>