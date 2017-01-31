<div>
    <h2>Новости</h2>
</div>
<!-- Main -->
<div >
    <!-- Post -->
    <?php foreach ($data as $row){
        echo " <article  class='post'>
        <header>
            <div class='title'>
                <h2><a href='/news_item?id=".$row['id']."'>".$row['header']."</a></h2>
            </div>
        </header>
        <p>
            ". substr($row['meta'], 0, 300)."...
        </p>
        <hr>
    </article>";
    }
    ?>


</div>
