<?$brands = Brand::model()->findAll();?>
<div class="banner_list box">
    <h3><?=$blockTitle?></h3>
    <select id="brandSelect">
        <option value="" disabled selected>Выберать торговую марку</option>
        <?foreach($brands as $brand):?>
            <option value="<?=$brand->id?>"><?=$brand->title?></option>
        <?endforeach;?>
    </select>
    <span class="s_h4">Популярные бренды:</span>
    <?$i=0?>
    <ul >
        <?foreach($brands as $brand):?>
        <li><a href="<?= Yii::app()->controller->createUrl('?id_brand=' . $brand->id)?>"><?=$brand->title?></a></li>
        <?$i++;?>
        <?if($i== 10):?>
    </ul>
    <a class="btn_orange" href="#" onclick="openDialog('brands'); return false;">показать все бренды</a>
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