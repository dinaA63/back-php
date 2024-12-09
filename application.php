<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap/js/bootstrap.bundle.min.js">
    <title>Оформление заявки</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-fluid">
            <a class="nav-link" href="/User/showFormIndex">На главную</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Переключатель навигации">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/User/showFormGetApplication">Все заявки</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/User/showFormAddApplication">Формирование заявки</a>
            </li>
          </ul>
        </div>
          </div>
        </nav>
      </nav>
    </header>  
    <form action="/User/addApplication" method="POST">
        <div class = "container">
             <div class="inpt"><input name="user_id" type="hidden" value="<?=$result;?>"></div>
            <div class="inpt"><input name="car" type="text" placeholder="Модель автомобиля" required></div>
            <div class="inpt"><input name="problem" type="text" placeholder="Опишите проблему" required></div>
            <!-- <div class="inpt"><input name="datetime" type="datetime-local" placeholder="Укажите время записи" required></div> -->
            <!-- <label for="date">Выберите дату:</label> -->
            <div class="inpt"><input type="date" name="date" required style="width: 189px; height: 30px;"/></div>
            <!-- <label>Выберите время:</label> -->
            <div class="inpt"><select name="time" required style="width: 189px; height: 30px;">
                <option value="" disabled selected>-- Выберите время --</option>
                <option value="08:00">08:00</option>
                <option value="09:00">09:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
                <option value="19:00">19:00</option>
                <option value="20:00">20:00</option>
                <option value="21:00">21:00</option>
            </select></div>
            <div class="but"><a href="showFormGetApplication"><button id="button" type="submit">Оформить</button></a></div>
        </div>
    </form>
         <!-- footer -->
         <!-- <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
          <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
          </a>
          <span class="mb-3 mb-md-0 text-body-secondary">© 2024 Починим</span>
        </div>
    
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
          <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
          <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
          <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
        </ul>
      </footer> -->
    </div>
</body>
<script defer src="/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>