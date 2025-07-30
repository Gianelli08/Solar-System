<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Soil Solar Project</title>
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Arial', sans-serif;
    }

    .hero {
      background-image: url('images/bg.jpg.png');
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      color: white;
      text-align: center;
    }

    .hero h1 {
      font-size: 2.5em;
      font-weight: bold;
      margin: 0 20px;
      text-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    .btn {
      margin-top: 15px;
      padding: 10px 25px;
      background-color: #8bc34a;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 20px;
      cursor: pointer;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    .btn:hover {
      background-color: #7cb342;
    }
  </style>
</head>
<body>

  <div class="hero">
    <h1>Powering the Earth,<br />Protecting the Soil.</h1>
    
   <button class="btn" type="button" onclick="window.location.href='admin/login.php'">Get Started</button>
   
  </div>

</body>
</html>
