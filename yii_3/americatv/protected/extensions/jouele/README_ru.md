Yii Jouele Widget
=================

Обёртка для Жуэль — простого и красивого плеера для веба

- [Примеры](http://stanislavkrsv.github.com/yii-jouele-widget)
- [Страница на Github](https://github.com/stanislavkrsv/jouele)


Установка
------------------

Распакуйте в protected/extensions.

Использование
------------------

### Используя модель

~~~
$this->widget('ext.jouele.Jouele', array(
    'file' => $model->file,
    'name' => $model->name,
    'htmlOptions' => array(
        'class' => 'jouele-skin-silver',
     )
));
~~~

### Используя строки

~~~
$this->widget('ext.jouele.Jouele', array(
    'file' => '/patch/to/file.mp3',
    'name' => 'The Black Keys — Lonely Boy',
    'htmlOptions' => array(
        'class' => 'jouele-skin-silver',
     )
));
~~~



Changelog
------------------

### v0.1

- Initial version.