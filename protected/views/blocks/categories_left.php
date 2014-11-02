<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<div>
    <select id="catSelect">
        <option value="" disabled selected>Искать категорию</option>
        <?foreach($categories as $category):?>
            <option value="<?=$category->id?>"><?=$category->title?></option>
        <?endforeach;?>
    </select>
    <h3>Популярные категории:</h3>
    <br/>
    <?$i=0?>
    <?foreach($categories as $category):?>
        <a href="<?= Yii::app()->controller->createUrl('?id_category=' . $category->id)?>"><?=$category->title?></a><br/>
        <?$i++;?>
        <?if($i== 10):?>
            <input type="button" value="показать все бренды" onclick="openDialog('categories')">
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