<?php include_once('../header.php') ?>
<h1 class="text-info ">Trang thêm bài viết</h1>
<button class="btn tbn-default"><a href="index.php">page Admin</a></button>



<?php include_once('../footer.php') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <form>
                <label for="newsName">Tiêu đề</label>
                <input class="w-100"  type="text" name="newsName"><br>
                <label for="content">Nội dung</label>
                <textarea class="ckeditor" name="content"></textarea>
                <script>
                    CKEDITOR.replace('content');
                </script>
            </form>
        </div>
        <div class="col-4 pt-5 pl-5">
            <div class="w-100 my-4 catogry">
                <h6>Chọn chuyên mục</h6>
                <select name="" id="">
                    <option value="">Chuyên mục 1</option>
                    <option value="">Chuyên mục 1</option>
                    <option value="">Chuyên mục 1</option>
                    <option value="">Chuyên mục 1</option>
                </select>
            </div>
            <div class="w-100 mb-5 img">
                <h6>Chọn ảnh/video</h6>
                <input type="file" style="padding: 5px;">
            </div>
            <div class="w-100 public">
                <button type="submit" class="btn">Đăng bài</button>
            </div>
        </div>

    </div>
</div>