Yii Jouele Widget
=================

Wrapper around Jouele player - a beautiful audio player for the web

- [Examples](http://stanislavkrsv.github.com/yii-jouele-widget)
- [Github Project Page](https://github.com/stanislavkrsv/jouele)


Installation
------------------

Unpack to protected/extensions.

Usage
------------------

### Using with a model

~~~
$this->widget('ext.jouele.Jouele', array(
    'file' => $model->file,
    'name' => $model->name,
    'htmlOptions' => array(
        'class' => 'jouele-skin-silver',
     )
));
~~~

### Using with a string

~~~
$this->widget('ext.jouele.Jouele', array(
    'file' => '/patch/to/file.mp3',
    'name' => 'The Black Keys - Lonely Boy',
    'htmlOptions' => array(
        'class' => 'jouele-skin-silver',
     )
));
~~~



Changelog
------------------

### v0.1

- Initial version.