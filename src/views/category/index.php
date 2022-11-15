<div class="container">
    <h1 class="text-center mb-5">Tất cả thư mục</h1>
    <div class="card p-5">
        <table>
            <thead>
                <th>Nhóm menu</th>
                <th>Tên thư mục</th>
                <th></th>
            </thead>
            <?php
            $category = new CategoryModel();
            $result = $category->getCategory();
            while ($item = $result->fetch()) :
            ?>
                <tbody>
                    <td><?php echo $item['mamenu'] ?></td>
                    <td><?php echo $item['tentheloai'] ?></td>
                    <td>
                        <a href="index.php?controller=category&action=editcategory&id=<?php echo $item['id'] ?>" class="btn btn-warning">Sửa</a>
                        <?php echo "<a class='btn btn-danger align-items-center' onclick=confirmation('category','deletecategory',$item[id])><i class='bi bi-x'></i></a>" ?>
                    </td>
                </tbody>
            <?php endwhile; ?>
        </table>
    </div>
    <a class="btn btn-primary" href="index.php?controller=category&action=addcategory">Thêm thư mục</a>
</div>