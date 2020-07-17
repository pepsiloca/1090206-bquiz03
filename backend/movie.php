<style>
.list{
    overflow:auto;
    width:100%;
    height:420px;
    background:#eee;
}
.movie-item{
    width:100%;
    background:white;
    margin:2px 0;
}
.movie-item > div{
    display:inline-block;
}

.movie-item > div:nth-child(1),
.movie-item > div:nth-child(2){
    width:10%;
}

.movie-item > div:nth-child(3){
    width:80%;
}
.movie-item > div:nth-child(3) span{
    display:inline-block;
    width:30%;
}

</style>

<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>
<div class="list">
<?php
$db=new DB('movie');
$rows=$db->all([]," order by rank");
foreach($rows as $k => $row){
?>
<div class="movie-item">
    <div>
        <img src="img/<?=$row['poster'];?>" style="width:80px;height:100px">
    </div><div>分級:<img src="icon/<?=$row['level'];?>.png"></div><div>
        <div>
            <span>片名:<?=$row['name'];?></span>
            <span>片長:<?=$row['length'];?></span>
            <span>上映時間:<?=$row['ondate'];?></span>
        </div>
        <div>
    <button onclick="sh('movie',<?=$row['id'];?>)"><?=($row['sh']==1)?"顯示":"隱藏";?></button>
    <button class="shift" data-rank="<?=$row['id']."-".$prev;?>">往上</button>
    <button class="shift" data-rank="<?=$row['id']."-".$next;?>">往下</button>
    <button onclick="edit('movie',<?=$row['id'];?>)">編輯電影</button>
    <button onclick="del('movie',<?=$row['id'];?>)">刪除電影</button>

        </div>
        <div>劇情簡介:<?=$row['intro'];?></div>
    </div>
</div>
<?php
}
?>


</div>

<script>

function sh(table,id){
    $.post("api/sh.php",{table,id},function(){
        location.reload();
    }) 

}    

function del(table,id){
    $post("api/del.php",{table,id}, function(){
        location.reload();
    })
}




$(".shift").on("click",function(){
    let id=$(this).data("rank").split("-");
    $.post("api/rank.php",{id,"table":"movie"},function(){
        location.reload();
    })
})


</script>
