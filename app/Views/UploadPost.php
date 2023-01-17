
<section class="s-featured">
        <div class="row">
            <div class="col-full">
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="">Title</label>
                    <input type="text" name="tittle">
                    <label for="">Intro</label>
                    <input type="text" name="intro">
                    <label for="">Content</label>
                    <textarea name="content" id="" cols="30" rows="10"></textarea>
                    <label for="">Category</label>
                    <select name="category" id="">
                    <?php 
                        foreach($categories as $row){
                            echo '<option value="'.$row['id'].'" >'.$row['name'].'</option>';
                        }
                    ?> 
                    </select>
                    <label for="">tags</label>
                    <input type="text" name="tags">
                    <label for="">File</label>
                    <input type="file" name="banner" required><br>
                    <input type="submit">
                </form>
            </div>  
        </div>
</section>