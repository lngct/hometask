<?php

function PageHeader()
{
    ?>
        <header class="navbar navbar-dark bg-dark navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Company name</a>
                </div>
            </div>
        </header>
    <?php
}

function InputForm()
{
?>
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-7 col-xl-6"
                <form method="post">
                    <div class="form-group">
                        <label for="clientname">Ваше имя</label>
                        <input type="text" class="form-control form-control-sm" name="clientname" id="clientname" placeholder="Игорь">
                    </div>
                    <div class="form-group">
                        <label for="clientsurname">Ваша фамилия</label>
                        <input type="text" class="form-control form-control-sm" name="clientsurname" id="clientsurname" placeholder="Крупицын">
                    </div>
                    <div class="form-group">
                        <label for="clientphone">Ваш телефон</label>
                        <input type="tel" class="form-control form-control-sm" name="clientphone" id="clientphone" placeholder="+7(___)___-__-__">
                    </div>
                    <div class="form-group">
                        <label for="rates">Выберите тариф</label>
                    <select class="form-control form-control-sm" id="rates">
                        <option name="option1">var1</option>
                        <option name="option2">var2</option>
                        <option name="option3">var3</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="selectdate">Укажите первый день, удобный для доставки</label>
                        <input type="date" name="selectdate" id="selectdate" class="form-control form-control-sm" id="">
                    </div>
                    <div class="form-group">
                        <label for="address">Укажите адрес доставки</label>
                        <input type="text" class="form-control form-control-sm" name="address" id="address" placeholder="г. Нижний тагил, ул. Цюрупы, 15">
                    </div>
                    <button type="submit" class="btn btn-primary">Подтвердить</button>
                </form>
            </div>
        </div>
    </div>
<?php 
}

function DropDB()
{
    global $db;

    // drop table Clients

    if (mysqli_query($db, "DROP TABLE IF EXISTS `hometask`.`Clients` ;") === TRUE)
    {
        print "Таблица Clients удалена<br>";
    }
    else
    {
        printf("Ошибка: %s\n", mysqli_error($db));
    }

    // drop table rates

    if (mysqli_query($db, "DROP TABLE IF EXISTS `hometask`.`rates` ;") === TRUE)
    {
        print "Таблица rates удалена<br>";
    }
    else
    {
        printf("Ошибка: %s\n", mysqli_error($db));
    }

    // drop table orders

    if (mysqli_query($db, "DROP TABLE IF EXISTS `hometask`.`Orders` ;") === TRUE)
    {
        print "Таблица Orders удалена<br>";
    }
    else
    {
        printf("Ошибка: %s\n", mysqli_error($db));
    }

}

function InitDB()
{
	global $db;

	// Создание таблицы Clients

    if (mysqli_query($db, "CREATE TABLE IF NOT EXISTS `hometask`.`Clients` (
                  `clnt_id` INT NOT NULL,
                  `clnt_name` VARCHAR(50) NOT NULL,
                  `clnt_surname` VARCHAR(50) NOT NULL,
                  `clnt_phone` VARCHAR(20) NOT NULL,
                  PRIMARY KEY (`clnt_id`),
                  UNIQUE INDEX `clientphone_UNIQUE` (`clnt_phone` ASC) VISIBLE)
                ENGINE = InnoDB;") === TRUE)
    {
        print "Таблица Clients создана<br>";
    }

    else
    {
        printf("Ошибка: %s\n", mysqli_error($db));
    }

        // Создание таблицы rates

    if (mysqli_query($db, "CREATE TABLE IF NOT EXISTS `hometask`.`rates` (
                  `rate_id` INT NOT NULL AUTO_INCREMENT,
                  `rate_type` VARCHAR(255) NOT NULL,
                  `rate_cost` DECIMAL(18,2) NOT NULL,
                  `dlvr_days` INT NOT NULL,
                  PRIMARY KEY (`rate_id`))
                ENGINE = InnoDB;") === TRUE)
    {
        print "Таблица rates создана<br>";
    }

    else
    {
        printf("Ошибка: %s\n", mysqli_error($db));
    }

        // Создание таблицы Orders

    if (mysqli_query($db, "CREATE TABLE IF NOT EXISTS `hometask`.`Orders` (
                  `order_id` INT NOT NULL AUTO_INCREMENT,
                  `clnt_id` INT NOT NULL,
                  `rate_id` INT NOT NULL,
                  `dlvr_date` DATE NOT NULL,
                  `dlvr_address` VARCHAR(128) NOT NULL,
                  PRIMARY KEY (`order_id`),
                  INDEX `clnt_id_idx` (`clnt_id` ASC) VISIBLE,
                  INDEX `rate_id_idx` (`rate_id` ASC) VISIBLE,
                  CONSTRAINT `clnt_id`
                    FOREIGN KEY (`clnt_id`)
                    REFERENCES `hometask`.`Clients` (`clnt_id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION,
                  CONSTRAINT `rate_id`
                    FOREIGN KEY (`rate_id`)
                    REFERENCES `hometask`.`rates` (`rate_id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION)
                ENGINE = InnoDB;") === TRUE)
    {
        print "Таблица Orders создана<br>";
    }

    else
    {
        printf("Ошибка: %s\n", mysqli_error($db));
    }


}

function GetOrder()
{
    $s = $_POST["clientname"];
    print $s;
}