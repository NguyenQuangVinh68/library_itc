<div class="container">
    <div class="w-75 mx-auto">
        <h1 class="text-center mb-5">Tất cả thể loại sách</h1>
        <div class="card p-5 ">
            <table>
                <thead>
                    <th>Stt</th>
                    <th>Tên thể loại</th>
                    <th></th>
                </thead>
                <?php
                $category = new CategoryModel();
                $result = $category->getCategory();
                $i = 0;
                while ($item = $result->fetch()) :
                    $i++;
                ?>
                    <tbody>
                        <td><?php echo $i ?></td>
                        <td><?php echo $item['tentheloai'] ?></td>
                        <td>
                            <a href="index.php?controller=category&action=editcategory&id=<?php echo $item['id'] ?>" class="btn btn-warning">Sửa</a>
                            <?php echo "<a class='btn btn-danger align-items-center' onclick=confirmation('category','deletecategory',$item[id])><i class='bi bi-x'></i></a>" ?>
                        </td>
                    </tbody>
                <?php endwhile; ?>
            </table>
        </div>
        <a class="btn btn-primary" href="index.php?controller=category&action=addcategory">Thêm thể loại</a>
    </div>
</div>