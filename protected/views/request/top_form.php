
<link rel="stylesheet" type="text/css" href="/css/jquery.tokenize.css" />
<script type="text/javascript" src="/js/jquery.tokenize.js"></script>
<div>
    <label>Город:
        <select id="citySelect" class="tokenize-sample">
            <option value="" disabled selected>Выберите город</option>
            <?foreach($cities as $city):?>
                <option value="<?=$city->id?>"><?=$city->title?></option>
            <?endforeach;?>
        </select>
    </label><br/>
    <label>Категории:
        <select id="catRequestSelect" class="tokenize-sample">
            <option value="" disabled selected>Выберите город</option>
            <?foreach($categories as $category):?>
                <option value="<?=$category->id?>"><?=$category->title?></option>
            <?endforeach;?>
        </select>
    </label><br/>
    <label>Производители:
        <select id="brandRequestSelect" class="tokenize-sample">
            <option value="" disabled selected>Выберите город</option>
            <?foreach($brands as $brand):?>
                <option value="<?=$brand->id?>"><?=$brand->title?></option>
            <?endforeach;?>
        </select>
    </label>
    <br/>
    <input type="radio" name="group1" value="1"> 1 день<br/>
    <input type="radio" name="group1" value="3" checked> 3 дня<br/>
    <input type="radio" name="group1" value="4"> 5 дней <br/>
    <input type="radio" name="group1" value="7"> 1 неделя <br/>
    <input type="radio" name="group1" value="30"> 1 месяц <br/>
    <input type="button" value="показать" onclick="showResultList()"/>


    <hr>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#citySelect').tokenize();
        $('#catRequestSelect').tokenize();
        $('#brandRequestSelect').tokenize();
    });
    function showResultList(){
        var resCities = "";
        var resCategories = "";
        var resBrands = "";
        var resDate = $('input:radio[name="group1"]').attr('checked');
        $('#citySelect :selected').each(function(index){
            resCities += $(this).val() + '!!';
        });
        $('#catRequestSelect :selected').each(function(index){
            resCategories += $(this).val() + '!!';
        });
        $('#brandRequestSelect :selected').each(function(index){
            resBrands += $(this).val() + '!!';
        });
        window.location = "<?= Yii::app()->controller->createUrl('')?>" + '?cities=' + resCities + '&categories=' + resCategories + '&brands=' + resBrands + '&time=' + resDate;
    }
</script>
<style>
    .tokenize-sample {
        width: 300px;
        height: 60px;
    }
    </style>