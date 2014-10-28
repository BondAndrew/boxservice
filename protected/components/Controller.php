<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();


    /**
     * post image
     * @param $title
     * @param $image
     * @param string $width
     * @param string $class
     * @param string $path
     * @return string
     */
    public function post_image($title, $image, $width='150', $class='news_img', $path = 'news'){
        if(!empty($image) && file_exists(Yii::getPathOfAlias("webroot.images.$path").
                DIRECTORY_SEPARATOR.$image))
            return CHtml::image(Yii::app()->request->baseUrl.
                "/images/$path/".$image, $title,
                array(
                    'width'=>$width,
                    'class'=>$class,
                )
            );
        else
            return CHtml::image(Yii::app()->request->baseUrl."/images/no-image-$path.gif",'Нет картинки',
                array(
                    'width'=>$width,
                    'class'=>$class
                )
            );
    }
}