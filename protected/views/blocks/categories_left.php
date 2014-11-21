<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">-->
<!--<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>-->
<? $categories = Category::model()->findAll();?>
<div class="banner_list box">
    <h3><?=$blockTitle?></h3>
    <select id="catSelect">
        <option value="" disabled selected>Выберите категорию</option>
        <?foreach($categories as $category):?>
            <option value="<?=$category->id?>"><?=$category->title?></option>
        <?endforeach;?>
    </select>
    <span class="s_h4">Популярные категории:</span>
    <?$i=0?>
    <ul >
        <?foreach($categories as $category):?>
        <li><a href="<?= Yii::app()->controller->createUrl('?id_category=' . $category->id)?>"><?=$category->title?></a></li>
        <?$i++;?>
        <?if($i== 10):?>
    </ul>
    <a class="btn_orange" href="#" onclick="openDialog('categories')">показать все категории</a>
<?break;?>
<?endif?>
<?endforeach;?>

    <div id="categoriesDialog" style="display: none">
        <?foreach($categories as $category):?>
            <a href="<?= Yii::app()->controller->createUrl('?id_category=' . $category->id)?>"><?=$category->title?></a><br/>
        <?endforeach;?>
    </div>
    <script>
        $(document).ready(function(){
            $('#catSelect').change(function(){
                window.location = "<?= Yii::app()->controller->createUrl('?id_category=' . $category->id)?>" + $('#catSelect option:selected').val();
            });

            $('#categoriesDialog').dialog({
                autoOpen: false,
                title: '',
                modal: true,
                resizable: false
            });
        });
    </script>
</div>