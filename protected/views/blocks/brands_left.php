<div>
    <select id="brandSelect">
        <option value="" disabled selected>Выберать торговую марку</option>
        <?foreach($brands as $brand):?>
            <option value="<?=$brand->id?>"><?=$brand->title?></option>
        <?endforeach;?>
    </select>
    <h3>Популярные бренды:</h3>
    <?$i=0?>
    <?foreach($brands as $brand):?>
        <a href="<?= Yii::app()->controller->createUrl('?id_brand=' . $brand->id)?>"><?=$brand->title?></a><br/>
        <?$i++;?>
        <?if($i== 10):?>
            <input type="button" value="показать все бренды" onclick="openDialog('brands')">
            <?break;?>
        <?endif?>
    <?endforeach;?>
    <div id="brandsDialog" style="display: none">
        <?foreach($brands as $brand):?>
            <a href="<?= Yii::app()->controller->createUrl('?id_brand=' . $brand->id)?>"><?=$brand->title?></a><br/>
        <?endforeach;?>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#brandSelect').change(function(){
            window.location = "<?= Yii::app()->controller->createUrl('?id_brand=' . $brand->id)?>" + $('#brandSelect option:selected').val();
        });
        $('#brandsDialog').dialog({
            autoOpen: false,
            title: '',
            modal: true,
            resizable: false
        });
    });
    function openDialog(type)
    {
        if(type == 'categories'){
            $('#categoriesDialog').dialog('open');
        } else {
            $('#brandsDialog').dialog('open');
        }
    }
    </script>