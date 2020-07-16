<!---預告片-->
<style>
.btns{
  display:flex;
}
.nav{
  display:flex;
  width:320px;
  overflow:hidden;
}
.icon{
  width:80px;
  flex-shrink:0;
  text-align:center;
  position:relative;
}
.icon img{
  width:50px;
  cursor: pointer;
}

.control{
  width:45px;
  font-size:45px;
  text-align:center;
  cursor: pointer;
}

.poster{
  border :1px solid;
  width: 200px;
  height: 260px;
  margin: 0 auto 20px auto;
  position: relative;
}

.po{
  width:100%;
  height:100%;
  position: absolute;
  display: none;
}

.po img{
  width:100%;
}

</style>

<?php
$po=new DB("poster");
$rows=$po->all(['sh'=>1]," order by `rank`");


?>
<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
      <!-- 海報區 -->
        <div class="poster">

        <?php
        
          foreach($rows as $k=>$row){
            echo "<div class='po'>";
            echo "<img src='img/".$row['path']."'>";
            echo "<div class='ct'>".$row['name']."</div>";
            echo "</div>";

          }
        
        
        
        
        
        
        ?>


        </div>
        <!-- 按鈕區 -->
        <div class="btns">
          <div class='control' onclick="shift('left')">&#9664;</div>
          <div class="nav">
          <?php
          foreach($rows as $k=> $row){
            echo "<div class='icon'>";
            echo "<img src='img/".$row['path']."'>";
            echo "</div>";
          }

          ?>
          </div>
          <div class='control' onclick="shift('right')">&#9654;</div>


        </div>
      </div>
    </div>

      <script>
        $(".po").eq(0).show(); //先顯示海報第一張
        let p=0;
        let total=$(".icon").length;   //陣列的長度有多少 算有幾張圖
        
        function shift(direct){

          switch(direct){
            case 'left':
              if(p < (total-4)){    //每次只顯示4張
                p++;
                $(".icon").animate({right:80*p})
              
              }

            break;
            case 'right':
              if(p>0){
                p--;
              $(".icon").animate({right:80*p})
              }

            break;
          }

        }

      </script>


  <!---院線片-->  
    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
        <table>
          <tbody>
            <tr> </tr>
          </tbody>
        </table>
        <div class="ct"> </div>
      </div>
    </div>