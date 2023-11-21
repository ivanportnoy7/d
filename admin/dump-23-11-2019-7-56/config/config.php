<? 
$filename = "../config.php";
if (file_exists($filename)) include ($filename);
?>
<div class="uk-grid">
    <div class="uk-width-1-3@s ">
        <div class="uk-form-horizontal uk-margin-medium uk-card uk-card-body uk-card-small uk-card-default">
            <h4>Ценообразование: </h4>
            <p><label class="uk-form-label" for="valuta">Валюта: <em>*</em></label><div class="uk-form-controls"><input class="uk-input" required id="valuta" type="text" name="valuta" value="<?= $valuta; ?>" placeholder="Валюта для цены - грн, руб, и т.д. Размещается во всех местах ленда"></div></p>
            <p><label class="uk-form-label" for="price_new">Новая цена: <em>*</em></label><div class="uk-form-controls"><input class="uk-input" required id="price_new" type="text" name="price_new" value="<?= $price_new ?>" placeholder="Новая цена. Размещается во всех местах ленда"></div></p>
            <p><label class="uk-form-label" for="skidka">Скидка, %: <em>*</em></label><div class="uk-form-controls"><input class="uk-input" required id="skidka" type="text" name="skidka" value="<?= $skidka ?>" placeholder="Скидка. Старая цена будет считаться автоматически"></div></p>
            Старая цена в конфигураторе: <strong><span class="uk-label uk-label-danger"><?= $price_old ?> <?= $valuta ?></span></strong> 
            <p><label class="uk-form-label">Таймер: <em>*</em></label><div class="uk-form-controls"><input class="uk-input" required id="timer" type="text" name="timer" value="<?= $timer ?>" placeholder="12:30:00"></div></p>
            <p><label class="uk-form-label">Ссылка на политику конфиденциальности:</label><div class="uk-form-controls"><input class="uk-input" id="link1" type="text" name="link1" value="<?= $link1 ?>" placeholder="http://"></div></p>
            <p><label class="uk-form-label">Ссылка на пользовательское соглашение:</label><div class="uk-form-controls"><input class="uk-input" id="link2" type="text" name="link2" value="<?= $link2 ?>" placeholder="http://"></div></p>
            <p><label class="uk-form-label">Тема: <em>*</em></label><div class="uk-form-controls">
                <select name="theme">
                    <option value="0" <?php echo ((int) $theme === 0) ? 'selected' : "";?>>Стандарт</option>
                    <option value="1"<?php echo ((int) $theme === 1) ? 'selected' : "";?>>Синяя</option>
                    <option value="2"<?php echo ((int) $theme === 2) ? 'selected' : "";?>>Зеленая</option>
                    <option value="3"<?php echo ((int) $theme === 3) ? 'selected' : "";?>>Фиолетовая</option>
                </select>
            </div></p>
        </div>


        <div class="uk-form-horizontal uk-margin-medium uk-card uk-card-body uk-card-small uk-card-default">
            <h4>Отправка информации о покупке: </h4>
            <p><label class="uk-form-label" for="product">Наименование подукта: <em>*</em></label><div class="uk-form-controls"><input class="uk-input" required id="product" type="text" name="product" value="<?= $product ?>" placeholder="Наименование продукта, которое будет указано в заголовке и тексте письма"></div></p>
            <p><label class="uk-form-label" for="email">E-mail: <em>*</em></label><div class="uk-form-controls"><input class="uk-input" required id="email" type="text" name="email" value="<?= $email ?>" placeholder="E-mail, на который будут приходить уведомления о покупке."></div></p>

            <p> <label class="uk-form-label" for="comment">Комментарий: </label><div class="uk-form-controls"><textarea class="uk-textarea" rows="2" id="comment" name="comment" cols="70"><?= str_replace("<br />", "\n", $comment); ?></textarea></div></p>
            <!--	 Дополнительная переменная в разделе Отправка информации о покупке -->
        </div> 

    </div>


    <div class="uk-width-1-2@s">

        <div class="uk-form-horizontal uk-margin-medium uk-card uk-card-body  uk-card-small uk-card-default">
            <h4>Коды: </h4>
            <p><label class="uk-form-label fs10" for="head_index">Блок head для Index:<span><br>Код для размещения в тегах<br><strong>&#8249;head&#8250; Ваш код &#8249;&#47;head&#8250;</strong><br>индексной страницы<br>Здесь размещают пиксели, META-теги, ссылки на JS для аналитики и пр.</span></label><div class="uk-form-controls"><textarea class="uk-textarea" rows="5" id="head_index" name="head_index" cols="70"><?= str_replace("<br />", "\n", $head_index); ?></textarea></div></p>
            <p><label class="uk-form-label fs10" for="head_thanks">Блок head для Thanks: <span><br>Код для размещения в тегах<br><strong>&#8249;head&#8250; Ваш код &#8249;&#47;head&#8250;</strong><br>страницы "Спасибо"<br>Здесь размещают пиксели, META-теги, ссылки на JS для аналитики и пр.</span></label><div class="uk-form-controls"><textarea class="uk-textarea" rows="5" id="head_thanks" name="head_thanks" cols="70"><?= str_replace("<br />", "\n", $head_thanks); ?></textarea></div></p>
            <p><label class="uk-form-label fs10" for="body_index">Блок body для Index: <span><br>Код для размещения в тегах<br><strong>&#8249;body&#8250; Ваш код &#8249;&#47;body&#8250;</strong><br>индексной страницы<br>Здесь можно разместить код ретаргетинга, счетчиков Яндекс, Вконтакте, Mail-ru, Google-аналитику</span></label><div class="uk-form-controls"><textarea class="uk-textarea" rows="5" id="body_index" name="body_index" cols="70"><?= str_replace("<br />", "\n", $body_index); ?></textarea></div></p>
            <p><label class="uk-form-label fs10" for="body">Блок body для Thanks: <span><br>Код для размещения в тегах<br><strong>&#8249;body&#8250; Ваш код &#8249;&#47;body&#8250;</strong><br>страницы "Спасибо"Здесь можно разместить код ретаргетинга, счетчиков Яндекс, Вконтакте, Mail-ru, Google-аналитику</span></label><div class="uk-form-controls"><textarea class="uk-textarea" rows="5" id="body_thanks" name="body_thanks" cols="70"><?= str_replace("<br />", "\n", $body_thanks); ?></textarea></div></p>

            <!--	 Дополнительная переменная в разделе КОДЫ -->

        </div> 

        <div class="uk-form-horizontal uk-margin-medium uk-card uk-card-body  uk-card-small uk-card-default">
            <a href="../../edit.php" class="uk-button uk-button-danger uk-width-1-1" target="_blank">ВИЗУАЛЬНЫЙ РЕДАКТОР</a>
        </div> 

    </div>
    
    <div class="uk-width-1-6@s">
        <a href="http://traffic-master.taraslevchik.com?utm_source=shablon" target="_blank"><img src="../img/bb.jpg" style="width: 100%;"></a>
    </div>

</div>

<p> <input type="submit" value="Сохранить Изменения" class="uk-button uk-button-danger uk-width-1-1"></p>